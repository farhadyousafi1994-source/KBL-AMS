<?php

namespace App\Http\Controllers;
use DB;
use App\Employee;
 use App\stock;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

$info= Employee::with('stocks')->get();
 

return view('/employee', compact('info'));


    //   $info=employee::all();  
     
    //     return view('/employee',compact('info'));
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
   $this->validate($request,[
        'emp_id'=>'required'  ,'emp_name'=>'required','emp_faculty'=>'required']) ;
       $info =new employee;
       $info->emp_id=$request->input('emp_id');  
       $info->emp_name=$request->input('emp_name');  
       $info->emp_position=$request->input('emp_position');  
       $info->emp_position_code=$request->input('emp_position_code');  
       $info->emp_faculty=$request->input('emp_faculty');  
       $info->emp_dep=$request->input('emp_dep');  
       $info->emp_phone=$request->input('emp_phone');  
   
       $info->status=$request->input('status');  
     
      $info->save();
        
      return redirect('/employee')->with('success','data saved');      

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee,$id)
    {
        
   $this->validate($request,[
        'emp_id'=>'required'  ,'emp_name'=>'required','emp_faculty'=>'required']) ;
      $info=employee::find($id);
       $info->emp_id=$request->input('emp_id');  
       $info->emp_name=$request->input('emp_name');  
       $info->emp_position=$request->input('emp_position');  
       $info->emp_position_code=$request->input('emp_position_code');  
       $info->emp_faculty=$request->input('emp_faculty');  
       $info->emp_dep=$request->input('emp_dep');  
       $info->emp_phone=$request->input('emp_phone');  
   
       $info->status=$request->input('status');  
     
      $info->save();
        
      return redirect('/employee')->with('success','data saved');   


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
     public function destroy(employee $employee,$id) {
    DB::delete('delete from employees where id = ?' ,[$id]);
   
    return redirect('/employee')->with('success','   موفقانه حذف شد!' );  
    }
    }

 
