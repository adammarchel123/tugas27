@extends('layouts.template')

@section('title')
Update Data Supplier
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        @include('alert.error')
      </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" action="{{ route('supplier.update',[$supplier->kd_supplier]) }}">
          @csrf
          {{ method_field('PUT') }}
            <div class="box-body">
              <div class="form-group">
                <label for="nama_supplier" class="col-sm-2 control-label">Nama Supplier</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ $supplier->nama_supplier }}">
                </div>
              </div>

              <div class="form-group">
                <label for="alamat_supplier" class="col-sm-2 control-label">Alamat Supplier</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat_supplier" id="alamat_supplier">{{ $supplier->alamat_supplier }}</textarea>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="tombol" class="btn btn-info pull-right">Update</button>
            </div>
            <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </div>
</div>  
@endsection