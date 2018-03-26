<section class="blog-card-small content-block-9 section-top-margin">
    <div class="container">
        <div class="center-block-1">
            <h3 class="font-comfortaa">Blog da Bororó25</h3>
            <p class="margin-top30 font-asap text-extra-large">
                Viver bem é curar-se o tempo todo, todo o tempo!
            </p>
        </div>
        <div class="all-details-wrapper col-md-10 just-center">
            <div class="row">

            @foreach($posts as $post)
                <!-- blog post -->
                    <div class="col-md-4 col-sm-6 grid-item">
                        <a href="{{ route('blog.post', $post->slug) }}">
                            <!-- blog card wrapper -->
                            <div class="blog-post">
                                <!-- post image -->
                                <div class="blog-img">
                                    <img class="img-responsive" src="{{ asset('uploads/posts/' . $post->thumbnail_img) }}"
                                         alt="">
                                </div>
                                <!-- post content -->
                                <div class="blog-content">
                                    <span class="subh-basic-dark">{{ $post->publish_at->format('d/m/Y H:m') }}</span>
                                    <h6>{{ $post->title }}</h6>
                                    {{--<span class="article-by">by <span class="author">Bruce Garrett</span></span>--}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 text-center margin-top30">
                <a href="{{ route('site.blog') }}" class="bttn bttn75 bttn-main-1 bttn-small">Ver mais</a>
            </div>
        </div>
    </div>
</section>