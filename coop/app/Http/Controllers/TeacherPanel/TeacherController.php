<?php

namespace App\Http\Controllers\TeacherPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view ('teacher.teacher');
    }
}
