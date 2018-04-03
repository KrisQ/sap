<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;

class AdminUserController extends Controller
{

    // protected $rules = [
    //   'name' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
    //   'email' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i',
    //   'password' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    // ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function ajax_userTable(){
      $data = array();
      $users = User::all();
      foreach ($users as $user) {
        $actions = view('admin.users._actions', compact('user'))->render();
        $data[] = array(
          $user->id,
          $user->name,
          $user->email,
          $user->role->name,
          $actions
        );
      }
      $returnData = array(
        'data' => $data
      );
      return $returnData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajax_store(UserRequest $request)
    {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->role_id = $request->role_id;
      $user->save();
      return $request;
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
}
