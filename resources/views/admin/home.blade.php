<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
  </head>
  <body>


  <div class="container-scroller">
@include('admin.side')

   

@include('admin.nav')



<div class="main-panel">
          <div class="content-wrapper">
       
    
         
            <div class="row">

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_prodect}}</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                <a href="{{url('Prodect_index')}}" class="mdi mdi-arrow-top-right icon-item"></a>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total_Prodect</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_category}}</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                        <a href="{{url('Category')}}" class="mdi mdi-arrow-top-right icon-item"></a>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Category</h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$total_user}}</h3>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total User</h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$31.53</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div>
            </div>

<!-- Row I maked -->
            <div class="row">

<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-9">
          <div class="d-flex align-items-center align-self-start">
            <h3 class="mb-0">{{$total_order}}</h3>
            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
          </div>
        </div>
        <div class="col-3">
          <div class="icon icon-box-success ">
            <span class="mdi mdi-arrow-top-right icon-item"></span>
          </div>
        </div>
      </div>
      <h6 class="text-muted font-weight-normal">Total Order</h6>
    </div>
  </div>
</div>
</div>

<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-9">
          <div class="d-flex align-items-center align-self-start">
            <h3 class="mb-0"> {{$order_not_payment }} </h3>
            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
          </div>
        </div>
        <div class="col-3">
          <div class="icon icon-box-success ">
            <span class="mdi mdi-arrow-top-right icon-item"></span>
          </div>
        </div>
      </div>
      <h6 class="text-muted font-weight-normal">Total Order</h6>
    </div>
  </div>
</div>
</div>




</div>



















        
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  


@include('admin.js')
  </body>
</html>