<?php

namespace App\Http\Controllers;

use App\Ranking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports_show',Ranking::all());
    }

    protected function model(){
        return Ranking::class;
    }
}
