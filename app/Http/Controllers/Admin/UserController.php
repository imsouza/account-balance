<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function profile()
  {
  	return view('site.profile.profile');
  }


  public function profileUpdate(Request $request)
  {
    $user = auth()->user();
  	$data = $request->all(); 

  	if ($data['password'] != null)
  		$data['password'] = bcrypt($data['password']);
  	else 
  		unset($data['password']);

    $data['image'] = $user->image;

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      $file = $request->file('image');
      $extension = $file->getClientOriginalExtension();
      $filename =time().'.'.$extension;

      $upload = $request->image->storeAs('users', $filename);

      if (!$upload) 
        return redirect()->back()->with('danger', 'failed to upload image');
    }

    $update = $user->update($data);

  	if ($update)
  		return redirect()->route('profile')->with('success', 'Profile updated successfully.');

  	return redirect()->back()->with('danger', 'Failed to update profile.');
  }
}
