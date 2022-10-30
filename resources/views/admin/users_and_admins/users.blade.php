

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


<h1 class='text-center text-primary mt-5'>Users</h1>




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

  @forelse($users as $user)

    <?php $i++ ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->address}}</td>
      <td>
        <a class="btn btn-danger" href="{{URL('delete_user',$user->id)}}" onclick="return confirm('Are You Sure From Delete This User Warining if You Delete This User Will Delete All his Item')">Delete</a>
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



