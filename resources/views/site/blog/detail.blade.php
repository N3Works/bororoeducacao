@extends('layouts.app')

@push('metatags')
<title>{{ $model->title }}</title>
<meta content="{{ $model->title }}" name="title">
<meta content="{{ $model->description_seo }}">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="{{ $model->keywords_seo }}">

<meta property='og:type' content='blog'>
<meta property="og:title" content="{{ $model->title }}">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:description" content="{{ $model->description_seo }}">

<meta property="article:published_time" content="{{ $model->publish_at }}">
<meta property="article:modified_time" content="{{ $model->updated_at }}">
<meta property="article:section" content="Blog">
<meta property="article:tag" content="{{ $model->keywords_seo }}">

<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
@if ($model->thumbnail_img)
    <meta property="og:image" content="http://bororo25.com/uploads/posts/{{ $model->thumbnail_img }}">
@else
    <meta property="og:image" content="http://bororo25.com/images/share.jpg">
@endif

<meta property="og:locale" content="pt_BR">
@endpush

@section('content')
    <section class="blog-post-title bg-cover-simple" style="background-image: url('/uploads/posts/{{ $model->cover_img }}')">
        <div class="container">
            <div class="title-box">
                <h3 class="text-white">{{ $model->title }}</h3>
                <p>{{ $model->description }}</p>
                <span class="article-by"><span class="author">{{ $model->publish_at->format('d/m/Y') }}</span></span>
            </div>
        </div>
    </section>
    <!-- Main Post -->
    <section class="blog-single-page section-padding-small">
        <div class="container">
            <div class="col-md-8 col-sm-10 just-center no-padding">
            {!! $model->content !!}
            <!-- Pagination style 3 -->
                <div class="pagination">
                    <ul class="mod-pagination move-buttons custom-icons">
						
                        @if ($last)
                            <li class="button"><a href="{{ url('/blog/'. $last->slug) }}">Artigo Anterior</a></li>
                        @endif

                        @if ($next)
                            <li class="button"><a href="{{ url('/blog/'. $next->slug) }}">Proximo Artigo</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Comments -->
    <section class="blog-comment section-padding-small">
        <div class="container">
            <h6 class="text-center font-w600">Compartilhe este artigo</h6>
            <!-- Social Share -->
            <div class="social-share text-center">
                <a href="javascript:twitterShare('{{ $model->title }}', '{{ Request::url() }}')" class="bttn-scale twitter"><span class="fa fa-twitter"></span>Twitter</a>
                <a href="javascript:fbShare('{{ Request::url() }}')" class="bttn-scale facebook"><span class="fa fa-facebook"></span>Facebook</a>
            </div>
        </div>
    </section>
@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/blog.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>

<script>
    $(function () {
        // masonry grid
        var $grid = $('.blog-card-small .blog-wrapper').masonry({
            itemSelector: '.grid-item'
        });
        $grid.imagesLoaded().progress(function () {
            $grid.masonry('layout');
        });
    })
</script>
@endpush