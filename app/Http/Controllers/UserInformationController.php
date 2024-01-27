<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = UserInformation::all();
       return view('pages.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usertype = UserInformation::usertype();
        return view('pages.user.create',compact('usertype'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        UserInformation::create($request->all());
        return back()->with('success', 'User Information saved!');
    }

    public function edit(string $id)
    {
        $user = UserInformation::find($id);
        $usertype = UserInformation::usertype();
        return view('pages.user.update', compact('user','usertype'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'email' => ['string', 'lowercase', 'email', 'max:255'],
                'address' => ['required','string','max:255'],
                'user_type' => ['required','string','max:255'],
            ]
        );
        $user = UserInformation::find($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User Information saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserInformation::find($id);
        $user->incomes()->delete();
        $user->expenses()->delete();
        $user->debtors()->delete();
        $user->delete();
        return back()->with('success', 'User Information Deleted!');
    }
}
