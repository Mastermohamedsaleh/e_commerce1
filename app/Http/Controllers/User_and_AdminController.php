<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class User_and_AdminController extends Controller
{
    
    // Show ALL User
   public function index(){
   
     $users = User::where('usertype','=',0)->get();

     return view('admin.users_and_admins.users',compact('users'));

   }

//    Delete User
   public function delete_user($id){
 
      $user = User::findorfail($id);

      $user->delete();

      session()->flash('message','Success Delete'); 

      return redirect()->back();
      
   }


//    Show All Admin


public function show_admin(){
    $admins = User::where('usertype','=',1)->get();

    return view('admin.users_and_admins.admins',compact('admins'));

}



// Edit Admin 

 
public function edit_admin(Request $r){
 
   $admin = User::findorfail($r->id);
   
   $admin->name = $r->name; 
   $admin->email = $r->email; 
   $admin->phone = $r->phone; 
   $admin->address = $r->address;
   $admin->save();
 
      session()->flash('message','Success Update'); 

      return redirect()->back();

}


// Delete Admin 


public function delete_admin($id){

      $admin = findorfail($id);

      $admin->delete();

      session()->flash('message','Success Delete'); 

      return redirect()->back(); 
     
}




// search admin 


public function  search_admin(Request $request){

    $search_admin = $request->search;
         
    $admins = User::where('name','LIKE','%'.$search_admin.'%')
    ->orWhere('phone','LIKE','%'.$search_admin.'%')->orWhere('email','LIKE','%'.$search_admin.'%')->get();
     
    return  view('admin.users_and_admins.admins',compact('admins'));
}


// Add Admin


public function add_admin(){
       return view('admin.users_and_admins.add_admin');       
}





// store_admin
public function store_admin(Request $request){
 
   $admin =  User::create([
      
    'name'=>$request->name,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'address'=>$request->address,
    'password'=>Hash::make($request->password),
     'usertype'=> $request->usertype,
   
   ]);


  




   session()->flash('message','Success Add'); 

   return redirect()->back(); 




}




}
