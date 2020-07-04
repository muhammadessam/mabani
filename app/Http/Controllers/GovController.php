<?php

namespace App\Http\Controllers;

use App\Gov;
use Illuminate\Http\Request;

class GovController extends Controller
{
    public function states(Request $request, Gov $gov)
    {
        return $gov->states;
    }
}
