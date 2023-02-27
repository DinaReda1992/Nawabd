@if ($paginator->hasPages())
<ul class="pager">
    @if ($paginator->onFirstPage())
        <li class="disabled"><span>← السابق</span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← السابق</a></li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active my-active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">التالى →</a></li>
    @else
        <li class="disabled"><span>التالى →</span></li>
    @endif
</ul>
@endif 






{{--  <div class="container mt-5">

    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Creation</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    {{--  <td scope="row">{{ $blog->id }}</td>  --}}
                    {{--  <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">There are no Blogs.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {!! $blogs->links('pagination.custom') !!}
    </div>
    </div>
    
    {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}  --}} 