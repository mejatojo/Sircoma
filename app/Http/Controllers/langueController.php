<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;
use App\Models\categories_langue;
class langueController extends Controller
{
    public function updateName(Request $req,$id) 
    {
        $path=$req->drapeau->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$req->drapeau->extension());
        $langue=Langue::find($id)->update(["drapeau"=>strtotime(date('d-m-Y H:i:s')).".".$req->drapeau->extension(),
        "lang"=>$req->lang]);
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function store(Request $req)
    {
        $path=$req->drapeau->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$req->drapeau->extension());
        $langue=Langue::create(["drapeau"=>strtotime(date('d-m-Y H:i:s')).".".$req->drapeau->extension(),
        "lang"=>$req->lang]);
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function index()
    {
        $langues=Langue::all();
        return view('back-office.langue.liste',["langues"=>$langues]);
    }
    public function changeLang($lang)
    {
        $id_lang=Langue::where('lang',$lang)->first();
        $_SESSION['lang']=$id_lang->id;
        return redirect()->back();
    }
    public function update(Request $req,$id)
    {
        $cat_langue=categories_langue::find($id)->update($req->all());
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function destroy($id)
    {
        $langue=Langue::find($id)->delete();
        $notif=array(
            'message'=>'Suppression réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
} 
