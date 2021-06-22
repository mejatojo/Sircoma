<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;
use App\Models\Langue;
use DB;
class pointsController extends Controller
{
    public function index()
    { 
        $langues=Langue::all();
        $points=DB::table('points_of_sales')
            ->join('langues','langues.id','points_of_sales.id_lang')
            ->orderBy('points_of_sales.created_at','asc')
            ->selectRaw('points_of_sales.*,lang')
            ->get();
        return view('back-office.point.liste',[
            "points"=>$points,
            "langues"=>$langues
        ]);
    }
    public function store(Request $request)
    {
        $point=Points::create($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $request,$id)
    {
        $point=Points::find($id)->update($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
