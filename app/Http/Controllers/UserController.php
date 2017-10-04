<?php

namespace Boye\Http\Controllers;

use Illuminate\Http\Request;
use Boye\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function logout()
    {
        Auth::Logout();
        return response()->json(['success' => true]);
    }
  public function updateProfile(Request $request)
  {
    $this->validate($request, ['name' => 'required|max:100', 'email' => 'required']);
    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->update();
    return response()->json(['success' => true]);
  }
  public function updatePassword(Request $request)
  {
   $this->validate($request, [
            'old_password' => 'required|min:6',
            'password' => 'required|string|min:6|confirmed',
            ]);
        $id_session = Auth::user()->id;
        $user = User::find($id_session);
        if($user && Hash::check($request->old_password, $user->password)){
          $user->password =  Hash::make($request->password);
          $user->update();
          return response()->json(['success' => true]);
        }
  }
}
