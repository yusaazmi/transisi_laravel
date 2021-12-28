@extends('admin.employee.layouts.app')
@section('content')    
<div class="card mt-2">
    <div class="card-body">
        <h4 class="card-title">Edit {{$employee->nama}}</h4>
        <form method="post" action="/admin/employee/edit/{{$employee->id}}">
            @csrf
            <div class="form-group row mb-2">
                <label for="nama" class="col-sm-2 text-end control-label col-form-label">Nama Company</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$employee->nama}}" placeholder="Nama Company">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="company" class="col-sm-2 text-end control-label col-form-label">Company</label>
                <div class="col-sm-8">
                   <select class="form-select" name="company">  
                       @foreach ($companies as $data)
                           <option value="{{$data->id}}">{{$data->nama}}</option>
                       @endforeach
                   </select>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="email" class="col-sm-2 text-end control-label col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="{{$employee->email}}" placeholder="Email Company">
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

