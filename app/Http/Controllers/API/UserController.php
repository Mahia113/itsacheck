<?php

namespace App\Http\Controllers\API;

use App\Administrator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        return User::find($user);
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
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    public function validateUser($email, $password){

        $hasher = app('hash');

        $valid = false;
        $emailUserBD = null;
        $users = User::all();
        $userData = null;

        foreach ($users as $user => $value){

            $emailUserBD = $value->email;

            if($email == $emailUserBD){
                if($hasher->check($password, $value->password)){
                    $valid = true;
                    $userData = Administrator::select()
                        ->where('email', $emailUserBD)
                        ->get();
                }
            }

        }

        return response()->json(['valid'=>$valid, 'user_data'=>$userData], 200);
    }
}
