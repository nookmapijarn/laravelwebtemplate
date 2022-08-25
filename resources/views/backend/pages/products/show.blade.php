@extends('backend.layouts.main_template')
@section('title') Product Detail @parent @endsection
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('backend/products') }}">Product List</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <h5>Name</h5>
                <p>{{ $product->name }}</p>

                <h5>Slug</h5>
                <p>{{ $product->slug }}</p>

                <h5>Description</h5>
                <p>{{ $product->description }}</p>

                <h5>Price</h5>
                <p>{{ $product->price }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection