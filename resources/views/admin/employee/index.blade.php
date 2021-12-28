@extends('admin.employee.layouts.app')
@section('content')
  <div class="d-flex justify-content-between">
  <div class="p-1">
    <h4>Employees</h4>
  </div>
  <div class="p-1">
    <a href="/admin/employee/add" class="btn btn-primary">Tambah Employee</a>
  </div>
</div>
<form action="/admin/employee/excel" method="post" enctype="multipart/form-data">
  @csrf
  <span>Import Excel</span>
  <div class="input-group mb-3">
    <div class="row">
      <div class="col-lg-12">
        <input type="file" name="file" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
      </div>
    </div>
      <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
  </div>
</form>
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
        @php
            $i=1;
        @endphp
        @foreach ($employees as $data)           
        <tr>
          <th scope="row">{{$i}}</th>
          <td>{{$data->employee_name}}</td>
          <td>{{$data->company_name}}</td>
          <td>{{$data->email}}</td>
          <td>
              <a href="/admin/employee/edit/{{$data->id_employee}}" class="btn btn-success">Edit</a>
              <a href="/admin/employee/delete/{{$data->id_employee}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
      </tbody>
  </table>
  
  @endsection
