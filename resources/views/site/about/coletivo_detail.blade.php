<!-- Team Style 4 -->
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<section class="team-4">
    <div class="col-md-6">
        <img class="img-responsive img-center" src="{{ asset('uploads/person/' . $model->thumbnail_img) }}" alt="{{ $model->name }}">
    </div>
    <div class="col-md-6">
        <h3 class="letter-spacing0 font-playfair text-center">
            {{ $model->name }}
        </h3>
        <!-- info -->
        <p class="margin-top30 font-hind text-extra-large">{!! $model->content !!}</p>
    </div>
</section>
