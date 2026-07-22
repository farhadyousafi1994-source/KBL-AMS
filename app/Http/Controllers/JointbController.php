<?php
namespace App\Http\Controllers;

use App\employee;
use App\Jointb;
use Illuminate\Http\Request;
use DB;
use App\unasset;
use App\stock;
class JointbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

$info = DB::table('stocks')
    ->join('employees', 'stocks.id', '=', 'employees.id')
    ->select('stocks.*', 'employees.*')->get();
    

// dd($info);
  return view('/jointb',compact('info')); 
    }

    public function add(Request $request,stock $stock,$id)
    {

$info = DB::table('stocks')
    ->join('employees', 'stocks.id', '=', 'employees.id')
    ->select('stocks.*', 'employees.*')->get();
    // ->where('stocks.id', $id)
    // // ->first(); 
    // dd($info);
return view('insert', compact('info'));

          
 
    }

        public function statusone($oneid)
        {
            $info = unasset::find($oneid);
            $info->status=0;
            $info->save();
            return back();
        }
        public function statuszero($zeroid)
        {
            # code...
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //



    }
public function search(Request $request)
{
    $search = $request->get('q');
    $info= employee::where('emp_dep', 'like', '%' . $search . '%')->get();

    $response = [];
    foreach ($info as $dabs) {
        $response[] = [
            "id" => $dabs->id,
            "text" => $dabs->emp_dep
        ];
    }

    return response()->json($response);
}

}
