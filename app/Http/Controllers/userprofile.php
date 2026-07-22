<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userprofile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $info=User::all() ;
    //    dd($info);
        return view('/auth.userprofile ',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  array  $data
     * @return \App\User
     
     */
    
    public function store(Request $request ) 
    {
      $this->validate($request,[
        'name'=>'required' , 'email'=>'required']) ;
       $info =new User;
       $info->name=$request->input('name');  
       $info->email=$request->input('email');  
         $info->password = Hash::make($request->input('password'));
      
       $info->type=$request->input('type');  
     
      $info->save();
        
 return back()->with('success','data saved');  

    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

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
        //
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
        $this->validate($request,[
             'type'=>'required' ]) ;
            $info=User::find($id);
       
             $info->type=$request->input('type'); 
          
            

            $info->save();
            return redirect('/auth.userprofile')->with('success',' معلومات ثبت شد!'); 
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::delete('delete from users where id = ?' ,[$id]);
   
    return redirect('/auth.userprofile')->with('success','   موفقانه حذف شد!' );  
    
    }
}
