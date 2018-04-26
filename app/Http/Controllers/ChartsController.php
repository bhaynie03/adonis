<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function trialChart($value='')
    {
    	return view('charts.trial1');	
    }
}
