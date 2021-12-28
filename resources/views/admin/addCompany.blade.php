@extends('admin.layouts.app')
@section('content')    
<div class="card mt-2">
    <div class="card-body">
        <h4 class="card-title">Tambah Company</h4>
        <form method="post" action="/admin/company/add" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-2">
                <label for="nama" class="col-sm-2 text-end control-label col-form-label">Nama Company</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}" placeholder="Nama Company">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="email" class="col-sm-2 text-end control-label col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email Company">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="logo" class="col-sm-2 text-end control-label col-form-label">Logo</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo Company">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="website" class="col-sm-2 text-end control-label col-form-label">Website</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="website" name="website" value="{{old('website')}}" placeholder="Website Company">
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

