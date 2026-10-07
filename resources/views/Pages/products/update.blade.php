@extends('layouts.base')
@section('title','Form Edit Data Produk')
@section('main')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Advanced Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Product</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Product</h2>


            <div class="card">
                <form action="{{route('products.update',$product)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Input Text</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                name="name" value="{{ $product->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text"
                                class="form-control @error('description')
                            is-invalid
                        @enderror"
                                name="description" value="{{ $product->description }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number"
                                class="form-control @error('price')
                            is-invalid
                        @enderror"
                                name="price" value="{{ $product->price }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number"
                                class="form-control @error('stock')
                            is-invalid
                        @enderror"
                                name="stock" value="{{ $product->stock }}">
                            @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-control selectric @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option value="">Choose Category</option>
                                @foreach ($category as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $row->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $row->name }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Photo Product</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image"
                                    @error('image') is-invalid @enderror>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="published" class="selectgroup-input"
                                    {{ $product->status == 'published' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Published</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="archived" class="selectgroup-input"
                                    {{ $product->status == 'archived' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Archived</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Creteria</label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="criteria" value="perorangan" class="selectgroup-input"
                                    {{ $product->criteria == 'perorangan' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Perorangan</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="criteria" value="rombongan" class="selectgroup-input"
                                    {{ $product->criteria == 'rombongan' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Rombongan</span>
                                </label>
                            </div>
                        </div>

                        {{-- is favorite --}}
                        <div class="form-group">
                            <label class="form-label">Is Favorite</label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="favorite" value="1" class="selectgroup-input"
                                    {{ $product->favorite == 1 ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Yes</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="favorite" value="0" class="selectgroup-input"
                                    {{ $product->favorite == 0 ? 'checked' : '' }}>
                                    <span class="selectgroup-button">No</span>
                                </label>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection
