@extends('layouts.app')

@section('title', 'home page')


@section('content')


    <div class="trending-news-box">
        <div class="row gx-5">
            <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4">
                <h4>Trending Now</h4>
                <div class="trending-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-995222e477105d1b5"><i class="flaticon-left-arrow"></i></div>
                <div class="trending-next" tabindex="0" role="button" aria-label="Next slide"
                    aria-controls="swiper-wrapper-995222e477105d1b5"><i class="flaticon-right-arrow"></i></div>
            </div>
            <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-8">

                <div class="trending-news-slider swiper swiper-initialized swiper-horizontal swiper-autoheight swiper-backface-hidden">
                    <div class="swiper-wrapper"
                        style="cursor: grab; height: 100px; transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);"
                        id="swiper-wrapper-995222e477105d1b5" aria-live="polite">

                        @foreach ($trending as $blog )
                        <div class="swiper-slide news-card-one swiper-slide-active" role="group" aria-label="1 / 4"
                            style="width: 396px; margin-right: 25px;" data-swiper-slide-index="0">
                            
                            <div class="news-card-img">
                                <img src="{{ asset('uploads/' . $blog->image) }}" alt="Image">
                            </div>
                            <div class="news-card-info">
                                <h3><a href="{{route('routeToClickedBlog',$blog->id)}}">  {{$blog->title}}  </a> </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-clock-three">  </i> {{$blog->created_at}}  </li>
                                </ul>
                               
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>

            </div>
        </div>
    </div>


    <a href="{{ route('addBlogRoute') }}"> Add Blogs </a>
    <br>
    <a href="{{ route('routeToViewBlog') }}"> View Blogs </a>


@endsection









