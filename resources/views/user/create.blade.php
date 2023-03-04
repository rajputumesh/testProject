
@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Users Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-5">
            <div class="row mt-3">
                <div class="col-md-12">
                  <form id="formId" methode="post" action="{{route('user.store')}}" data-route="{{route('user.index')}}">
                    @csrf
                        <div class="forn-group mb-3">
                            <label> Name </label>
                            <input class="form-control" type="text" name="name"/>
                        </div>
                        <div class="forn-group mb-3">
                            <label> Email </label>
                            <input class="form-control" type="email" name="email"/>
                        </div>
                        <div class="forn-group mb-3">
                            <label> Password</label>
                            <input class="form-control" type="password" name="password"/>
                        </div>
                        <div  class="forn-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection
