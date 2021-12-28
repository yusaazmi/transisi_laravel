@extends('admin.employee.layouts.app')
@section('content')
  <div class="d-flex justify-content-between">
  <div class="p-1">
    <h4>Companies</h4>
  </div>
  <div class="p-1">
    <a href="/admin/employee/add" class="btn btn-primary">Tambah Employee</a>
  </div>
</div>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Company</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $data)           
        <tr>
          <th scope="row">1</th>
          <td>{{$data->employee_name}}</td>
          <td>{{$data->company_name}}</td>
          <td>{{$data->email}}</td>
          <td>
              <a href="/admin/company/edit/{{$data->id}}" class="btn btn-success">Edit</a>
              <a href="/admin/company/delete/{{$data->id}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  @endsection
