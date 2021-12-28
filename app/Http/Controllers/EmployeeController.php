<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
                        ->leftJoin('companies',function($join){
                            $join->on('companies.id','=','employees.company');
                        })
                        ->select('*','companies.nama as company_name','employees.nama as employee_name')
                        ->paginate(5);

        // dd($employees);
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        // dd($companies);

        return view('admin.employee.addEmployee',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama" => ['required'],
            "company" => ['required'],
            "email" => ['required','email'],
        ]);

        if($validator->fails()){
            $request->flash();
            toast($validator->messages()->all()[0], 'error');
            return back()->withInput();
        }
        $employee = new Employee;
        $employee->id = Uuid::uuid4()->toString();
        $employee->nama = $request->nama;
        $employee->company = $request->company;
        $employee->email = $request->email;
        $employee->save();
        
        toast('New Employee Added', 'success');
        return redirect()->route('admin.employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Employee $employee)
    {
        $delete = Employee::find($id);
        $delete->delete();
        toast('Delete Successfull','success');
        return redirect()->back();
    }
}
