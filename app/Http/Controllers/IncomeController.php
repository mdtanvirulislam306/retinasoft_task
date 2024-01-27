<?php

namespace App\Http\Controllers;

use App\constants\UserConstants;
use App\Http\Requests\StoreIncomeRequest;
use App\Models\Income;
use App\Models\UserInformation;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        if ($start && $end){
            $data = Income::whereBetween('date',[$start,$end])->get();
        }else{
            $data = Income::all();
        }
        return view('pages.income.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = UserInformation::where('user_type', UserConstants::CUSTOMER)->get();
        return view('pages.income.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        Income::create($request->all());
        return back()->with('success', 'Income saved!');
    }

    public function edit(string $id)
    {
        $income = Income::find($id);
        $users = UserInformation::where('user_type', UserConstants::CUSTOMER)->get();
        return view('pages.income.update',compact('users','income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $income = Income::find($id);
        $validateData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'user_id' => ['required','string',  'max:255']
        ]);

        $income->update($request->all());
        return redirect()->route('income.index')->with('success','Income Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::find($id);
        $income->delete();
        return back()->with('success', 'Income Deleted!');
    }
}
