<?php

namespace App\Http\Controllers;
use DB;
use App\unasset;
use Illuminate\Http\Request;

class UnassetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {



               $info=unasset::all();
        return view('/insert',compact('info'));
 
    }

     public function index()
    {



               $info=unasset::all();
        return view('/unasset',compact('info'));
 
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
        'emp_id'=>'required' , 'emp_name'=>'required' ,'item_name'=>'required','item_quantity'=>'required']) ;

        $file = $request->file('file');  
       $info =new unasset;
       $name =time().$file->getClientOriginalName();

       $file->move('asas',$name);
      $info->emp_id=$request->input('emp_id');  
       $info->emp_name=$request->input('emp_name');  
       $info->account_pay=$request->input('account_pay');  
       $info->emp_faculty=$request->input('emp_faculty');  
       $info->emp_dep=$request->input('emp_dep');  

      $info->import_date=$request->input('import_date');  
       $info->item_name=$request->input('item_name');  
       $info->item_dep=$request->input('item_dep');  
       $info->item_detail=$request->input('item_detail');  
       $info->item_quantity=$request->input('item_quantity');  
       $info->item_cost=$request->input('item_cost');  
       $info->status=$request->input('status');  

            $info->file="/asas/".$name;
  $info->save();
        
      return redirect('/unasset')->with('success','data saved');      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\unasset  $unasset
     * @return \Illuminate\Http\Response
     */
    public function show(unasset $unasset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unasset  $unasset
     * @return \Illuminate\Http\Response
     */
    public function edit(unasset $unasset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unasset  $unasset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unasset $unasset)
    {
     $this->validate($request,[
        'emp_id'=>'required' , 'emp_name'=>'required' ,'item_name'=>'required','item_quantity'=>'required']) ;

        $file = $request->file('file');  
       $info =new unasset;
       $name =time().$file->getClientOriginalName();

       $file->move('asas',$name);
      $info->emp_id=$request->input('emp_id');  
       $info->emp_name=$request->input('emp_name');  
       $info->account_pay=$request->input('account_pay');  
       $info->emp_faculty=$request->input('emp_faculty');  
       $info->emp_dep=$request->input('emp_dep');  

      $info->import_date=$request->input('import_date');  
       $info->item_name=$request->input('item_name');  
       $info->item_dep=$request->input('item_dep');  
       $info->item_detail=$request->input('item_detail');  
       $info->item_quantity=$request->input('item_quantity');  
       $info->item_cost=$request->input('item_cost');  
       $info->status=$request->input('status');  

            $info->file="/asas/".$name;
  $info->save();
        
      return redirect('/unasset')->with('success','!معلومات تمدید شد');      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unasset  $unasset
     * @return \Illuminate\Http\Response
     */
    public function destroy(unasset $unasset)
    {
        //
    }
}
