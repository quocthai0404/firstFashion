@extends('admin.layout')
@section('title', 'Edit Product')

@section('content')
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Name</th>
                      <th>Img</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th style="width: 200px">Description</th>
                      <th>Gender</th>
                      <th>Brand</th>
                      <th>Category</th>
                      
                    </tr>
                  </thead>
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
                            <tbody>
                               <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>
                                    <img src="{{ asset('images/' . $product->product_src) }}" alt="IMG-PRODUCT" class="imageProduct">
                                </td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{ $product->gender == 1 ? 'Men' : 'Women' }}</td>
                                <td>{{$brandName}}</td>
                                <td>{{$CatName}}</td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('editProduct', $product->id)}}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="p">Product Name</label>
                                <input value="{{$product->product_name}}" type="text" name="product_name" class="form-control" id="p" placeholder="Enter Name">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="q">Quantity</label>
                                        <input type="number" value="{{$product->quantity}}" name="quantity" class="form-control" id="q" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" value="{{$product->price}}" name="price" class="form-control" id="price" placeholder="Enter Price">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Gender </label>
                                        <select class="form-control" name="gender">
                                            <option value="1">Men</option>
                                            <option value="0">Women</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="1">H&M</option>
                                            
                                            <option value="4">Vans</option>
                                
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cat_id">
                                    <option value="1">Pants</option>
                                    <option value="2">Shirts</option>
                                    <option value="3">Outerwears</option>
                                    <option value="4">Shorts</option>
                            
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea type="text" name="description" class="form-control" id="desc" placeholder="Enter Description">{{$product->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>File input</label>
                                <div class="input-group">
                                    <div>
                                        <input type="file" name="product_src">
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            

        </div>

    </div>
</section>
@endsection