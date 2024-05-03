@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Add New Admin</h1>
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
                        <form action="{{route('insert')}}" method="post">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" required name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" required name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="" required>
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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