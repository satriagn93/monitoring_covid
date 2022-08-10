<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Str;
use Image;
use File;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rdcode = Employee::all();

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.npoint.io/99c279bb173a6e28359c/data",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $rdcode = json_decode($response);
        if (request()->ajax()) {
            return DataTables::of($rdcode)
                ->addIndexColumn()
                ->make(true);
        }

        return view('employee.index', ['data' => $rdcode]);
    }

    public function member()
    {
        $response = Http::get('https://gorest.co.in/public/v2/users');

        $data = $response->json();

        // $data = Employee::all();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('name', function ($get) {
                    return '<a href="/employee/' . $get->id . '/detail">' . $get->name . '</a>';
                })
                ->addColumn('gender', function ($get) {
                    return  $get->gender;
                })
                ->addColumn('action', function ($get) {
                    $button = '<a href="/employee/' . $get->id . '/edit" title="Edit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>';
                    $button .= '<a onclick="deleteemployee(' . $get->id . ')" title="Delete" class="btn btn-danger btn-sm btn-delete-' . $get->id . '" style="color: white; margin-left:5px;"><i class="fas fa-trash"></i> Delete</a>';
                    return $button;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'gender', 'action'])
                ->make(true);
        }
        return view('member.index', $data);
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
        $saveemploye = new Employee;
        $saveemploye->name = $request->name;
        $saveemploye->gender = $request->gender;
        $saveemploye->profession = $request->profession;
        $saveemploye->position = $request->position;
        $saveemploye->handphone = $request->handphone;
        $saveemploye->address = $request->address;
        $saveemploye->save();
        toastr()->success('Data Successfully Save', 'Info!');
        return redirect('/employee');
    }

    public function showdelete($id)
    {
        $Employee = Employee::where('id', $id)->first();
        return response()->json([
            'error' => false,
            'detail' => $Employee
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
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
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
        $editemployee = Employee::findOrFail($id);
        $editemployee->name = $request->name;
        $editemployee->gender = $request->gender;
        $editemployee->profession = $request->profession;
        $editemployee->position = $request->position;
        $editemployee->handphone = $request->handphone;
        $editemployee->address = $request->address;
        $editemployee->update();
        // toastr()->success('Data Successfully Update', 'Info!');
        Alert::success('Success', 'You\'ve Successfully Registered');
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeedelete = Employee::where('id', $id)->first();
        $employeedelete->delete();
        return response()->json([
            'success' => 'Data Successfully Deleted'
        ], 200);
    }

    public function detail($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.detail', compact('employee'));
    }
}
