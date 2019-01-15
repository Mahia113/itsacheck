<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        //return view('profile');
    }

    public function update(Request $request, $id)
    {
        $profile = User::find($id);
        $profile->first_name = $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->last_name2 = $request->get('last_name2');
        $profile->save();

        return redirect('/home')->with('success', 'Stock has been updated');
    }

    public function edit($id){
        $user = User::find($id);

        return view('profile', compact('user'));
    }

    public function show($id){
        echo "METODO SHOW";
    }

    public function destroy(){
        echo "METODO DESTROY";
    }
}
