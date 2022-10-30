
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


<h1  class="text-primary text-center mt-5">Add Admin</h1>



@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible mt-5 " role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
       {{ session('message') }}
    </div>
@endif



<form     action="{{URL('store_admin')}}" method="POST">

@csrf
  <div class="row">
    <div class="col">
    <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
    <div class="col">
    <label>Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
  </div>

  <div class="row mt-5">
    <div class="col">
    <label>Phone</label>
      <input type="text" class="form-control" name="phone" placeholder="phone">
    </div>
    <div class="col">
    <label>Address</label>
      <input type="text" class="form-control" name="address" placeholder="Address">
    </div>
  </div>

  <div class="row mt-5">
    <div class="col">
    <label>Password</label>
      <input type="text" class="form-control"  name="password" placeholder="password">
    </div>
    <div class="col">
      <label>Type Admin</label>
    <select class="form-control" name="usertype">
  <option  value="2">SuperAdmin</option>
  <option  value="1">Admin</option>
</select>
    </div>
  </div>


  <button type="submit" class="btn btn-primary mt-5">Add Admin</button>
</form>












</div>

    
@include('admin.js')
  
</body>
</html>
