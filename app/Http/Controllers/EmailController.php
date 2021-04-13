<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function email_verify($token = null)
    {
        if ($token == null) {
            session()->flash('type', 'bg-danger');
            session()->flash('msg', 'Invalid Token');
            return redirect()->route('login');
        }
        $user = User::where('email_verification_token', $token)->first();
        if ($user == null) {
            session()->flash('type', 'bg-danger');
            session()->flash('msg', 'Invalid Token');
            return redirect()->route('login');
        }
        $user->update([
            'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => ''
        ]);
        session()->flash('type', 'bg-success');
        session()->flash('msg', 'Email Verification Successful.Please login');
        return redirect()->route('login');
    }
}
