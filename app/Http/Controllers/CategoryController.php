<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
      
        $Categorys = Category::all();

        return view('admin.categorys.index',compact('Categorys'));
          
    }

    public function create()
    {
        return view('admin.categorys.add');
    }


    public function store(Request $request)
    {
         

        // $validated = $request->validate([
        //     'Category' => 'required|unique:categories|max:255',
        //     'Note' => 'required',
        // ]);




         $Category = new Category;
 
          $Category->Name_Category = $request->Category;
          $Category->Note = $request->Note;
       $Category->save();

 
       return redirect()->back()->with('success','Add Success');
  
         
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request)
    {

        $Category =  Category::findorfail($request->id);
           
 
        $Category->Name_Category = $request->Category;
        $Category->Note = $request->Note;
     $Category->save();
     return redirect('Category');

    }


    public function destroy(Request $request)
    {
        
        $Category =  Category::findorfail($request->id);
   
     $Category->destroy($request->id);
  
     return redirect('Category');
         
    }
}
