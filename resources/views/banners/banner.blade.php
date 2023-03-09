@extends('layouts.admin-master')
@section('content')
    <div class='errors'>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('edit') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('Add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('Error'))
            <div class='alert alert-danger alert-dismissable fade show' role="alert">
                <strong>{{ session()->get('Error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                @foreach ($banner as $ban)
                    <img src="{{ asset('/storage/' . $ban->logo) }}" width="1170px" height="186px">
            </div>
            <div class="col-12 text-end">
                <a href={{ route('banner.edit', $ban->id) }} class="btn btn-secondary my-3 px-5 text-white"
                    style="padding: 20px"><i class="fas fa-edit"></i> تعديل البانر </a>
                @endforeach
                <a href="{{ url('/blogs') }}" class="btn btn-secondary my-3 px-5 text-white " style="padding: 20px">تراجع</a>
            </div>
        </div>
    </div>
@endsection
