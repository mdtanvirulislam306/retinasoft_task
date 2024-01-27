<?php

namespace App\Http\Controllers;

use App\constants\UserConstants;
use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $start = $request->input('start_date');
        $end = $request->input('end_date');

        if ($start && $end){
            $data = Expense::whereBetween('date',[$start,$end])->get();
        }else{
            $data = Expense::all();
        }

        return view('pages.expense.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = UserInformation::where('user_type', UserConstants::SUPPLIER)->get();
        return view('pages.expense.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        Expense::create($request->all());
        return back()->with('success', 'Expense saved!');
    }

    public function edit(string $id)
    {
        $expense = Expense::find($id);
        $users = UserInformation::where('user_type', UserConstants::SUPPLIER)->get();
        return view('pages.expense.update',compact('users','expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expense = Expense::find($id);
        $validateData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'user_id' => ['required','string',  'max:255']
        ]);
        $expense->update($request->all());
        return redirect()->route('expense.index')->with('success', 'Expense Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return back()->with('success', 'Expense Deleted!');
    }
}
