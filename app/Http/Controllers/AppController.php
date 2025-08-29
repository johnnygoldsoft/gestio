<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //

    public function index() {

        $totalRapports = Rapport::all()->count();
        return view('dashboard', compact('totalRapports'));
    }
}
