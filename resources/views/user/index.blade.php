@extends('layouts.template')

@section('title')
Data User
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

                @if(Request::get('keyword'))
                    <a class="btn btn-success" href="{{ route('user.index') }}">Back</a>
                @else
                    <a class="btn btn-success" href="{{ route('user.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
                @endif

                <form method="get" action="{{route('user.index')}}">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Search By Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-body">
                @if(Request::get('keyword'))
                <div class="alert alert-success alert-block">
                    Hasil Pencarian User dengan Keyword : <b>{{ Request::get('keyword') }}</b>    
                </div>
                @endif

                @include('alert.success')

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th width="30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($user->perpage() * ($user->currentPage() - 1)) }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->level }}</td>
                                <td>
                                    <form method="post" action="{{ route('user.destroy',[$row->id]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')" >
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('user.edit',[$row->id]) }}">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <a class="btn btn-info" href="{{ route('user.show',[$row->id]) }}">Detail</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
                {{ $user->appends(Request::all())->links() }}
            </div>
          </div>
        </div>
</div>
@endsection