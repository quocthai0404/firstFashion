@extends('admin.layout')
@section('title', 'View User')
@section('header', 'All User')
@section('content')
@if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
@endif
@if(session('update'))
        <script>
            alert("{{ session('update') }}");
        </script>
@endif
@if(session('errorUpdate'))
<script>
            alert("{{ session('errorUpdate') }}");
</script>
@endif

<section class="content">
<div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
            @include('admin.alertError')
              <div class="card-header">
                <h3 class="card-title">User Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>User Role</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->fullname}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->username}}</td>
                      <td>
                        @if($user->user_role==1)
                            Admin
                        @else
                            User
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-primary edit-user-btn" data-user-id="{{$user->id}}">
                            <i class="fa fa-pen"></i> Edit
                        </a>
                        <a href="{{route('deleteUserByID', $user->id)}}" class="btn btn-danger">
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
                  {{ $users->links() }}
                </ul>
              </div>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>

          <div class="col-md-4 hidden-form" id="edit-user-form">
              
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              
              <form action="{{ route('editUser') }}" method="post">
              <input type="hidden" name="user_id" id="user_id" value="">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="fullname">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                  </div>
                  <div class="form-group">
                    <label>Role </label>
                    <select class="form-control" id="user_role" name="user_role">
                          <option value="1">Admin</option>
                          <option value="0">User</option>
                          
                    </select>
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Change</button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
        
</div>
</section>
@endsection