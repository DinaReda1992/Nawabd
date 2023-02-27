@extends('layouts.admin-master')

@section('content')
    <title>عرض المحتوى</title>
    <div class="card-header">
            <div class="card-body">
                <div class='row'>
                    <h1> {{ $blog->title }}</h1><hr>
                </div><br>
                <div class='row'>
                    <label for="category" class="control-label">التصنيف</label>
                    <select name="category_id" class="form-control SlectBox" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus disabled>
                        <!--placeholder-->
                        @foreach ($categories as $category)
                        <option value={{ $category->id }} @selected($category->id == $blog->category_id) disabled> {{ $category->category_name }}</option>
                        <label for="category" class="control-label">{{ $category->category_name }}</label>
                        @endforeach
                    </select><hr>
                </div><br>
                <div class='row'>
                    <label for="content" class="control-label">محتوى المدونة</label>
                    <b>{{ $blog->content }} </b><hr>
                </div>
                <div class='row'>
                    <label for="author" class="control-label">المؤلف</label>
                    <label for="author" class="control-label">{{ $blog->author}}</label>
                </div><hr>
                <div class='row'>
                    <label for="logo">الشعار</label>
                    <img src="{{ asset('images/' . $blog->logo) }}" width="100">
                </div><br>
            </div>
    </div>
@endsection
