<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;

class pageController extends Controller
{
    public function index()
    {
        $partenaires=Partenaire::all();
        return view('pages.slide',[
            "partenaires"=>$partenaires
        ]);
    }
}
