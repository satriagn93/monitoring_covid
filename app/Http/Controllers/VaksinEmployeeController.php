<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\VaksinEmployee;
use App\Models\VaksinEmployeeFam;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Str;
use Image;
use File;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class VaksinEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vaksin_employees as vemp')
                            ->join('employees as emp', 'emp.id', '=', 'vemp.employee_id')
                            ->select('vemp.*', 'emp.name as karyawan')
                            ->orderBy('vemp.id', 'DESC')
                            ->get();

        $empl['employee'] = DB::table('employees as emp')
                            ->select('emp.id', 'emp.name')
                            ->get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function($get){
                    $button = '<a href="/vaksin/'.$get->id.'/edit" title="Edit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>';
                    $button .='<a onclick="deletevaksin('.$get->id.')" title="Delete" class="btn btn-danger btn-sm btn-delete-'.$get->id.'" style="color: white; margin-left:5px;"><i class="fas fa-trash"></i> Delete</a>';
                    return $button;
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('vaksin.index', $data,$empl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $savevaksin = New VaksinEmployee;
        $savevaksin->employee_id = $request->employee_id;
        $savevaksin->vaksin1 = $request->vaksin1;
        $savevaksin->vaksin2 = $request->vaksin2;
        $savevaksin->vaksin_boosting = $request->vaksin_boosting;
        if($savevaksin->save()){
            $header = DB::table('vaksin_employees')->latest('id')->first();
            foreach($request->fam_name as $key => $u)
            {
                $usage = array(
                    'vaksin_employee_id'  => $header->id,
                    'fam_name'            => $request->fam_name[$key],
                    'relationship'        => $request->relationship[$key],
                    'vaksin1'             => $request->vaksin1_kel[$key],
                    'vaksin2'             => $request->vaksin2_kel[$key],
                    'vaksin_boosting'     => $request->vaksin_boosting_kel[$key],
                );
                VaksinEmployeeFam::create($usage);
            }
            toastr()->success('Data Successfully Save', 'Info!');
            return redirect('/vaksin');
        }
    }

    public function showdelete($id)
    {
        $Vaksin = VaksinEmployee::where('id', $id)->first();
        return response()->json([
            'error' => false,
            'detail'=> $Vaksin
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        // $covid = Covid::findOrFail($id);
        $employee = Employee::all();
        $vaksin = DB::table('vaksin_employees as vemp')
        ->join('employees as emp', 'emp.id', '=', 'vemp.employee_id')
        ->select('vemp.*', 'emp.name as karyawan')
        ->where('vemp.id', $id)->first();

        $vaksin_kel = DB::table('vaksin_employee_fams')
            ->select('vaksin_employee_fams.*')
            ->where('vaksin_employee_fams.vaksin_employee_id', $id)
            ->Orderby('id','ASC')
            ->get();
        return view('vaksin.edit', compact('vaksin','employee','vaksin_kel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editvaksin = VaksinEmployee::findOrFail($id);
        $editvaksin->employee_id = $request->employee_id;
        $editvaksin->vaksin1 = $request->vaksin1;
        $editvaksin->vaksin2 = $request->vaksin2;
        $editvaksin->vaksin_boosting = $request->vaksin_boosting;
        if ($editvaksin->update()) {
            $editvaksin = VaksinEmployee::where('id', $id)->latest('id')->first();
            foreach ($request->id as $key => $u) {
                VaksinEmployeeFam::where('id', $request->id[$key])->updateOrcreate(
                    [ 'id'          => $u],
                    [
                        'vaksin_employee_id'  => $editvaksin->id,
                        'fam_name'            => $request->fam_name[$key],
                        'relationship'        => $request->relationship[$key],
                        'vaksin1'             => $request->vaksin1_kel[$key],
                        'vaksin2'             => $request->vaksin2_kel[$key],
                        'vaksin_boosting'     => $request->vaksin_boosting_kel[$key],
                        ]);

            }
        }
        toastr()->success('Data Successfully Update', 'Info!');
        return redirect('/vaksin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaksindelete = VaksinEmployee::where('id', $id)->first();
        $vaksindelete->delete();
        return response()->json([
            'success' => 'Data Successfully Deleted'
        ], 200);
    }

    public function detail($id)
    {
        $covid = Covid::findOrFail($id);
        $employee = DB::table('covids as cov')
        ->join('employees as emp', 'emp.id', '=', 'cov.employee_id')
        ->select('cov.*', 'emp.name as karyawan')
        ->where('cov.id', $id)->first();
        return view('covid.detail', compact('covid','employee'));
    }

    public function delete_vaksin_kel($id)
    {
        $vaksin_kel_item = VaksinEmployeeFam::findOrFail($id);
        // dd($id);

        if ($vaksin_kel_item->delete()) {
            toastr()->error('Data Berhasil dihapus !!', 'Info !!');

            return back();

        }
    }

    public function pdfvaksin()
    {
        $data['vaksin'] = DB::table('vaksin_employees as vem')
        ->join('employees as emp', 'emp.id', '=', 'vem.employee_id')
        ->select('vem.*', 'emp.name as karyawan')
        ->orderBy('vem.id', 'DESC')
        ->get();

        $data['vaksin_fam'] = DB::table('vaksin_employee_fams as vemfam')
        ->join('vaksin_employees as vem', 'vem.id', '=', 'vemfam.vaksin_employee_id')
        ->join('employees as emp', 'emp.id', '=', 'vem.employee_id')
        ->select('vem.id', 'emp.name as karyawan','vemfam.*')
        ->orderBy('vem.id', 'DESC')
        ->get();

        $pdf = PDF::loadView('report.pdfvaksin', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
