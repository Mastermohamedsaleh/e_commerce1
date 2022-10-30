<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Prodect; 
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    



// pay_delivery
    public function pay_delivery(Request $request,$id){

 
        if(Auth::id()){
         
            $user = Auth()->user();
      
            $prodect = prodect::find($id);
            
            $order = new Order();
      
            $order->quantity =   $request->quantity;  
            $order->name = $user->name;
            $order->email = $user->email;
            $order->address = $user->address;
            $order->user_id = $user->id;
            $order->phone = $user->phone;
            $order->Name_Prodect = $prodect->Name_Prodect;
            $order->image = $prodect->image;
            $order->prodect_id = $prodect->id;  
      
            $order->payment_status = "Not Payment";  
            $order->delivery_status	 = "Not Delivery";  
       if($prodect->discount_price == " "){
        $order->price = $prodect->price;
       }else{  
        $order->price = $prodect->discount_price;
       }
        $order->save(); 
       session()->flash('pay_delivery','Your Order Will be executed');
       return redirect()->back();
        }else{
            return redirect('login'); 
        }
     }



// Show All Order In Page Admin


public function show_all_order(){
 
     
    $orders = Order::orderBy('id', 'DESC')->get();
       
     return view("admin.orders.all_order",compact('orders'));

}



public function Done_Payment($id){
  
   $order =   Order::findorfail($id);
    
   $order->payment_status = "Done Payment";
   $order->save(); 
   session()->flash('massage','Success Payment');
   return redirect()->back();


}

public function Done_delivary($id){
  
   $order =   Order::findorfail($id);
    
   $order->delivery_status = "Done Delivary";
   $order->save(); 
   session()->flash('message','Success Delivary');
   return redirect()->back();

}


public function destory_order($id){
    $order =   Order::findorfail($id);
    $order->delete();
   session()->flash('message','Delete Success');
   return redirect()->back();
}

// search_order


public function search_order(Request $request){
     
    
    $orders = Order::where('name','LIKE', "%{$request->search}%")->orWhere('email','LIKE', "%{$request->search}%")->orWhere('address','LIKE', "%{$request->search}%")->orWhere('phone','LIKE', "%{$request->search}%")->orWhere('Name_Prodect','LIKE', "%{$request->search}%")->get();
       
     return view("admin.orders.all_order",compact('orders'));
     

}



// Last Orders

public function last_orders(){

 
    // $orders  = Order::orderBy('created_at','desc')->get();
        
    $orders  = Order::orderBy('id','desc')->where('payment_status','Not Payment')->orWhere('delivery_status','Not Delivery')->get(); 
    return view('admin.orders.last_orders',compact('orders'));
}

}
