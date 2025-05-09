<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(): View
    {
        return view('instructure.dashboard');
    }
}
