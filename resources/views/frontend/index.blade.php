@extends('frontend.apps.app')

@section('content')

<div class="header-spacer"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            @if($firstPost != NULL)
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="{{ asset($firstPost->featured) }}" alt="{{ $firstPost->title }}">
                    <div class="overlay"></div>
                    <a href="{{ asset($firstPost->featured) }}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="{{route('single.post',['slug'=>$firstPost->slug])}}" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info text-center">

                        <h2 class="post__title entry-title">
                            <a href="{{ route('single.post',['slug'=>$firstPost->slug]) }}">
                                {!! $firstPost->title !!}
                            </a>
                        </h2>

                        <div class="post-additional-info">

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-04-17 12:00:00">
                                    {!! $firstPost->created_at->diffForHumans() !!}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('single.category',['id' => $firstPost->category->id]) }}">{{ $firstPost->category->category }}</a>
                            </span>

                            <span class="post__comments">
                                <a href="">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    6
                                </a>
                            </span>

                        </div>
                    </div>
                </div>

            </article>
            @endif
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            @if($secondPost != NULL)
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img class="thumb-img-fixed-size" src="{{ asset($secondPost->featured) }}" alt="{{ $secondPost->title }}">
                    <div class="overlay"></div>
                    <a href="{{ asset($secondPost->featured) }}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="{{route('single.post',['slug'=>$secondPost->slug])}}" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info text-center">

                        <h2 class="post__title entry-title">
                            <a href="{{route('single.post',['slug'=>$secondPost->slug])}}">{{ $secondPost->title }}</a>
                        </h2>

                        <div class="post-additional-info">

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-04-17 12:00:00">
                                    {{ $secondPost->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('single.category',['id' => $secondPost->category->id]) }}">{{ $secondPost->category->category }}</a>
                            </span>

                            <span class="post__comments">
                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                6
                            </span>

                        </div>
                    </div>
                </div>

            </article>
            @endif
        </div>
        <div class="col-lg-6">
            @if($thirdPost != NULL)
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img class="thumb-img-fixed-size" src="{{ asset($thirdPost->featured) }}" alt="{{ $thirdPost->title }}">
                    <div class="overlay"></div>
                    <a href="{{ asset($thirdPost->featured) }}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="{{route('single.post',['slug'=>$thirdPost->slug])}}" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info text-center">

                        <h2 class="post__title entry-title ">
                            <a href="{{route('single.post',['slug'=>$thirdPost->slug])}}">{{ $thirdPost->title }}</a>
                        </h2>

                        <div class="post-additional-info">

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-04-17 12:00:00">
                                    {{ $thirdPost->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('single.category',['id' => $thirdPost->category->id]) }}">{{ $thirdPost->category->category }}</a>
                            </span>

                            <span class="post__comments">
                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                6
                            </span>

                        </div>
                    </div>
                </div>

            </article>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
        <div class="container">
            <div class="col-lg-12">
                @if($catA != NULL)
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">
                                    <a href="{{ route('single.category',['id' => $catA->id]) }}">
                                        {{ $catA->category }}
                                    </a>
                                </h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($catA->posts()->orderBy('created_at', 'DESC')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img class="thumb-img-fixed-size-cat" src="{{ asset($post->featured) }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title text-center">
                                        <a href="{{ route('single.post',['slug'=>$post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                @endif

                @if($catB != NULL)
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">
                                    <a href="{{ route('single.category',['id' => $catB->id]) }}">
                                        {{ $catB->category }}
                                    </a>
                                </h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($catB->posts()->orderBy('created_at', 'DESC')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img class="thumb-img-fixed-size-cat" src="{{ asset($post->featured) }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title text-center">
                                        <a href="{{ route('single.post',['slug'=>$post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                @endif

                @if($catC != NULL)
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">
                                    <a href="{{ route('single.category',['id' => $catC->id]) }}">
                                        {{ $catC->category }}
                                    </a>
                                </h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($catC->posts()->orderBy('created_at', 'DESC')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img class="thumb-img-fixed-size-cat" src="{{ asset($post->featured) }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title text-center">
                                        <a href="{{ route('single.post',['slug'=>$post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
{{--
    @section('disqus')
    <script id="dsq-count-scr" src="//laravels-blog-5hw0frwxv7.disqus.com/count.js" async></script>
    @endsection --}}
