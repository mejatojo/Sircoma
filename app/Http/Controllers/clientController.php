<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class clientController extends Controller
{
    public function index()
    {
        $clients=Client::all();
        return view('back-office.client.liste',[
            "clients"=>$clients
        ]);
    }
    public function list()
    {
        $clients=Client::all();
        return view('pages.customers',[
            "clients"=>$clients
        ]);
    }
    public function store(Request $request)
    {
        $path=$request->image->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->image->extension());
        $clients=Client::create(["image"=>strtotime(date('d-m-Y H:i:s')).".".$request->image->extension()]);
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $request,$id)
    {
        $path=$request->image->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->image->extension());
        $clients=Client::find($id)->update(["image"=>strtotime(date('d-m-Y H:i:s')).".".$request->image->extension()]);
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function destroy($id)
    {
        $client=Client::find($id)->delete();
        $notif=array(
            'message'=>'Suppression réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif); 
    }
}
