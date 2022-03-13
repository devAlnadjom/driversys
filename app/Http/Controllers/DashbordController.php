<?php

namespace App\Http\Controllers;

use App\Actions\CheckWeek;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    //
    public function index(){

        CheckWeek::handle();
        return Inertia::render('Dashboard');
    }
}
