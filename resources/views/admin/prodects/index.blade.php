
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
</head>
<body>





<div class="container-scroller">
@include('admin.side')

@include('admin.nav')
 

<div class="container ">









<h1 class="text-center text-success mt-s">Prodects</h1>

<div class="mt-5">
<form action="{{route('search_prodect')}}" method="GET">
@csrf
<input type="text"  name="search" placeholder="Search" required>
<button type="submit" class="btn btn-danger">Search</button>
</form>
</div>


@if (Session::has('delete'))
    <div class="alert alert-success alert-dismissible mt-5 " role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
       {{ session('delete') }}
    </div>
@endif


<a class="btn btn-primary mt-5" href="{{URL('Prodect_create')}}">Add Prodect</a>






<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prodect</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Discount_Price</th>
      <th scope="col">Category</th>
      <th scope="col">Image</th>
      <th scope="col">Controll</th>
    </tr>
  </thead>
  <tbody>

  @forelse($Prodects as $p)
    <tr>
      <th scope="row">1</th>
      <td>{{$p->Name_Prodect}}</td>
      <td>{{$p->description}}</td>
      <td>{{$p->price}}</td>
      <td>{{$p->quantity}}</td>
      <td>{{$p->discount_price}}</td>
      <td>{{$p->Category->Name_Category}}</td>
      <td>
  @if($p->image)
        <img src="/item_images/{{$p->Name_Prodect}}/{{$p->image}}">
@else
     Not Found
@endif
      </td>


      <td>

      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a href="{{URL('Prodect_edit',$p->id)}}"  class="text-primary dropdown-item">Edit</a>
       
  <a type="button" class="text-danger dropdown-item" data-toggle="modal" data-target="#delete{{$p->id}}">
           Delete
</a>
    <a class="dropdown-item text-success"  href="{{URL('download_atta',$p->id,$p->Name_Prodect,$p->image)}}">Download Image</a>

    <a class="dropdown-item text-info"  href="{{url('download_pdf',$p->id)}}">Download pdf</a>
  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="delete{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Prodect</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL('Prodect_destroy')}}" method="post">

        @csrf
     
<div class="form-group">



<h5>Are You Sure Form Delete This Item</h5>
  <input type="hidden"  value="{{$p->id}}" name="id" >
         
   <input type="hidden" value="{{$p->Name_Prodect}}" name="Name_Prodect">

   <input type="hidden" value="{{$p->image}}" name="image">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">DELETE</button>
      </div>
</form>
    </div>
  </div>
</div>























      </td>


    </tr>

    @empty
    <td class="text-danger text-center">No Prodect</td>


@endforelse
  </tbody>
</table>






</div>



</div>
    
@include('admin.js')
  
</body>
</html>














