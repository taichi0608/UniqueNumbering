<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnNumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        return view(
            'UnNumber.UnNumber_index',
        );


    }
    public function create(Request $request)
    {

        return view(
            'UnNumber.UnNumber_create',
        );

    }
}
