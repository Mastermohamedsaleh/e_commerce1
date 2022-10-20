<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category; 
use App\Models\Prodect; 
use App\Models\Cart; 
use Illuminate\Support\Facades\Auth;

use PDF;

use File;

class ProdectController extends Controller
{
     

    public function index(){
        $Prodects = Prodect::all();
        return  view('admin.prodects.index',compact('Prodects'));
    }
    public function create(){
       
        $Categorys = Category::all();  
        return  view('admin.prodects.create',compact('Categorys'));
    }

    public function store(request $request){
           

        $prodect = new Prodect;
        
        $prodect->Name_Prodect = $request->prodect;
        $prodect->description = $request->description;
        $prodect->Category_id = $request->category;
        $prodect->price = $request->price;
        $prodect->quantity = $request->quantity;
        $prodect->discount_price = $request->disprice;
     
        $imageName = $request->image->getClientOriginalName();

        // Public Folder
        $request->image->move(public_path('item_images/'.$request->prodect), $imageName);

         $prodect->image =  $imageName;

          $prodect->save();
       
       return redirect()->back()->with('success','Add Success');
 

    }

   

   public function edit($id){

    $Prodects = Prodect::findorfail($id);

    $Categorys = Category::all();
    return  view('admin.prodects.edit',compact('Prodects','Categorys'));
   }



   
     public function destroy(request $request){
         Prodect::findorfail($request->id);


   
         File::delete(public_path('item_images/'.$request->Name_prodect.'/'.$request->image));

 

        if(File::exists(public_path('item_images/'.$request->Name_prodect.'/'.$request->image))){
            File::delete(public_path('item_images/'.$request->Name_prodect.'/'.$request->image));
        }else{
            dd('File does not exists.');
        }
       File::delete(public_path('item_images/'.$request->Name_prodect));


         Prodect::destroy($request->id);

        
           
          
          return redirect()->back()->with('delete','Delete Success');
   
     } 



// Download Atta 
     public function download_atta($id,$name,$image){
         return $name;
     }



    // Downloadd Pdf

     
    public function download_pdf($id){
 
         $prodect = Prodect::findorfail($id);  
         
        $pdf = PDF::loadView('admin.prodects.pdf',compact('prodect'));

        return $pdf->download('Detiles_Prodect.pdf');

    }
 
      

    //  Detiles Prodect 

    public function detiles($id){
        $Prodects = Prodect::find($id);
         return view('user.home.detiles',compact('Prodects'));
    }

     
    //  Add Cart

    public function Add_Cart(request $request,$id){

        if(Auth::id()){
     
      $user = Auth()->user();

      $prodect = prodect::find($id);
      
      $cart = new Cart();


      $cart->name = $user->name;

      $cart->email = $user->email;

      $cart->price = $user->price;

      $cart->address = $user->address;

      $cart->phone = $user->phone;

      $cart->Name_Prodect = $prodect->Name_Prodect;

      $cart->image = $prodect->image;
      

      $cart->quantity = $request->quantity;

      if($prodect->discount_price != null){
        $cart->price = $prodect->discount_price;
      }else{
        $cart->price = $prodect->price;
      }
 
      $cart->prodect_id = $prodect->id;

      $cart->user_id = $user->id;


      $cart->save();


       session()->flash('Add_cart','Add To Cart Success');
      return redirect()->back();
             

        }else{
            return redirect('login');
        }
    }



    // Search Product

    public function search_prodect(Request $request){
         
        $search_prodect = $request->search;
         
        $Prodects = Prodect::where('Name_Prodect','LIKE','%'.$search_prodect.'%')
        ->orWhere('price','LIKE','%'.$search_prodect.'%')->get();
         
        return  view('admin.prodects.index',compact('Prodects'));
    }











     
}
