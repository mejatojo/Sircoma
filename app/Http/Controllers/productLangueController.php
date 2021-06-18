<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products_langue;
class productLangueController extends Controller
{
    public function update(Request $req,$id)
    {
        $cat_langue=Products_langue::find($id)->update($req->all());
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function store(Request $request)
    {
        $cat_langue=Products_langue::create($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
