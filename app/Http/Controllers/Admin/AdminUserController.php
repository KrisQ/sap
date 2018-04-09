<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Validator;

class AdminUserController extends Controller
{
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

    public function ajax_store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required',
          'role_id' => 'required',
      ]);

      if ($validator->fails())
      {
          $errors = $validator->errors()->all();
          return response()->json([
            'errors'=>$validator->errors()->all(),
            'html' => view('includes.errors', compact('errors'))->render()
          ]);
      }
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password =  bcrypt($request->password);
      $user->role_id = $request->role_id;
      // $file = $request->file('file');
      // if ($file) {
      //     $name = time() . $file->getClientOriginalName();
      //     $file->move('images', $name);
      //     $photo = Photo::create(['name'=>$name]);
      //     $user->photo_id = $request->photo_id;
      // }
      $user->save();
      return response()->json([
        'success'=>'Record is successfully added',
        'html' => view('includes.success')->render(),
      ]);
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
    public function ajax_edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return response()->json([
          'success'=>'Record is successfully added',
          'html' => view('admin.users._editUserModal', compact('user','roles'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajax_update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:users,id,'.$id,
          'password' => 'required',
          'role_id' => 'required'
      ]);

      if ($validator->fails())
      {
          $errors = $validator->errors()->all();
          return response()->json([
            'errors'=>$validator->errors()->all(),
            'html' => view('includes.errors', compact('errors'))->render()
          ]);
      }
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role_id = $request->role_id;
      $user->save();
      return response()->json([
        'success'=>'Record is successfully added',
        'html' => view('includes.success')->render()
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajax_destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
