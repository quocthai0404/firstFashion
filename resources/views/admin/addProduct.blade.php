@extends('admin.layout')
@section('title', 'Add Product')
@section('header', 'Add Product')
@section('content')
@if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
@endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('addNewProduct')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" >
                            <div class="form-group">
                                <label for="p">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="p" placeholder="Enter Name">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="q">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" id="q" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price">
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
                                <textarea type="text" name="description" class="form-control" id="desc" placeholder="Enter Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>File input</label>
                                <div class="input-group">
                                    <div>
                                        <input type="file" name="product_src" >
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>



            </div>

        </div>

    </div>
</section>
@endsection