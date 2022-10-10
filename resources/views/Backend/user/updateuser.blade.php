@extends('backend.admin_master')

@section('content')

    <!-- Table Product -->
    <div class="row">
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header">
              <h2>User Information</h2>
              {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-event">
                <i class="mdi mdi-plus mr-1"></i> New User With jquery
              </button> --}}
              <a  class="btn btn-outline-primary btn-sm"  href="register">
                <i class="mdi mdi-plus mr-1"></i> New User
              </a>
              {{-- <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false"> Yearly Chart
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div> --}}
            </div>
            <div class="card-body">

            <table id="product-sale" class="table table-hover table-product" style="width:100%">
                <thead>
                  <tr>
                    <th>SL NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
              
                  </tr>
                </thead>
                <tbody>
@foreach ($users as $user)

  <tr>
<td>{{ $loop->iteration }}</td>

<td>{{ $user['name'] }}</td>
<td>{{ $user['email'] }}</td>
<td>
    <a class="btn btn-outline-danger btn-sm" href="edit/1">
    <i class="mdi mdi-pencil mr-1" aria-hidden="true"></i>Edit
    </a>
</td>

  </tr>
@endforeach
                 



                </tbody>
              </table>
 







<hr>



              
        {{-- <table id="productsTable" class="table table-hover table-product" style="width:100%">
          <thead>
            <tr>
    
              <th></th>
              <th>Product Name</th>
              <th>ID</th>
              <th>Qty</th>
              <th>Variants</th>
              <th>Committed</th>
              <th>Daily Sale</th>
              <th>Sold</th>
              <th>In Stock</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

        <td class="py-0">
          <img src="images/products/products-xs-01.jpg" alt="Product Image">
        </td>
        <td>Coach Swagger</td>
        <td>24541</td>
        <td>27</td>
        <td>1</td>
        <td>2</td>
        <td>
          <div id="tbl-chart-01"></div>
        </td>
        <td>4</td>
        <td>18</td>
        <td>
          <div class="dropdown">
            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </td>
      </tr>



          </tbody>
        </table> --}}
            </div> 
            {{-- end card body --}}
          </div>
        </div>
      </div>



@endsection