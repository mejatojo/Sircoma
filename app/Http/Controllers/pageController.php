<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Points;
use App\Models\Langue;

class pageController extends Controller
{
    public function index()
    {
        $partenaires=Partenaire::all();
        return view('pages.slide',[
            "partenaires"=>$partenaires
        ]);
    }
    public function contact()
    {
        $points=Points::all();
        return view('pages.contact',[
            "points"=>$points
        ]);
    }
}
