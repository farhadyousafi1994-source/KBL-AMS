<?php

namespace App\Http\Controllers;
use DB;
use App\addinfo;
use App\employee;
use Illuminate\Http\Request;
use App\retailcontracts;

class AddinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $info = DB::table('stocks')
    // ->join('employees', 'stocks.employee_id', '=', 'employees.id')
    // ->select('stocks.*', 'employees.*',)
    // ->get();
 
// return view('/addinfo', compact('info'));

    

 

        $info=addinfo::all();
        return view('/addinfo',compact('info'));
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
        'emp_id'=>'required' , 'account_pay'=>'required' ,'position'=>'required','file_type'=>'required']) ;
       $info =new addinfo;
       $info->file_date=$request->input('file_date');  
       $info->emp_id=$request->input('emp_id');  
       $info->account_pay=$request->input('account_pay');  
       $info->account_receive=$request->input('account_receive');  
       $info->position=$request->input('position');  
       $info->file_type=$request->input('file_type');  
       $info->item=$request->input('item');  
       $info->in_qty=$request->input('in_qty');  
       $info->in_cost=$request->input('in_cost');  
       $info->out_qty=$request->input('out_qty');  
       $info->out_cost=$request->input('out_cost');  
       $info->status=$request->input('status');  
     
      $info->save();
        
      return redirect('/addinfo')->with('success','data saved');      

    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\addinfo  $addinfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\addinfo  $addinfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

     //
        
            
        }

        public function statusone($oneid)
        {
            $info = addinfo::find($oneid);
            $info->status=0;
            $info->save();
            return back();
        }
        public function statuszero($zeroid)
        {
            # code...
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\addinfo  $addinfo
       * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'account_pay'=>'required','position'=>'required','file_type'=>'required']) ;
         $info=addinfo::find($id);
         $info->file_date=$request->input('file_date');  
         $info->emp_id=$request->input('emp_id');  
         $info->account_pay=$request->input('account_pay');  
         $info->account_receive=$request->input('account_receive');  
         $info->position=$request->input('position');  
         $info->file_type=$request->input('file_type');  
         $info->item=$request->input('item');  
         $info->in_qty=$request->input('in_qty');  
         $info->in_cost=$request->input('in_cost');  
         $info->out_qty=$request->input('out_qty');  
         $info->out_cost=$request->input('out_cost');  
        $info->save();
          
        return redirect('/addinfo')->with('success','data updated');      
  
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\addinfo  $addinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
    DB::delete('delete from addinfo where id = ?' ,[$id]);
   
    return redirect('/addinfo')->with('success','data deleted' );  
    }
   
}
