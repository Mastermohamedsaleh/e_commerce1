
<!DOCTYPE html>
<html lang="en">
<head>
 


@include('admin.css')
</head>
<body>





<div class="container-scroller">
@include('admin.side')

@include('admin.nav')
 






<div class="container mt-5">









<h1 class="text-center text-success mt-5">Add Prodect</h1>





@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div>
@endif
<form   action=""    method="POST"  enctype="multipart/form-data">

@csrf
@method('PUT')




  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control"  value="{{$Prodects->Name_Prodect}}"  name="prodect" />
        <label class="form-label" >Name_Prodect</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text"  class="form-control" placeholder="Description" name="description"  />
        <label class="form-label">description</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" class="form-control" placeholder="quantity" name="quantity" />
    <label class="form-label" >Quantity</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="number"  class="form-control" placeholder="Price"  name="price"/>
    <label class="form-label" >Price</label>
  </div>

  <div class="form-outline mb-4">
    <input type="number"  class="form-control" placeholder="discount_Price" name="disprice" />
    <label class="form-label">discount_Price</label>
  </div>

<div>
  <select class="form-control form-control-sm"  name="category">    
  @foreach($Categorys as $c)
  <option value="{{$c->id}}">{{$c->Name_Category}}</option>
  @endforeach
</select>
<label class="form-label">Category</label>
</div>


<div class="form-group">
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" accept="image/*">
    <label for="exampleFormControlFile1">Choose Image</label>
  </div>



  <!-- Submit button -->
  <button type="submit" class="btn btn-success btn-block mb-4">Sign up</button>


</form>


</div>



</div>
    
@include('admin.js')
  
</body>
</html>