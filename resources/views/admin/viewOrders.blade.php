@extends('admin.layout')
@section('title', 'View Orders')
@section('header', 'All Order')
@section('content')

<section class="content">
<div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
           
              <div class="card-header">
                <h3 class="card-title">Orders Table</h3>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Full Name</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th>Sub Total</th>
                      <th>Fax</th>
                      <th>Shipping</th>
                      <th>Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->fullName}}</td>
                        <td>{{$order->phoneNumber}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->subTotal}}</td>
                        <td>{{$order->fax}}</td>
                        <td>{{$order->shipping}}</td>
                        <td>{{$order->total}}</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                {{ $orders->links() }}
                </ul>
              </div>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>

        
          
        </div>
        
</div>
</section>
@endsection