<section class="blog-card-small content-block-9 section-top-margin">
	<div class="container">
	  <div class="center-block-1">
            <h3 class="font-comfortaa">Agenda</h3>
            <p class="margin-top30 font-asap text-extra-large">
                CurAção exige disciplina, coragem e vigor!
            </p>
        </div>
	  <div class="row">
		<div class="col-md-12">
		  <div class="carousel slide multi-item-carousel" id="theCarouseEventos">
			<div class="carousel-inner">
				@if (count($events))
					@foreach($events as $key => $event)
						@if(!$key)
							<div class="item active">
								<div class="col-xs-4">
									<a href="#1">
										<div style="width: 200px; height: 200px;">
											<span class="subh-basic-dark">Evento em {{ $event->start_at->format('d/m/Y') }} / {{ $event->end_at->format('d/m/Y') }}</span>
												<h6>{{ $event->title }}</h6>
											<span class="article-by">local <span class="author">{{ $event->location }}</span></span>
										</div>
									</a>
								</div>
							</div>
						@else
							<div class="item">
								<div class="col-xs-4">
									<a href="#1">
										<div style="width: 200px; height: 200px;">
											<span class="subh-basic-dark">Evento em {{ $event->start_at->format('d/m/Y') }} / {{ $event->end_at->format('d/m/Y') }}</span>
												<h6>{{ $event->title }}</h6>
											<span class="article-by">local <span class="author">{{ $event->location }}</span></span>
										</div>
									</a>
								</div>
							</div>
						@endif
					
					@endforeach
				@endif
			</div>
			<a class="left carousel-control" href="#theCarouseEventos" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
			<a class="right carousel-control" href="#theCarouseEventos" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
		  </div>
		</div>
	  </div>
	</div>
</section>

@push('styles')
<style type="text/css">
#theCarouseEventos{
  .carousel-inner{
    > .item{
      transition: 500ms ease-in-out left;
    }
    .active{
      &.left{
        left:-33%;
      }
      &.right{
        left:33%;
      }
    }
    .next{
      left: 33%;
    }
    .prev{
      left: -33%;
    }
    @media all and (transform-3d), (-webkit-transform-3d) {
      > .item{
        // use your favourite prefixer here
        transition: 500ms ease-in-out left;
        transition: 500ms ease-in-out all;
        backface-visibility: visible;
        transform: none!important;
      }
    }
  }
  .carouse-control{
    &.left, &.right{
      background-image: none;
    }
  }
}

// non-related styling:
body{
  background: #333;
  color: #ddd;
}
h1{
  color: white;
  font-size: 2.25em;
  text-align: center;
  margin-top: 1em;
  margin-bottom: 2em;
  text-shadow: 0px 2px 0px rgba(0, 0, 0, 1);
}
</style>
@endpush

@push('scripts')
<script>
    // Instantiate the Bootstrap carousel
$('#theCarouseEventos').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('#theCarouseEventos .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</script>
@endpush