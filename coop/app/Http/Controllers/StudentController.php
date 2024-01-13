<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function edit()
    {
        $user = User::all();
        return view('dashboard', compact('user'));
    }
}
