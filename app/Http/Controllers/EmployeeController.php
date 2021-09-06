<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $employees = Employee::all();
        } else {
            $employees = Employee::whereHas('company', function ($query) use ($search){
            $query->where('name', 'like', '%'.$search.'%');
            })
            ->orWhere->ofDepartmentSearch($search)
            ->orWhere->ofStaffIdSearch($search)
            ->orWhere->ofAddressSearch($search)
            // ->with(['company' => function($query) use ($search){
            //     $query->where('name', 'like', '%'.$search.'%');
            // }])
            ->get();
        }

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        // dd($request->all());

        $employee = Employee::create($request->all());
   
        return redirect('/employees')->with('success', 'Employee '.$employee->first_name.' '.$employee->last_name.' is successfully added');
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
        $companies = Company::all();

        return view('employee.edit', compact('employee', 'companies'));
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
        $this->validation($request);

        Employee::whereId($id)->update($request->except('_token', '_method'));

        return redirect('/employees')->with('success', 'Employee '.$request->first_name.' '.$request->last_name.' is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee '.$employee->first_name.' '.$employee->last_name.' is successfully deleted');
    }

    /**
     * Validate user input
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array
     */
    public function validation(Request $request)
    {
        return $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
        ]);
    }
}
