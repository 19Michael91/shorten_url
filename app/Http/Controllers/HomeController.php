<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}
}
