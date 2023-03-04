
@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Users Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-5">
            <div class="row mt-3">
                <div class="col-md-12">
                  <form id="formId" methode="post" action="{{route('user.update', $user->id)}}" data-route="{{route('user.index')}}">
                    @csrf
                    @method('PUT')
                    <div class="forn-group mb-3">
                        <label> Name </label>
                        <input class="form-control" type="text" name="name" value="{{$user->name ?? ''}}"/>
                    </div>
                    <div class="forn-group mb-3">
                        <label> Email </label>
                        <input class="form-control" type="email" name="email" value="{{$user->email ?? ''}}"/>
                    </div>
                    <div  class="forn-group mb-3">
                        <button type="submit" class="btn btn-primary my-5">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection

