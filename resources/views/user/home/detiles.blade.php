<!DOCTYPE html>
<html lang="en">
<head>
 
    @include('user.css')
</head>
<body>

      
@include('user.header')





@if (Session::has('Add_cart'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        {{ session('Add_cart') }}
    </div>
@endif


<div class="container">
    <div class="col-lg-8 border p-3 main-section bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
            Product Detail Design Using Bootstrap 4.0
        </div>

        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img style="width:200px" src="/item_images/{{$Prodects->Name_Prodect}}/{{$Prodects->image}}" class="border p-3">
            </div>

            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>{{$Prodects->Name_Prodect}}</span>
                            <p class="m-0 p-0">Quality:{{$Prodects->quantity}}</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">Price:${{$Prodects->price}}</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris.</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Tag : </strong><a href="">Woman</a><a href="">,Man</a></p>
                        </div>
                        <div class="col-lg-12">
                            <h6>Quantity :</h6>


<form action="{{route('Add_Cart',$Prodects->id)}}" method="POST" >
    @csrf
             <input type="number" min="1" name="quantity" class="form-control text-center w-100" value="1">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                      <button type="submit" class="btn btn-danger w-100">Add To Cart</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-success w-100">Shop Now</a>
                                </div>

</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





</div>
</div>


<div class="container mt-4">
    <a href="{{URL('cash_delivery')}}" class="btn btn-danger">Cash on Delivery</a>

</div>



@include('user.footer')





 
@include('user.js')
</body>
</html>