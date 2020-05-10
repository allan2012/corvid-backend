<?php

namespace App\Http\Controllers;

use App\QuarantineCenter;
use Illuminate\Http\Request;

class QuarantineCentersController extends Controller
{
    public function index()
    {
        return QuarantineCenter::paginate(10);
    }
}
