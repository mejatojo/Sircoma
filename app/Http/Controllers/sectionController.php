<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Section;
use App\Models\Langue;
class sectionController extends Controller
{
    public function index()
    {
        $langues=Langue::all();
        $sections=DB::table('sections')
            ->join('langues','langues.id','sections.id_lang')
            ->orderBy('sections.created_at','asc')
            ->selectRaw('sections.*,lang')
            ->get();
        return view('back-office.section.liste',[
            "sections"=>$sections,
            "langues"=>$langues
        ]);
    }
    public function store(Request $request)
    {
        $section=Section::create($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $request,$id)
    {
        $section=Section::find($id)->update($request->all());
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
