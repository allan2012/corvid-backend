<?php

namespace App\Http\Controllers;

use App\County;
use Illuminate\Http\Request;

class CountiesController extends Controller
{
    public function fetchAll() {
        return County::all();
    }
}
