<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function editProfile()
    {
        return view('admin.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        if (isset($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
            User::findOrFail($id)->update([
                'password' => Hash::make($request->password),
            ]);
        }
        if (isset($request->name)) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
            User::findOrFail($id)->update([
                'name' => $request->name,
            ]);
        }
        if (isset($request->email)) {
            $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);
            User::findOrFail($id)->update([
                'email' => $request->email,
            ]);
        }

        session()->flash('message', 'Profile Updated Successfully');
        return redirect()->back();
    }
}
