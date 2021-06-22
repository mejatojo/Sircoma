<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use DB;
use App\Models\Langue;
class menuController extends Controller
{
    public function index()
    {
        $langues=Langue::all();
        $menus=DB::table('menus')
            ->join('langues','langues.id','menus.id_lang')
            ->orderBy('menus.created_at','asc')
            ->selectRaw('menus.*,lang')
            ->get();
        return view('back-office.menu.liste',[
            "menus"=>$menus,
            "langues"=>$langues
        ]);
    }
    public function store(Request $request)
    {
        $menu=Menu::create($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $request,$id)
    {
        $menu=Menu::find($id)->update($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
