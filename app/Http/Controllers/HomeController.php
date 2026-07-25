<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\addinfo;
use App\Employee;
use App\User;

use App\stock;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dashboard = $this->dashboardMetrics();
        return view('home', $dashboard);
    }

    public function report()
    {
        return view('report', $this->dashboardMetrics());
    }

    private function dashboardMetrics()
    {
$countemploy=Employee::count('emp_id');
$item_cost=stock::sum('item_cost');
$usercount=User::count('name');
$item_quantity=stock::sum('item_quantity');
// $data = DB::table('stocks')
//     ->join('employees', 'stocks.employee_id', '=', 'employees.id')
//     ->select('employees.emp_name', DB::raw('sum(stocks.item_quantity) as total_quantity'))
//     ->groupBy('employees.emp_name')
//     ->get();

// dd($data);
        return compact('countemploy','item_cost','usercount','item_quantity');
    }
}

