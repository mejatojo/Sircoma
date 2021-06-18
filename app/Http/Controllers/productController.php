<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Langue;
use DB;
use App\Models\Products_langue;
use App\Models\Categorie;
class productController extends Controller
{
    public function create()
    {
        $firstLangue=Langue::first();
        $categories=DB::table('categories')
            ->join('categories_langues','categories_langues.id_cat','categories.id')
            ->selectRaw('categories.id,name_category')
            ->where('categories_langues.id_lang',$firstLangue->id)
            ->get();
        return view('back-office.product.post',['categories'=>$categories]);
    }
    public function index()
    {
        $langues=Langue::all();
        $products=Product::all();
        $product_langues=Products_langue::all();
        $firstLangue=Langue::first();
        $categories=DB::table('categories')
            ->join('categories_langues','categories_langues.id_cat','categories.id')
            ->selectRaw('categories.id,name_category')
            ->where('categories_langues.id_lang',$firstLangue->id)
            ->get();
        return view('back-office.product.liste',
        [
            'products'=>$products,
            'langues'=>$langues,
            "product_langues"=>$product_langues,
            "categories"=>$categories
        ]);
    }
    public function show($slug)
    {
        $products=DB::table('products_langues')
        ->join('products','products.id','products_langues.id_product')
        ->join('langues','langues.id','products_langues.id_lang')
        ->join('categories','categories.id','products.id_category')
        ->join('categories_langues','categories_langues.id_cat','categories.id')
        ->selectRaw('products.*,products_langues.*')
        ->where('slug_category',$slug)
        ->get();
        return view('pages.product',['products'=>$products]);
    }
    public function store(Request $request)
    {
        
        $path=$request->photo_product->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->photo_product->extension());
        $product=Product::create([
            "photo_product"=>strtotime(date('d-m-Y H:i:s')).".".$request->photo_product->extension(),
            "id_category"=>$request->id_category]);
        $notif=array(
            'message'=>'Ajout réussi',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function update(Request $request,$îd)
    {
        if($request->photo_product)
        {
            $path=$request->photo_product->storeAs('public',strtotime(date('d-m-Y H:i:s')).".".$request->photo_product->extension());
            $product=Product::find($request->id_product)->update([
                "photo_product"=>strtotime(date('d-m-Y H:i:s')).".".$request->photo_product->extension(),
                "id_category"=>$request->id_category
                ]);
        }
        else{
            $product=Product::find($request->id_product)->update([
                "id_category"=>$request->id_category
                ]);
        }
        $notif=array(
            'message'=>'Modification réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
    public function destroy($id)
    {
        $product=Product::find($id)->delete();
        $notif=array(
            'message'=>'Suppression réussie',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notif);
    }
}
