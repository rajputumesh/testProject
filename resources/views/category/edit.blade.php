
@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">category Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-5">
            <div class="row mt-3">
                <div class="col-md-12">
                  <form id="formId" methode="post" action="{{route('category.update', $category->id)}}" data-route="{{route('category.index')}}">
                    @csrf
                    @method('PUT')
                    <div class="forn-group mb-3">
                        <label> Name </label>
                        <input class="form-control" type="text" name="name" value="{{$category->name ?? ''}}"/>
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

