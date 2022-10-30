

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




<div class="row">

<div class="col-6">
<div class="mt-5">
<form action="{{URL('search_admin')}}" method="GET">
@csrf
<input type="text"  name="search" placeholder="Search" required>
<button type="submit" class="btn btn-danger">Search</button>
</form>
</div>
</diV>



<div class="col-6 mt-5">


<a href="{{URL('add_admin')}}" class="btn btn-primary">Add Admin</a>

</div>

</div>





<h1 class='text-center text-primary mt-5'>admins</h1>




@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible mt-5 " role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
       {{ session('message') }}
    </div>
@endif


<table class="table table-striped">
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


<?php $i = 0 ?>

  @forelse($admins  as  $admin)

    <?php $i++ ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$admin->name}}</td>
      <td>{{$admin->email}}</td>
      <td>{{$admin->phone}}</td>
      <td>{{$admin->address}}</td>
      <td>
        <a class="btn btn-danger" href="{{URL('delete_admin',$admin->id)}}" onclick="return confirm('Are You Sure From Delete This admin')">Delete</a>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$admin->id}}">
       Edit 
</button>




<!-- Modal -->
<div class="modal fade" id="edit{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 


<form action="{{URL('edit_admin')}}" method="POST">
@csrf  

<div class="form-group">






<input type="hidden" value="{{$admin->id}}" name="id">



<div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control"  name="name" value="{{$admin->name}}">
  </div>
<div class="form-group">
    <label >email</label>
    <input type="email" class="form-control"  name="email" value="{{$admin->email}}">
  </div>
<div class="form-group">
    <label >Phone</label>
    <input type="text" class="form-control" name="phone"  value="{{$admin->phone}}">
  </div>
<div class="form-group">
    <label >Address</label>
    <input type="text" class="form-control"  name="address"  value="{{$admin->address}}">
  </div>

</div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
    </div>
  </div>
</div>













      </td>


@empty

<td class="text-danger">Not Found</td>

    </tr>
@endforelse

  </tbody>
</table>



</div>
    
@include('admin.js')
  
</body>
</html>



