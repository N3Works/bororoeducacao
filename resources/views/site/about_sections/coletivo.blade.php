<!-- Team Style 4 -->
<section class="section-padding team-4">
    <div class="container">
        <div class="center-block-1">
            <!-- main heading -->
            <img src="{{ asset('/images/coworking.png') }}" alt="Coworking Bororó25" width="100%">
            <!-- info -->
            <p class="margin-top30 font-asap font-18 text-grey">
                Reconhecemos que o funcionamento humano é regido por forças do corpo, da mente e da alma, indissociáveis
                e primordialmente inconscientes.
            </p>
        </div>
        <!-- main wrapper -->
        <div class="row all-details-wrapper">

            @foreach($persons as $person)
                <div class="col-md-3 col-xs-6">
                    <figure>
                        <div class="img-wrapper">
                            <img class="img-responsive img-center"
                                 src="{{ asset('uploads/person/' . $person->thumbnail_img) }}"
                                 alt="{{ $person->name }}">
                        </div>
                        <!-- member info -->
                        <figcaption>
                            <!-- name -->
                            <span class="name">{{ $person->name }}</span>

                            <!-- social sharing buttons -->
                            <div class="social">
                                @if ($person->url_facebook)
                                    <a href="{{ $person->url_facebook }}" target="_blank" class="ti-facebook"></a>
                                @endif

                                @if ($person->url_instagram)
                                    <a href="{{ $person->url_instagram }}" target="_blank" class="ti-instagram"></a>
                                @endif

                                @if ($person->url_linkedin)
                                    <a href="{{ $person->url_linkedin }}" target="_blank" class="ti-linkedin"></a>
                                @endif

                                @if ($person->description)
                                    <a href="javascript:showModal('{{ $person->id }}')" class="ti-plus"
                                       title="Saiba mais!"></a>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach

            <div class="col-md-3 col-xs-6 text-center">
                <a class="ti-plus icon bttn-scale margin-top30" href="/contato"></a>
                <span class="subh-basic-dark text-main-1 join margin-top20">Faça Parte!</span>
                <p class="margin-top20 text-grey">Nós queremos que você se junte ao nosso coletivo. Sinta-se a vontade
                    de entrar em contato!</p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<!-- Modal -->
<div class="modal fade" id="personModal" tabindex="-1" role="dialog" aria-labelledby="personModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script>
    function showModal(id) {
        $.ajax({
            type: 'GET',
            url: "{{ route('site.about_coletivo_detail', '') }}/" + id,
            data: {},
            success: function (data) {
                $("#personModal .modal-body").html(data);
                $("#personModal").modal("show");
            }
        });
    }
</script>
@endpush