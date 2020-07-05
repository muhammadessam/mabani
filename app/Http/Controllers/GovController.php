<?php

namespace App\Http\Controllers;

use App\Gov;
use Illuminate\Http\Request;

class GovController extends Controller
{
    public function index(Request $request)
    {
        return Gov::all();
    }
}
