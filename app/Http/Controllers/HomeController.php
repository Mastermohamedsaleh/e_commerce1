<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\Prodect;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Category;

use App\Models\User;


use Session;

use Stripe;

class HomeController extends Controller
{



  public function index(){
      
    $prodects = Prodect::all(); 
    return view('user.home.userpage',compact('prodects'));
  }
     


    public function redircet(){

         $usertype = Auth()->user()->usertype;
         
         
  if($usertype == 0){
    $prodects = Prodect::all(); 
     return view('user.home.userpage',compact('prodects'));
  }else{


   $total_prodect = Prodect::all()->count();
   $total_category = Category::all()->count();
   $total_user = User::all()->count();
     
    return view('admin.home',compact('total_prodect','total_category','total_user'));
  }


    }


 public function show_cart(){
 
    

    $id = Auth()->user()->id; 
 
   
   $Carts = Cart::where('user_id','=',$id)->get();



    return view('user.cart.show_cart',compact('Carts')); 

 }

public function Delete_Prodect_Cart($id){



    $Cart = Cart::findorfail($id);
 
     $Cart->delete();

     session()->flash('Delete','Delete Success');   
           
     return redirect()->back();
   
}


public function Cash_Delivery(){

    
     $user = Auth()->user();

    

     $data = Cart::where('user_id','=',$user->id)->get();
       
     foreach($data as $d){

      $order = new Order();
      
        
      $order->name = $d->name;
      $order->email = $d->email;
      $order->phone = $d->phone;
      $order->address = $d->address;
      $order->user_id = $d->user_id;

      $order->Name_Prodect = $d->Name_Prodect;
      $order->price = $d->price;
      $order->quantity = $d->quantity;
      $order->image = $d->image;
      $order->prodect_id = $d->prodect_id;
      $order->payment_status = 'cash on delivery';
      $order->delivery_status = 'processing';

      $order->save();

       

     $cart =  Cart::findorfail($d->id);
 
 
      $cart->delete();

      return redirect()->back()->with('message','We have Received your order. We Will Connect With You Soon... ');
       
     }





}




public function stripe($total_price){ 
   return view('user.stripe.stripe',compact('total_price'));   
}





public function stripe_pay(Request $request,$total_price)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    Stripe\Charge::create ([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com." 
    ]);

    Session::flash('success', 'Payment successful!');
      
    return back();
}


// Show Order


public function show_order(){
         


   if(Auth::id()){

    $order = Order::where('user_id','=',Auth::id())->get(); 

    return view('user.home.show_order',compact('order'));
   }else{
    return  redirect('login');
   }
  
 

}

public function cancle_order($id){
 
   return $id;
}


// Search on prodect 

 
public function search_prodect_mainpage(Request $request){
 
   $prodects = Prodect::where('Name_Prodect','=',$request->search)->orWhere('price','=',$request->search)->get();
   return view('user.home.userpage',compact('prodects'));
}



 


}
