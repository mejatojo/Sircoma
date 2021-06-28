<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Langue;
use App\Models\categories_langue;
use DB;
class categorieController extends Controller
{
    public function create()
    {
        return view('back-office.categorie.post');
    }
    public function list()
    {
        $categories=DB::table('categories_langues')
        ->join('langues','langues.id','categories_langues.id_lang')
        ->join('categories','categories.id','categories_langues.id_cat')
        ->get();
        return view('pages.category',['categories'=>$categories]);
    }
    public function store(Request $request) 
    {
        $path=$request->image->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->image->extension());
        $Category=Categorie::create(["photo"=>strtotime(date('d-m-Y H:i:s')).".".$request->image->extension()]);
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function index()
    { 
        $langues=Langue::all();
        $categories=Categorie::all();
        $categories_langue=categories_langue::all();
        return view('back-office.categorie.liste',
        [
            'categories'=>$categories,
            'langues'=>$langues,
            "categories_langue"=>$categories_langue
        ]);
    }
    public function update(Request $request,$id)
    {
        $path=$request->image->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->image->extension());
        $Category=Categorie::find($id)->update(["photo"=>strtotime(date('d-m-Y H:i:s')).".".$request->image->extension()]);
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function modifierLangue(Request $req)
    {
        $cat_langue=categories_langue::create(
            [
                "name_category"=>$req->name_category,
                "slug_category"=>str_replace(' ', '_', $req->name_category),
                "id_lang"=>$req->langue,
                "id_cat"=>$req->categorie
            ]);
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function destroy($id)
    {
        $cat_langues=categories_langue::where('id_cat',$id)->get();
        foreach($cat_langues as $cat_langue)
        {
            $cat_langue->delete();
        }
        $categorie=Categorie::find($id)->delete();
        $notif=array(
            'message'=>'Suppression réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
