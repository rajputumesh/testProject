@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">categories</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-5">

            <div class="row mt-3">
                <div class="col-md-12">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success">{{session('alert-success')}}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CategoryId</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr id="remove_{{$category->id}}">
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td><div class="btn-group">
                                    <a class="btn btn-warning" href="{{route('category.edit', $category->id)}}">Edit</a>
                                    <a class="btn btn-danger text-white deleteItem" data-href="{{route('category.delete', $category->id)}}" data-id="{{$category->id}}" data-bs-toggle="modal" data-bs-target="#deleteModelId">Delete</a>
                                </div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>
  @endsection

