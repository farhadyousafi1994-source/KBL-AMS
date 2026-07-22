<?php

namespace App\Http\Controllers;

use App\ams;
use App\User;
use Illuminate\Http\Request;

class AmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $info=User::all();
        return view('/ams',compact('info'));
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
     * @param  array  $data
     * @return \App\User
     
     */
    
    public function store(Request $request , $data) 
    {
      $this->validate($request,[
        'name'=>'required' , 'email'=>'required']) ;
       $info =new User;
       $info->name=$request->input('name');  
       $info->email=$request->input('email');  
       $info->password=$request-> Hash::make($data['password']);
      
       $info->type=$request->input('type');  
     
      $info->save();
        
      return back()->with('success','data saved');      

    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\ams  $ams
     * @return \Illuminate\Http\Response
     */
    public function show(ams $ams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ams  $ams
     * @return \Illuminate\Http\Response
     */
    public function edit(ams $ams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ams  $ams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ams $ams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ams  $ams
     * @return \Illuminate\Http\Response
     */
    public function destroy(ams $ams)
    {
        //
    }
}
