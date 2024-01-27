<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Lend;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        if ($start && $end){
            $income = Income::whereBetween('date',[$start,$end])->sum('amount');
            $expense = Expense::whereBetween('date',[$start,$end])->sum('amount');
            $lend = Lend::whereBetween('issue_date',[$start,$end])->sum('amount');
            $te = $expense+$lend;
            $lp = $income-$te;

        }else{
            $income = Income::sum('amount');
            $expense = Expense::sum('amount');
            $lend = Lend::sum('amount');
            $te = $expense+$lend;
            $lp = $income-$te;
        }

        return view('pages.dashboard',compact('income','expense','lend','lp'));
    }
}
