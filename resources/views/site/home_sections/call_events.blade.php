<section class="blog-card-small content-block-9 section-top-margin">
    <div class="container">
        <div class="center-block-1">
            <h3 class="font-comfortaa">Agenda</h3>
            <p class="margin-top30 font-asap text-extra-large">
                CurAção exige disciplina, coragem e vigor!
            </p>
        </div>
        <div class="all-details-wrapper col-md-10 just-center">
            <div class="row">
            @foreach($events as $event)
                <!-- blog post -->
                    <div class="col-md-4 col-sm-6 grid-item">
                        <a href="{{ route('site.events.detail', $event->slug) }}">
                            <!-- blog card wrapper -->
                            <div class="blog-post">
                                <!-- post image -->
                                <div class="blog-img">
                                    <img class="img-responsive"
                                         src="{{ asset('uploads/courses/' . $event->thumbnail_img) }}"
                                         alt="">
                                </div>
                                <!-- post content -->
                                <div class="blog-content">
                                    <span class="subh-basic-dark">Evento em {{ $event->start_at->format('d/m/Y') }} / {{ $event->end_at->format('d/m/Y') }}</span>
                                    <h6>{{ $event->title }}</h6>
                                    <span class="article-by">local <span class="author">{{ $event->location }}</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 text-center margin-top30">
                <a href="{{ route('site.events') }}" class="bttn bttn75 bttn-main-1 bttn-small">Agenda</a>
            </div>
        </div>
    </div>
</section>