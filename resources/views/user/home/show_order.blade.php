<!DOCTYPE html>
<html lang="en">
<head>
 
    @include('user.css')
</head>
<body>

      
@include('user.header')






<div class="container">
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name Prodect</th>
      <th scope="col">quantity</th>
      <th scope="col">price</th>
      <th scope="col">Image</th>
      <th scope="col">Cancle Order</th>
    </tr>
  </thead>
  <tbody>
<?php  $i = 0 ?>

  @forelse($order as $r)
  <?php $i++ ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$r->Name_Prodect}}</td>
      <td>{{$r->quantity}}</td>
      <td>{{$r->price}}</td>
      <td><img src="/item_images/{{$r->Name_Prodect}}/{{$r->image}}"style="width:40px"></td>

      <td>

<a onclick="return confirm('Are You Sure From Cancle This Order')" 
href="{{URL(('cancle_order',$r->id)}}" class="btn btn-danger">Cancle Order</a>




      </td>
    </tr>
@empty

<td class="text-danger">Not Order</td>


    @endforelse

  </tbody>
</table>

</div>




@include('user.footer')





 
@include('user.js')
</body>
</html>