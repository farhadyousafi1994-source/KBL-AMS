<?php

namespace App\Http\Controllers;
use DB;
use App\stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $info=stock::all();
        return view('/stock',compact('info'));
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
        'import_date'=>'required' , 'item_name'=>'required' ,'item_dep'=>'required','item_detail'=>'required']) ;
       $info =new stock;
      
     
       $info->account_pay=$request->input('account_pay');  
       $info->import_date=$request->input('import_date');  
       $info->item_name=$request->input('item_name');  
       $info->item_dep=$request->input('item_dep');  
       $info->item_detail=$request->input('item_detail');  
       $info->item_quantity=$request->input('item_quantity');  
       $info->item_cost=$request->input('item_cost');  
       $info->status=$request->input('status');  
     
      $info->save();
        
      return redirect('/stock')->with('success','data saved');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock,$id)
    {
                $this->validate($request,[
        'import_date'=>'required' , 'item_name'=>'required' ,'item_dep'=>'required','item_detail'=>'required']) ;
       $info =stock::find($id);

       $info->import_date=$request->input('import_date');  
       $info->item_name=$request->input('item_name');  
       $info->item_dep=$request->input('item_dep');  
       $info->item_detail=$request->input('item_detail');  
       $info->item_quantity=$request->input('item_quantity');  
       $info->item_cost=$request->input('item_cost');  
       $info->status=$request->input('status');  
     
      $info->save();
        
      return redirect('/stock')->with('success','data saved');      
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock,$id) {
    DB::delete('delete from stocks where id = ?' ,[$id]);
   
    return redirect('/stock')->with('success','   موفقانه حذف شد!' );  
    }
}
