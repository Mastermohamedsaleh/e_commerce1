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


<h1 class="text-center text-primary mt-5" >All Order</h1>






<form action="{{URL('search_order')}}" method="post">
   
@csrf 
 
<input type="text"  name="search"  pleaceholder="Search">

<button type="submit">Search</button>

</form>





@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
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
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Name Prodect</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">image</th>
      <th scope="col">Payment</th>
      <th scope="col">Delivery</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

 <?php  $i = 0 ?>


 @forelse($orders as $r)
   

    <?php  $i++  ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$r->name}}</td>
      <td>{{$r->email}}</td>
      <td>{{$r->address}}</td>
      <td>{{$r->phone}}</td>
      <td>{{$r->Name_Prodect}}</td>
      <td>{{$r->quantity}}</td>
      <td>{{$r->price}}</td>
     <td> <img src="/item_images/{{$r->Name_Prodect}}/{{$r->image}}" style="width:70px;height:70px;"></td>

     @if($r->payment_status == 'Not Payment')
      <td class="text-danger">{{$r->payment_status}}</td>

    @else 
    <td class="text-primary">{{$r->payment_status}}</td>
    @endif


     @if($r->delivery_status == 'Not Delivery')
     <td class="text-danger">{{$r->delivery_status}}</td>

    @else 
    <td class="text-primary">{{$r->delivery_status}}</td>
    @endif
      
    

    <td>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">




  <a class="dropdown-item" onclick="return confirm('Are You Sure That User has Delivary')" href="{{URL('Done_delivary',$r->id)}}">Done Delivery</a>





    <a class="dropdown-item"  onclick="return confirm('Are You Sure That User Payment')" href="{{URL('Done_Payment',$r->id)}}">Done Payment</a>


    <a class="dropdown-item"   onclick="return confirm('Are You Sure Delete This Order')"    href="{{URL('destory_order',$r->id)}}">Delete Order</a>
  </div>
</div>
</td>



    
    </tr>
@endforeach
 
  </tbody>
</table>




</div>

</div>
</diV>










@include('admin.js')
  
  </body>
  </html>
  