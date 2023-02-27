@extends('layouts.user-master')
@section('content')
    <div class="blog-page-bg">
        <div class="shapes shape-one"></div>
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <title>المقالات</title>
        <div class="container">
    {{--  <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif 
</div>  --}}
            <div class="row">
                <div class="col-lg-8 feature-blog-one width-lg">
                    @foreach ($blogs as $blog)
                        <div class="post-meta">
                            <a href={{ route('blogs.showBlogUser', $blog->id) }} title="إظهار المحتوى">
                                <img src="{{ asset('images/' . $blog->logo) }}" class='image-meta'
                                    style="margin-top:25px"></a>
                            <div class="post" style="border: 2px gray bold">
                                <div class="date">
                                    {{ $blog->created_at->format('d/m/Y')}}
                                </div>
                                <h3><a href={{ route('blogs.showBlogUser', $blog->id) }} title="إظهار المحتوى"
                                        class="title">
                                        {{ $blog->title }}</a></h3>
                                <div>
                                    {!! substr($blog->content,0,480) !!}...

                                </div>
                                <a href={{ route('blogs.showBlogUser', $blog->id) }} class="read-more">
                                    <span>المزيد...</span>
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class='page-pagination-one pt-15'>
                        <div class="d-flex align-items-center">
                            {!! $blogs->withQueryString()->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-sidebar-one p-0">
                        <div class="sidebar-search-form mb-85 sm-mb-60">
                            <form method="GET">
                                <input type="text" name="search" value="{{ request()->get('search') }}"
                                    class="form-control" placeholder="بحث..." aria-label="Search"
                                    aria-describedby="button-addon2">
                                <button type="submit" id="button-addon2">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="sidebar-categories mb-85 sm-mb-60">
                            <h4 class="sidebar-title">التصنيفات</h4>
                            @foreach ($categories as $category)
                                @if ($category->blogs && count($category->blogs) > 0)
                                    <div>
                                        <h5 class="font-weight-bolder text-primary mb-2">{{ $category->category_name }}</h5>

                                        <ul id="category{{ $category->id }}" class="">

                                            <li>
                                                @foreach ($category->blogs as $blog)
                                                    <a href={{ route('blogs.showBlogUser', $blog->id) }}>
                                                        {!! substr($blog->title,0,60) !!}...
                                                    </a>
                                                @endforeach
                                            </li>

                                        </ul>

                                    </div> <!-- /.sidebar-categories -->
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
