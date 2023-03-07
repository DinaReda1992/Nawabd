@extends('layouts.admin-master')
@section('content')
<title>تعديل البانر</title>
    <div class="container">
           <form action={{ route('banner.update', $banner->id) }} method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('post')
            <div class="card-body">
                <div class='row'>
                    <label for="logo">البانر الحالى</label>
                    <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                        data-height="70" value="{{ old('logo', $banner->logo) }}" autocomplete="logo" autofocus />
                    <img src="{{ asset('/storage/' . $banner->logo) }}" style="width: 1000px;height: 400px;" >
                    <h4>{{ $banner->logo }}</h4>
                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                </div><br>
            </div>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
        </form>         
    </div>
@endsection
