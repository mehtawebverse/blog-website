


@extends('layouts.app')

@section('title', 'Feeds')

@section('content')


    <div class="news-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <article>
                        <div class="news-img">
                            <img src="{{ asset('uploads/' . $clicked->image) }}" alt="Iamge">

                        </div>
                        <ul class="news-metainfo list-style">
                            <li class="author">


                                @foreach ($clicked->users as $user)
                                    <strong>{{ $user->name }}</strong>
                                @endforeach


                            </li>
                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                    href="news-by-date.html">{{ $clicked->created_at }}</a></li>

                        </ul>
                        <div class="news-para">
                            <h1>{{ $clicked->title }}</h1>

                            {{-- <p>{!! Purifier::clean($clicked->description) !!}</p> --}}
                            <p>{!!$clicked->description !!}</p>
                        </div>
                    </article>



                    <div id="cmt-form">
                        <div class="mb-30">
                            <h3 class="comment-box-title">Leave A Comment</h3>

                        </div>
                        <form action="{{ route('routeToComment', $clicked->id) }}" method="post" class="comment-form">
                            @csrf
                            <div class="row">

                                @if (auth()->check())
                                @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" required=""
                                                placeholder="Name*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" required=""
                                                placeholder="Enter your email it will not be published.*">
                                        </div>
                                    </div>
                                @endif





                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Please Enter Your Comment Here"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn-two">Post A Comment<i
                                            class="flaticon-right-arrow"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>




                    <h3 class="comment-box-title">{{ $clicked->comments->count() }} Comments</h3>
                    <div class="comment-item-wrap">



                        <div class="comment-item-wrap">
                            @if ($clicked->comments->count() > 0)
                                <ul class="comment-list">
                                    @foreach ($clicked->comments as $comment)
                                        <li class="comment-item">
                                            <div class="comment-author-wrap">
                                                <div class="comment-author-info">
                                                    <div class="row align-items-start">
                                                        <div
                                                            class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">

                                                            <div class="comment-author-name">
                                                                <h5>
                                                                    @if ($comment->user)
                                                                        {{ $comment->user->name }}
                                                                    @else
                                                                        {{ $comment->username }}
                                                                    @endif
                                                                </h5>
                                                                <span
                                                                    class="comment-date">{{ $comment->created_at->format('M d, Y | h:i A') }}</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                            <div class="comment-text">
                                                                <p>{{ $comment->comment }}

                                                                    
                                                                        


                                                                        @if ($comment->replies->count() > 0)
                                                                        <ul>
                                                                            @foreach ($comment->replies as $reply)
                                                                                
                                                                                <li> <strong> {{$reply->username}} :</strong> {{ $reply->reply }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                        @endif







                                                                

                                                                    @if (auth()->check())
                                                                    @if (auth()->user()->id == 1 || auth()->user()->id == $comment->user_id)
                                                                    <form action = "{{route('routeToDeleteComment',$comment->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit">
                                                                        <span class="delete-icon"> <i class="ri-delete-bin-6-line"></i> </span> 
                                                                        </button>
                                                                    </form>
                                                                    @endif
                                                                @endif


                                                                    


                                                                </p>

                                                                <a href="#reply-form" class="reply-btn" onclick="showReplyForm()">Reply</a>

                                                                <div id="reply-form" style="display: none;">
                                                                    <!-- Your reply form content goes here -->
                                                                    <form action="{{route('routeToReply',$comment->id)}}" method="post">
                                                                        @csrf
                                                                        <!-- Add your reply form fields here -->
                                                                        <textarea name="reply_content" placeholder="Enter your reply"></textarea>
                                                                        <button type="submit" class="btn-three">Submit Reply</button>
                                                                    </form>
                                                                </div>


                                                               



                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>




                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="no-comments">Be the first person to comment on this post.</p>
                            @endif
                        </div>
                    </div>








                </div>
                <div class="col-lg-4">


                    <div class="sidebar">
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
                                @foreach($list as $tag)
                                <li><a href="{{route('routeToViewByTag',$tag->tag_name)}}">{{$tag->tag_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



{{-- 
<script>
    function toggleReplyForm(commentId) {
        var replyForm = document.querySelector('.reply-form[data-comment-id="' + commentId + '"]');
        if (replyForm.style.display === 'none' || replyForm.style.display === '') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
    }
</script> --}}

<script>
    function showReplyForm() {
        document.getElementById('reply-form').style.display = 'block';
    }
</script>

@endsection