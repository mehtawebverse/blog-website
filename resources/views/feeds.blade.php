@extends('layouts.app')

@section('title', 'Feeds')

@section('content')



    <div class="hero-slider-wrap">
        <div class="hero-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($lastBlogs as $blog)
                    <div class="swiper-slide hero-news-card">
                        <img src="{{ asset('uploads/' . $blog->image) }}" alt="Image" width="100%" height="100%">
                        <div class="hero-news-info">
                            <a href="business.html" class="news-cat">{{ $blog->title }}</a>
                            {{-- <h3><a href="business-details.html">{{$blog->description}}</a></h3> --}}
                            {{-- <p>{{ $blog->description }}.</p> --}}
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                        href="news-by-date.html">{{ $blog->created_at }}</a></li>
                                <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="hero-next"><i class="fi-rr-angle-right"></i></div>
            <div class="hero-prev"><i class="fi-rr-angle-left"></i></div>
        </div>
    </div>



    <div class="sports-wrap ptb-100">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <div class="row justify-content-center">


                        <div id="data-wrapper">
                            @include('data')
                        </div>

                        {{-- @foreach ($list as $blog)
                            <div class="col-md-6">
                                <div class="news-card-thirteen">
                                    <a href="{{ route('routeToClickedBlog', $blog->id) }}">
                                        <div class="news-card-img">
                                            <img src="{{ asset('uploads/' . $blog->image) }}" alt="Image">

                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">{{ $blog->title }}</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="news-by-date.html">{{ $blog->created_at }}</a></li>

                                            </ul>
                                        </div>
                                </div>
                            </div>
                        @endforeach --}}

                       

                    </div>
                    {{-- <ul class="page-nav list-style text-center mt-20">
                        <li><a href="business.html"><i class="flaticon-arrow-left"></i></a></li>
                        <li><a class="active" href="business.html">01</a></li>
                        <li><a href="business.html">02</a></li>
                        <li><a href="business.html">03</a></li>
                        <li><a href="business.html"><i class="flaticon-arrow-right"></i></a></li>
                    </ul> --}}


                </div>


                <div class="col-lg-4">
                    
                        <div class="sidebar" style="margin-bottom: 20px;">
                            <div class="sidebar-widget">
                                <h3 class="sidebar-widget-title">Popular Categories</h3>
                                <ul class="tag-list list-style">
                                    @foreach($popcat as $cat)
                                    <li><a href="{{route('routeToViewByCat',$cat->cat_name)}}"> {{$cat->cat_name}}  </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h3 class="sidebar-widget-title">Popular Tags</h3>
                                <ul class="tag-list list-style">
                                    @foreach($poptag as $tag)
                                    <li><a href="{{route('routeToViewByTag',$tag->tag_name)}}">{{$tag->tag_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    
                </div>

                

            </div>
        </div>
        
      


      
        
    </div>
    


  
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script >
        var ENDPOINT = "{{ route('routeToLatestBlogs') }}";
        var page = 1;
      
        /*------------------------------------------
        --------------------------------------------
        Call on Scroll
        --------------------------------------------
        --------------------------------------------*/
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 20)) {
                page++;
                infinteLoadMore(page);
            }
        });
      
        /*------------------------------------------
        --------------------------------------------
        call infinteLoadMore()
        --------------------------------------------
        --------------------------------------------*/
        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response) {
                    if (response.html == '') {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
      
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>


    {{-- {{$list->links()}} --}}




    @endsection