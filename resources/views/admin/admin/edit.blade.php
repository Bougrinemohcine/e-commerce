@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Admin</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="" method="post">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" value="{{old('name',$user->name)}}" class="form-control" required name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="{{old('email',$user->email)}}" class="form-control" required name="email" placeholder="Enter Email">
                                <div style="color: red">
                                    {{$errors->first('email')}}
                                </div>
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" name="password" placeholder="Password">
                              <p>Do you want to change the password so please add</p>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="" required>
                                    <option {{($user->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                    <option {{($user->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                </select>
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>
                </div>
              </div>
        </div>
      </section>
</div>
@endsection
@section('script')
@endsection
