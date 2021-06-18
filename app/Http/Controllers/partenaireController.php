<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
class partenaireController extends Controller
{
    public function index()
    {
        $partenaires=Partenaire::all();
        return view('back-office.partenaire.liste',[
            "partenaires"=>$partenaires
        ]);
    }
    public function store(Request $request)
    {
        $path=$request->image->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->image->extension());
        $partenaires=Partenaire::create(["image"=>strtotime(date('d-m-Y H:i:s')).".".$request->image->extension()]);
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $request,$id)
    {
        $path=$request->image->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->image->extension());
        $partenaires=Partenaire::find($id)->update(["image"=>strtotime(date('d-m-Y H:i:s')).".".$request->image->extension()]);
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function destroy($id)
    {
        $partenaire=Partenaire::find($id)->delete();
        $notif=array(
            'message'=>'Suppression réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif); 
    }
}
