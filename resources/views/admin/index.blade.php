@extends('admin.layouts.app')
@section('content')
  <div class="d-flex justify-content-between">
  <div class="p-1">
    <h4>Companies</h4>
  </div>
  <div class="p-1">
    <a href="/admin/company/add" class="btn btn-primary">Tambah Company</a>
  </div>
</div>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Company</th>
          <th scope="col">Email</th>
          <th scope="col">Logo</th>
          <th scope="col">Website</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($companies as $data)           
        <tr>
          <th scope="row">1</th>
          <td>{{$data->nama}}</td>
          <td>{{$data->email}}</td>
          <td>
            @php
                $path = Storage::url('company/'.$data->logo);
                $file = Storage::get('/public/company/'.$data->logo);
            @endphp
            <img src="{{$file}}" alt="">
            <h4>{{$exists = Storage::disk('company')->exists($data->logo)}}</h4>
          </td>
          <td>{{$data->website}}</td>
          <td>
              <a href="/admin/company/edit/{{$data->id}}" class="btn btn-success">Edit</a>
              <a href="/admin/company/delete/{{$data->id}}" class="btn btn-danger">Delete</a>
              <a href="/admin/company/download_pdf/{{$data->id}}" class="btn btn-secondary">Print</a>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  <span>Logo ada dan tersimpan di dalam storage, ketika di cek ada tapi tidak bisa muncul</span>
  @endsection
