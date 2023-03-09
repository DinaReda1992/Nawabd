@extends('layouts.user-master')
@section('meta_tags')
    <meta name="name" content="{{ Str::ucfirst($blog->title) }}">
    <meta name="keywords" content="{{ $blog->tagList }}">
    <meta name="author" content="{{ $blog->author }}">
    <meta name="description" content="{{ $blog->content }}">
    <link rel="canonical" href="{{ route('blogs.showBlogUser', $blog->id) }}">
    <meta property="og:title" content="{{ Str::ucfirst($blog->title) }}">
    <meta property="og:content" content="{{ $blog->content }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('blogs.showBlogUser', $blog->id) }}">
    <meta property="og:image" content="assets\images\images\{{ $blog->logo }}">
    <meta name="twitter:domain" content="{{ Request::getHost() }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ Str::ucfirst($blog->title) }}">
    <meta name="twitter:description" content="{{ $blog->content }}">
    <meta name="twitter:image" content="assets\images\images\{{ $blog->logo }}">
@endsection

@section('content')
    <div class="blog-page-bg">
        <div class="shapes shape-one"></div>
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 feature-blog-one width-lg blog-details-post-v1">
                    <div class="post-meta">
                        <h5 for="category" class="fw-bolder text-primary">التصنيف</h5>
                        @foreach ($categories as $category)
                            @if ($category->id == $blog->category_id)
                                <label>{{ $category->category_name }}</label>
                            @endif
                        @endforeach
                        <hr>
                        <h4 class="pt-2 pb-1 fs-4">{{ $blog->title }}</h4>
                        <img src="{{ asset('/storage/' . $blog->logo) }}" class="image-meta">
                        <div class="date">
                            {{ $blog->created_at->format('d/m/Y') }}
                        </div>
                        <b>{{ $blog->author }}
                        </b>
                        <hr>
                        <p>{!! $blog->content !!}</p>
                        <div class="d-sm-flex align-items-center justify-content-between share-area">
                            <ul class="share-option d-flex align-items-center">
                                <li>مشاركة</li>
                                <li><a href="https://wa.me/?text=%0ahttp://blog.nawabd.com/{{ $blog->id }}/blog"
                                        style="background: #06cc6b;"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="https://twitter.com/intent/tweet?url=http://blog.nawabd.com/{{ $blog->id }}/blog"
                                        style="background: #41CFED;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://blog.nawabd.com/{{ $blog->id }}/blog "
                                        style="background: #588DE7;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.feature-blog-one -->
    <title>عرض المحتوى</title>
    <div class="blog-page-white-bg blog-v3">
        <div class="container">
            {{--  User card  --}}

        </div>
    </div>
@endsection
