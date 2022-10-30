<!DOCTYPE html>
<html lang="en">
<head>
 
    @include('user.css')
</head>
<body>

      
@include('user.header')



   <!-- product section -->
   <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>





            <div class="row">
 
              @foreach($prodects as $p )
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{URL('detiles',$p->id)}}" class="option1">
                            Detiles
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/item_images/{{$p->Name_Prodect}}/{{$p->image}}">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$p->Name_Prodect}}
                        </h5>

                   @if($p->discount_price)
                        <h5 class="text-danger">
                        {{$p->discount_price}}
                        </h5>
                 @endif

                        <h6>
                           {{$p->price}}
                        </h6>
                     </div>
                  </div>
               </div>
@endforeach
            </div>

 
         </div>
      </section>
      <!-- end product section -->












@include('user.footer')





 
@include('user.js')
</body>
</html>