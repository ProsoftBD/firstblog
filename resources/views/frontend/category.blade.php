@extends('frontend.apps.app')

@section('content')

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category: {{ $category->category }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="row">
                <div class="case-item-wrap">
                    @if($category->posts->count()>0)
                    @foreach ($category->posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item" style="margin:12px 0">
                            <div class="case-item__thumb">
                                <img class="thumb-img-fixed-size-cat" src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
                            </div>
                            <a href="{{ route('single.post', ['slug'=>$post->slug])}}">
                                <h6 class="case-item__title">
                                    {{ $post->title}}
                                </h6>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h2 class="text-center">
                        Post Not Found!
                    </h2>
                    @endif
                </div>
            </div>
            <!-- End Post Details -->
        </main>
    </div>
</div>
@endsection

