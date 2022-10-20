<!DOCTYPE html>
<html lang="en">
<head>
 
    @include('user.css')
</head>
<body>

      
@include('user.header')







<div class="container">


<div class="container">
@if (Session::has('Delete'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        {{ session('Delete') }}
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        {{ session('message') }}
    </div>
@endif
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name_Prodect</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">image</th>
      <th scope="col">ِِAction</th>
    </tr>
  </thead>
  <tbody> 

  <?php 
   $i = 0;
   $total_price = 0;
   ?>
      
    @foreach($Carts  as $c )
    <tr>
  <?php  $i++ ?>
     
      <th scope="row">{{$i}}</th>
      <td>{{$c->Name_Prodect}}</td>
      <td> {{$c->price}}</td>
      <td>{{$c->quantity}}</td>
      <td><img style="width:30px" src="/item_images/{{$c->Name_Prodect}}/{{$c->image}}"></td>
      <td> 
        <a  onclick="return confirm('Are You Sure Form Delete This Item ?')"  href="{{URL('Delete_Prodect_Cart',$c->id)}}" class="btn btn-danger" >Remove Item</a>
      </td>
    </tr>



<?php $total_price =  $total_price +  $c->price ?></h1>



   @endforeach
  </tbody>
</table>
</div>



<h1 class="text-center text-danger">Total Price:{{$total_price}}</h1>




@include('user.footer')


<div class="container">
<a href="{{URL('stripe',$total_price)}}" class="btn btn-danger">Payment Cash</a>
</div>


 
@include('user.js')
</body>
</html>