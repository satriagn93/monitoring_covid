<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Covid;
use App\Models\Checking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Str;
use Image;
use File;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Redirect, Response;
use Barryvdh\DomPDF\Facade\Pdf;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_report()
    {
        // $data = DB::table('covids')->selectRaw('covids.description, count(covids.description)')->groupBy('covids.id');

        return view('report.index');
    }

    public function pdfcovid()
    {
        $data['covid'] = DB::table('covids as cov')
            ->join('employees as emp', 'emp.id', '=', 'cov.employee_id')
            ->select('cov.*', 'emp.name as karyawan')
            ->where('cov.description', 'Positif')
            ->orderBy('cov.id', 'DESC')
            ->get();
        $pdf = PDF::loadView('report.pdfcovid', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function index()
    {
        $data = DB::table('covids as cov')
            ->join('employees as emp', 'emp.id', '=', 'cov.employee_id')
            ->select('cov.*', 'emp.name as karyawan')
            ->orderBy('cov.id', 'DESC')
            ->get();

        $empl['employee'] = DB::table('employees as emp')
            ->select('emp.id', 'emp.name')
            ->get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('covid_name', function ($get) {
                    return '<a href="/covid/' . $get->id . '/detail">' . $get->covid_name . '</a>';
                })
                ->addColumn('employee_id', function ($get) {
                    return  $get->employee_id;
                })
                ->addColumn('description', function ($get) {
                    if ($get->description == 'Positif') {
                        return '<a class="bg-danger color-palette">' . $get->description . '</a>';
                    } else {
                        return '<a class="bg-success color-palette">' . $get->description . '</a>';
                    }
                })
                ->addColumn('action', function ($get) {
                    $button = '<a href="/covid/' . $get->id . '/monitoring/" title="Monitoring" class="btn btn-info btn-sm"><i class="fas fa-regular fa-eye"></i> Monitoring</a>  ';
                    $button .= '<a href="/covid/' . $get->id . '/edit" title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>';
                    $button .= '<a onclick="deletecovid(' . $get->id . ')" title="Delete" class="btn btn-danger btn-sm btn-delete-' . $get->id . '" style="color: white; margin-left:5px;"><i class="fas fa-trash"></i> Delete</a>';
                    return $button;
                })
                ->addIndexColumn()
                ->rawColumns(['covid_name', 'employee_id', 'description', 'action'])
                ->make(true);
        }
        return view('covid.index', $data, $empl);
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
        $savecovid = new Covid;
        $savecovid->covid_name = $request->covid_name;
        $savecovid->employee_id = $request->employee_id;
        $savecovid->date  = date('Y-m-d', strtotime($request->date));
        $savecovid->description = $request->description;
        $savecovid->save();
        toastr()->success('Data Successfully Save', 'Info!');
        return redirect('/covid');
    }

    public function showdelete($id)
    {
        $Covid = Covid::where('id', $id)->first();
        return response()->json([
            'error' => false,
            'detail' => $Covid
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
        $covid = DB::table('covids as cov')
            ->join('employees as emp', 'emp.id', '=', 'cov.employee_id')
            ->select('cov.*', 'emp.name as karyawan')
            ->where('cov.id', $id)->first();
        return view('covid.edit', compact('covid', 'employee'));
    }

    public function monitoring($id)
    {
        // $covid = Covid::findOrFail($id);
        $employee = Employee::all();
        $covid = DB::table('covids as cov')
            ->join('employees as emp', 'emp.id', '=', 'cov.employee_id')
            ->select('cov.*', 'emp.name as karyawan')
            ->where('cov.id', $id)->first();
        $checking = DB::table('checkings')
            ->select('checkings.*')
            ->where('checkings.covid_id', $id)->get();
        return view('covid.monitoring', compact('covid', 'employee', 'checking'));
    }

    public function store_monitoring(Request $request)
    {
        $savechecking = new Checking;
        $savechecking->covid_id = $request->covid_id;
        $savechecking->date  = date('Y-m-d', strtotime($request->date));
        $savechecking->dokter = $request->dokter;
        $savechecking->checking = $request->checking;
        $savechecking->status = $request->status;
        $savechecking->save();

        $editcovid = Covid::findOrFail($request->covid_id);
        $editcovid->description = $request->status;
        $editcovid->update();
        toastr()->success('Data Monitoring Successfully Save', 'Info!');
        // return redirect('/covid');
        return redirect('/covid/' . $request->covid_id . '/monitoring');
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
        $editcovid = Covid::findOrFail($id);
        $editcovid->covid_name = $request->covid_name;
        $editcovid->employee_id = $request->employee_id;
        $editcovid->date  = date('Y-m-d', strtotime($request->date));
        $editcovid->description = $request->description;
        $editcovid->update();
        toastr()->success('Data Successfully Update', 'Info!');
        return redirect('/covid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coviddelete = Covid::where('id', $id)->first();
        $coviddelete->delete();
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
        return view('covid.detail', compact('covid', 'employee'));
    }
}
