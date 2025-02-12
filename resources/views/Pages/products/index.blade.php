@extends('layouts.base')

@section('title','Data Product')

@section('main')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Users</h1>
        <div class="section-header-button">
            <a href="{{route('products.create')}}" class="btn btn-primary">Tambah Data Product</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Components</a></div>
          <div class="breadcrumb-item">Table</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            {{-- Ini Alert Create --}}
            @if(Session::get('Create'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('Create') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            {{-- Ini Alert Update --}}
            @if(Session::get('Update'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('Update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            {{-- Ini Alert Delete --}}
            @if(Session::get('Delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('Delete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h4>Users</h4>
              </div>
              <div class="card-body">

                <div class="float-right">
                    <form action="">
                       <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                       </div>
                    </form>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($product as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}
                            </td>
                            <td>
                                {{ $row->category->name }}
                            </td>
                            <td>
                                {{ $row->price }}
                            </td>
                            <td>
                                {{ $row->status }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="" class="btn btn-sm btn-info btn-icon"><i class="fas fa-edit"></i></a>
                                </div>

                               <div class="d-flex justify-content-center">
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <button type="submit" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                </form>
                               </div>
                            </td>
                        </tr>
                    @endforeach
                  </table>
                </div>
              </div>
@endsection