<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Langue;
Use Config;
class aboutController extends Controller
{
    public function index()
    {
        $abouts=About::all();
        $langues=Langue::all();
        return view('back-office.about.list',['abouts'=>$abouts,'langues'=>$langues]);
    }
    public function create()
    {
        $langues=Langue::all();
        return view('back-office.about.post',['langues'=>$langues]);
    }
    public function edit($id)
    {
        $langues=Langue::all();
        $about=About::find($id);
        return view('back-office.about.edit',['langues'=>$langues,'about'=>$about]);
    }
    public function store(Request $req)
    {
        $about=About::create($req->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $req,$id)
    {
        $about=About::find($id)->update($req->all());
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return $this->list()->with($notif);
    }
    public function list()
    {
        $abouts=About::all();
        return view('pages.about',['abouts'=>$abouts]);
    }
    public function destroy($id)
    {
        $about=About::find($id)->delete();
        $notif=array(
            'message'=>'Suppression réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
