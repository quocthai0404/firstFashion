@extends('admin.layout')
@section('title', 'View Product')
@section('header', 'All Product')
@section('content')
@if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
@endif

<section class="content">
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            
              <div class="card-header">
                <h3 class="card-title">Product Table</h3>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Name</th>
                      <th>Img</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th style="width: 450px;">Description</th>
                      <th>Gender</th>
                      <th>Brand</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    @php
    
                            $brandMap = [
                                1 => 'H&M',
                                2 => 'Dickies',
                                3 => 'Tiffany',
                                4 => 'Vans'

                            ];
                            $catMap = [
                                1 => 'Pants',
                                2 => 'Shirts',
                                3 => 'Outerwears',
                                4 => 'Shorts',
                                5 => 'Watch',
                                6 => 'Ear Ring',
                                7 => 'Ring'
        
                            ];
                            $brandName = isset($brandMap[$product->brand_id]) ? $brandMap[$product->brand_id] : 'Unknown';
                            $CatName = isset($catMap[$product->cat_id]) ? $catMap[$product->cat_id] : 'Unknown';
                        @endphp
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td><img src="images/{{$product->product_src}}" alt="IMG-PRODUCT" class="imageProduct"></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                        {{ $product->gender == 1 ? 'Men' : 'Women' }}
                        </td>
                        
                        <td>{{$brandName}}</td>
                        <td>{{$CatName}}</td>
                        <td>
                        <a href="{{route('viewAddPhotos', $product->id)}}" class="btn btn-primary" >
                            <i class="fa fa-pen"></i> Add Photos
                        </a>
                        <a href="{{route('viewEditId', $product->id)}}" style="margin-top: 3px;" class="btn btn-primary">
                            <i class="fa fa-pen"></i> Edit
                        </a>
                        <a href="{{route('deleteProduct', $product->id)}}" style="margin-top: 3px;" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                {{ $products->links() }}
                  
                </ul>
              </div>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>

          
          </div>
          
        </div>
        
</div>
</section>
@endsection