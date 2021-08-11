<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Points;
use App\Models\Langue;
use App\Mail\contact;
use App\Models\Client;

class pageController extends Controller
{
    public function index()
    {
        $partenaires=Partenaire::all();
        $clients=Client::all();
        return view('pages.slide',[
            "partenaires"=>$partenaires,
            "clients"=>$clients
        ]);
    }
    public function contact()
    {
        $points=Points::all();
        return view('pages.contact',[
            "points"=>$points
        ]);
    }
    public function email(Request $req)
    {
        $details = [
                'nom' => $req->name,
                'prenom' => $req->firstname,
                'message' => $req->message,
                'phone'=>$req->phone,
                'email'=>$req->email
        ];
        \Mail::to('contact@sircoma.com')->send(new contact($details));
        return redirect()->back();
    }
}
