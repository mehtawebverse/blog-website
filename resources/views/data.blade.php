{{-- @foreach ($allBlogs as $post)
<div class="card mb-2"> 
    <div class="card-body">{{ $post->id }} 
        <h5 class="card-title">{{ $post->title }}</h5>
        {!! $post->body !!}
    </div>
</div>
@endforeach --}}



@foreach ($allBlogs as $post)
                            <div class="col-md-6">
                                <div class="news-card-thirteen">
                                    <a href="{{ route('routeToClickedBlog', $post->id) }}">
                                        <div class="news-card-img">
                                            <img src="{{ asset('uploads/' . $post->image) }}" alt="Image">

                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">{{ $post->title }}</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="news-by-date.html">{{ $post->created_at }}</a></li>

                                            </ul>
                                        </div>
                                </div>
                            </div>
                        @endforeach