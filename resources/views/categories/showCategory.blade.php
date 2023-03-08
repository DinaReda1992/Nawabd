@extends('layouts.admin-master')

@section('content')
    <title>عرض التصنيف</title>
    <div class="container">
        <div class='row mb-15'>
            <h1><span class="badge bg-secondary"> {{ $category->category_name }}</span></h1>
        </div>
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <th>العنوان </th>
                <th>المحتوى </th>
                <th>الشعار </th>
                <th>المؤلف </th>
                <th>عرض المحتوى</th>
            </thead>
            <tbody>
                @foreach ($category->blogs as $blog)
                    <tr>
                        <td>
                            <label value="{{ $blog->id }}"
                                {{ $blog->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $blog->title }}</label>
                        </td>
                        <td>
                            <label value="{{ $blog->id }}"
                                {{ $blog->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{!! substr($blog->content, 0, 450) !!}...</label>
                        </td>
                        <td>
                            <label value="{{ $blog->id }}"
                                {{ $blog->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;<img
                                    src="{{ asset('/storage/' . $blog->logo) }}" width="100">
                            </label>
                        </td>
                        <td>
                            <label value="{{ $blog->id }}"
                                {{ $blog->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $blog->author }}</label>
                        </td>
                        <td>
                            <a href={{ route('blogs.showBlog', $blog->id) }} class="btn btn-sm btn-info"
                                title="إظهار المحتوى">
                                <i class="far fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
    </div>
@endsection
