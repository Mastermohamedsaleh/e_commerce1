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





<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#Add">
  Add Category
</button>



@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div>
@endif

<!-- Add Modal -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      


<form action="{{route('Category.store','test')}}"  method="post">
@csrf

<div class="form-group">


<label >Name Category</label>
    <input type="text" name="Category" class="form-control" placeholder="Name_Category" required>
  </div>
  <div class="form-group">
    <label >Note</label>
    <input type="text"  name="Note" class="form-control" placeholder="Note" required>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Category</button>
      </div>
</form>
    </div>
  </div>
</div>

















<table class="table table-striped mt-5 ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Note</th>
      <th scope="col">Process</th>
    </tr>
  </thead>
  <tbody>

     <?php $i = 0 ; ?>
    @foreach($Categorys as $c)
    <?php  $i++ ; ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$c->Name_Category}}</td>
      <td>{{$c->Note}}</td>
      <td>


      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#edit{{$c->id}}">
      Edit
</button>


      <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{$c->id}}">
      Delete
</button>

 
       
       




<!-- edit  Modal -->
<div class="modal fade" id="edit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      


<form action="{{route('Category.update','test')}}"  method="post">
@csrf
@method('PUT')
<div class="form-group">

  <input type="hidden"  value="{{$c->id}}" name="id" >
<label >Name Category</label>
    <input type="text" name="Category" class="form-control"  Value="{{$c->Name_Category}}" required>
  </div>
  <div class="form-group">
    <label >Note</label>
    <input type="text"  name="Note" class="form-control" value="{{$c->Note}}" required>
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



<!-- Delete  Modal -->
<div class="modal fade" id="delete{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="{{route('Category.destroy','test')}}"  method="post">
@csrf
@method('DELETE')
<div class="form-group">



<h5>Are You Sure Form Delete This Item</h5>
  <input type="hidden"  value="{{$c->id}}" name="id" >




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
 @endforeach
  </tbody>
</table>


</div>
</div>

















@include('admin.js')
</body>
</html>










