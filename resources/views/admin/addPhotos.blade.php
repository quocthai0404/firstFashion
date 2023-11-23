@extends('admin.layout')
@section('title', 'Add Product Photos')
@section('header', "Add Product's Photo")
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
                    <form method="post" action="{{route('addPhotos')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="col">
                                <div class="form-group">
                                    <label for="q">ID</label>
                                    <input value="{{$product->id}}" type="number" name="pro_id" class="form-control" placeholder="id">
                                </div>
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
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>

                </div>



            </div>

        </div>

    </div>
</section>
@endsection