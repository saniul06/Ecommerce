<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class a extends Controller
{
    public function b(Request $request){
        session()->flash('type', 'success');
        session()->flash('message', 'I am a flash message from /b');
        $b = $request->b;
        $bb = $request->bb;
        return view('b', compact('b', 'bb'));
    }
    public function c(){
        session()->flash('type', 'success');
        session()->flash('message', 'I am a from /c');
        return redirect()->route('a');
    }
}
