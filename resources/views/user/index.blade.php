@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
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
                                <th>UserId</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr id="remove_{{$user->id}}">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><div class="btn-group">
                                    <a class="btn btn-warning" href="{{route('user.edit', $user->id)}}">Edit</a>
                                    <a class="btn btn-danger text-white deleteItem" data-href="{{route('user.delete', $user->id)}}" data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#deleteModelId">Delete</a>
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

