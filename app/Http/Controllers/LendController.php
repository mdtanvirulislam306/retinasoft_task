<?php

namespace App\Http\Controllers;

use App\constants\UserConstants;
use App\Models\Lend;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        if ($start && $end){
            $data = Lend::whereBetween('issue_date',[$start,$end])->get();
        }else{
            $data = Lend::all();
        }

        return view('pages.lend.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = UserInformation::where('user_type', UserConstants::DEBTOR)->get();
        $status = Lend::status();
        return view('pages.lend.create',compact('users','status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Lend::create($request->all());
        return back()->with('success', 'Lend saved!');
    }

    public function edit(string $id)
    {
        $lend = Lend::find($id);
        $users = UserInformation::where('user_type', UserConstants::DEBTOR)->get();
        $status = Lend::status();
        return view('pages.lend.update',compact('users','lend','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lend = Lend::find($id);
        $validateData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
            'issue_date' => ['required', 'string', 'max:255'],
            'due_date' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'user_id' => ['required','string',  'max:255']
        ]);
        $lend->update($request->all());
        return redirect()->route('lend.index')->with('success','Lend Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lend = Lend::find($id);
        $lend->delete();
        return back()->with('success', 'Lend Deleted!');
    }
}
