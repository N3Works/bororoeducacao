@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Blog</title>
<meta content="Bororó 25 | Blog" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Blog">
<meta property="og:url" content="http://www.bororo25.com.br/blog">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')

    <section class="blog-card-small section-top-margin border-bottom-light">
        <div class="container">
          <h3 class="font-comfortaa text-main-2 text-center">
              <b> Acompanhe o blog do projeto! </b>
          </h3>
          <br>
          <p class="margin-top30 text-large" style="text-align:center">
            Assine nosso boletim e receba reflexões sobre saúde emocional e autoconhecimento.
          </p>
          <br>
            <div class="row">
                <div class="col-md-9 no-padding">
                    <!-- Main Wrapper -->
                    <div class="blog-wrapper">

                    @foreach ($posts as $post)
                        <!-- Blog Post -->
                            <div class="col-sm-6 grid-item">
                                <a href="{{ route('blog.post', $post->slug) }}">
                                    <!-- blog card wrapper -->
                                    <div class="blog-post">
                                        <!-- post image -->
                                        <div class="blog-img">
                                            <img class="img-responsive"
                                                 src="{{ asset('uploads/posts/' . $post->thumbnail_img) }}"
                                                 alt="">
                                        </div>

                                        <!-- post content -->
                                        <div class="blog-content">
                                            <span class="subh-basic-dark">{{ Carbon\Carbon::parse($post->publish_at)->format('d/m/Y') }}</span>
                                            <h6>{{ $post->title }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-xs-12">
                        <!-- Pagination style 3 -->
                        <div class="pagination">
                            <ul class="mod-pagination move-buttons custom-icons">
                                <li class="button"><a class="@if ($offset == 0) disabled @endif"
                                                      href="@if ($offset > 0) javascript:pagination('{{ $offset - 1 }}') @endif">Anterior</a>
                                </li>

                                @for ($i = 0; $i < ceil($count/6); $i++)
                                    <li>
                                        <a class="@if ($i == $offset) current @endif"
                                           href="javascript:pagination('{{ $i }}')">
                                            {{$i+1}}
                                        </a>
                                    </li>
                                @endfor

                                <li class="button"><a class="@if ($offset == (ceil($count/6)-1)) disabled @endif"
                                                      href="@if ($offset < (ceil($count/6)-1)) javascript:pagination('{{ $offset + 1 }}') @endif">Próximo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-3 hidden-xs hidden-sm">

                    <div class="blog-popular">
                        <span class="subh-basic-dark">Últimas postagens</span>

                        @foreach($last as $post)
                            <div class="popular-post">
                                <a href="{{ route('blog.post', $post->slug) }}" class="clearfix">
                                    <div class="pop-img">
                                        <img class="img-responsive"
                                             src="{{ asset('uploads/posts/' . $post->thumbnail_img) }}" alt="">
                                    </div>
                                    <div class="pop-title">
                                        <h6>{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <div class="blog-tags">
                            <span class="subh-basic-dark">Tags</span>
                            <ul>
                                @foreach($tags as $tag)
                                    <li><a href="javascript:tag('{{ $tag->name }}')">{{$tag->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- About us -->
                        <div class="blog-about">
                            <span class="subh-basic-dark">A bororó25</span>
                            <p>
                                A Bororó25 - a arte de SE fazer feliz - é um espaço formado pela Editora Bororó25 e o
                                Coworking B25.
                            </p>
                            <p>
                                A Editora Bororó25 dedica-se à produção de conhecimento embasado no Método Curação.
                            </p>
                            <p>
                                Nosso propósito é que cada pessoa desenvolva suas habilidades emocionais com autonomia
                                para produzir um viver saudável.
                            </p>
                        </div>
                    </div>
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
