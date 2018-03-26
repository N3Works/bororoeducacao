@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <h2> {{ $model->id ? 'Editar Evento' : 'Novo Evento' }}</h2>
    </div>

    <form action="{{ $model->id ? route('admin.courses.update', $model->slug) : route('admin.courses.save') }}"
          method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="latitude" id="latitude" value="{{ $model->latitude }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ $model->longitude }}">

        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                <a href="/admin/evento/listar" class="btn btn-default pull-right">Voltar</a>
                <br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Dados Principais</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $model->title }}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" rows="4"
                                      class="form-control" required>{{ $model->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="title">Link Vídeo</label>
                            <input type="text" class="form-control" name="video_link" id="video_link"
                                   value="{{ $model->video_link }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="description">Preço</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ $model->price }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Configuração</label>
                            <input class="magic-checkbox" type="checkbox" name="is_active" id="is_active"
                                   @if ($model->is_active) checked @endif>
                            <label for="is_active">Ativo</label>

                            <input class="magic-checkbox" type="checkbox" name="is_price_visible" id="is_price_visible"
                                   @if ($model->is_price_visible) checked @endif>
                            <label for="is_price_visible">Preço Visível</label>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Conteúdo</h2>
                </div>
                <div class="panel-body">
                    <textarea name="content" id="content" cols="30" rows="10">{{ $model->content }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>SEO</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="description_seo">Descrição SEO</label>
                            <textarea name="description_seo" id="description_seo" rows="4"
                                      class="form-control" required>{{ $model->description_seo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="keywords_seo">Palavras-chave</label>
                            <input type="text" class="form-control" name="keywords_seo" id="keywords_seo"
                                   value="{{ $model->keywords_seo }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Localização</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="address" id="address"
                                   value="{{ $model->address }}">
                        </div>
                        <div class="col-md-4">
                            <label>Local</label>
                            <input type="text" class="form-control" name="location" id="location"
                                   value="{{ $model->location }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div id="map" style="width: 100%; height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Agenda</h2>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Duração (horas)</label>
                            <input type="text" class="form-control" name="duration" id="duration" value="{{ $model->duration }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Data Início</label>
                            <input type="text" class="form-control" name="start_at" id="start_at"
                                   value="{{ $model->start_at->format('d/m/Y') }}">
                        </div>
                        <div class="col-md-4">
                            <label>Horário Início</label>
                            <input type="text" class="form-control" name="start_time" id="start_time"
                                   value="{{ $model->start_time }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Data Fim</label>
                            <input type="text" class="form-control" name="end_at" id="end_at"
                                   value="{{ $model->end_at->format('d/m/Y') }}">
                        </div>
                        <div class="col-md-4">
                            <label>Horário Fim</label>
                            <input type="text" class="form-control" name="end_time" id="end_time"
                                   value="{{ $model->end_time }}">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{--<div class="col-md-12">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h2>Professores</h2>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<select class="form-control select2" id="professor_select"></select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<table id="professor_table" class="table table-bordered">--}}
                            {{--<thead>--}}
                            {{--<th>Nome</th>--}}
                            {{--<th>Ação</th>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($model->professors as $prof)--}}
                                {{--<tr data-id="{{ $prof->id }}">--}}
                                    {{--<input type="hidden" name="professor[]" value="{{ $prof->id }}">--}}
                                    {{--<td>{{ $prof->name }}</td>--}}
                                    {{--<td>--}}
                                        {{--<button class="btn btn-xs btn-danger btn-remove-prof" type="button"--}}
                                                {{--data-id="{{ $prof->id }}"><i--}}
                                                    {{--class="fa fa-trash"></i></button>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Imagens</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label">Imagem de Chamada</label>
                            <div class="col-sm-5">
                                <div class="fileinput @if ($model->thumbnail_img) fileinput-exists @else fileinput-new @endif "
                                     style="width: 100%;" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput"
                                         style="width: 100%; height: 150px;">
                                        @if ($model->thumbnail_img)
                                            <img src="/uploads/courses/{{ $model->thumbnail_img }}">
                                        @endif
                                    </div>
                                    <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">Selecionar</span><span class="fileinput-exists">Alterar</span><input
                                            type="file" name="thumbnail_img"
                                            @if(!isset($model->thumbnail_img)) required @endif></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="alert alert-info">Incluir uma imagem com a resolução 500x500 em png.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label">Imagem de Capa</label>
                            <div class="col-sm-5">
                                <div class="fileinput @if ($model->cover_img) fileinput-exists @else fileinput-new @endif"
                                     style="width: 100%;" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput"
                                         style="width: 100%; height: 150px;">
                                        @if ($model->cover_img)
                                            <img src="/uploads/courses/{{ $model->cover_img }}">
                                        @endif
                                    </div>
                                    <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">Selecionar</span><span class="fileinput-exists">Alterar</span><input
                                            type="file" name="cover_img" @if(!isset($model->cover_img)) required @endif></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="alert alert-info">Incluir uma imagem com a resolução 1440x720 em png.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Pagseguro</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Código</label>
                            <input type="text" class="form-control" name="pagseguro_code" id="pagseguro_code" value="{{ $model->pagseguro_code }}" maxlength="20">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Botão</label>
                            <textarea name="pagseguro_button" id="pagseguro_button" cols="30" rows="10">{{ $model->pagseguro_button }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                <a href="/admin/evento/listar" class="btn btn-default pull-right">Voltar</a>
            </div>
        </div>

    </form>


@endsection

@push('styles')
<link type="text/css" href="{{ asset('assets/vendor/magic-check.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.css') }}"
      rel="stylesheet">
<link type="text/css" href="{{ asset('assets/plugins/form-select2-4.0.3/css/select2.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxaSJvL0Jied07dirpHTqYRfSZy3wCRfw&libraries=places"></script>
<script type="text/javascript" src="{{ asset('packages/zofe/rapyd/assets/tinymce_4/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/form-jasnyupload/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-mask-plugin/jquery.mask.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/form-select2-4.0.3/js/select2.min.js') }}"></script>

<script>
    var map;
    var geocoder;
    var marker;
    var icon = '../../images/marker.png';
    
    function initialize() {
        var latlng = new google.maps.LatLng(-30.0277, -51.2287);

        var mapOptions = {
            zoom: 12,
            center: latlng,
            scrollwheel: false,
            mapTypeControl: true,
            mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU },
            zoomControl: true,
            zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            icon: icon
        });

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#address').val(results[0].formatted_address);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                    }
                }
            });
        });

        google.maps.event.trigger(map, "resize");

        var latitude = $("#latitude").val();
        var longitude = $("#longitude").val();
        if (latitude != '' && longitude != '') {
            var location = new google.maps.LatLng(latitude, longitude);
            marker.setPosition(location);
            map.setCenter(location);
            map.setZoom(16);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function loadAutoComplete() {
        var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-33.8902, 151.1759),
            new google.maps.LatLng(-33.8474, 151.2631)
        );

        var input = document.getElementById('address');
        var options = {
            bounds: defaultBounds,
            types: ['address'],
            componentRestrictions: {country: 'br'}
        };

        autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();

        var location = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());

        $('#latitude').val(place.geometry.location.lat());
        $('#longitude').val(place.geometry.location.lng());

        map.setCenter(location);
        map.setZoom(14);
        marker.setPosition(location);
    }

    $(function () {
        loadAutoComplete();

        contaCaracterInit("#title", 150);
        contaCaracterInit("#description", 255);
        contaCaracterInit("#description_seo", 255);
        contaCaracterInit("#video_link", 200);
        contaCaracterInit("#address", 255);
        contaCaracterInit("#location", 80);

        $('#keywords_seo').tokenfield();

        $('#start_at').datepicker({
            language: 'pt-BR',
            todayHighlight: true
        });

        $('#end_at').datepicker({
            language: 'pt-BR',
            todayHighlight: true
        });

        $('#start_time').mask('99:99');
        $('#end_time').mask('99:99');
        $('#price').mask('000.000.000.000.000,00', {reverse: true});
        $('#duration').mask('999');

        $('#professor_select').select2({
            minimunInputLength: 1,
            placeholder: {
                id: "",
                placeholder: "Selecione um professor"
            },
            ajax: {
                url: "{{ route('api.admin.professors') }}",
                data: function (params) {
                    return {
                        name: params.term
                    };
                },
                results: function (data) {
                    return {
                        results: data.results
                    };
                },
                cache: true
            }
        });
        $('#professor_select').on("select2:select", function (e) {
            var $row = $('<tr/>');
            var $name = $('<td/>');
            var $action = $('<td/>');
            var $btn = $('<button/>', {
                type: 'button'
            });

            var $inp = $('<input/>', {
                type: 'hidden',
                name: 'professor[]',
                value: e.params.data.id
            });

            $row.append($inp);
            $row.attr('data-id', e.params.data.id);

            $row.data('id', e.params.data.id);
            $name.text(e.params.data.text);
            $btn.addClass('btn btn-xs btn-danger btn-remove-prof');
            $btn.append('<i class="fa fa-trash"></i>');
            $btn.data('id', e.params.data.id);
            $action.append($btn);
            $row.append($name);
            $row.append($action);

            $('#professor_table').append($row);
            $('.btn-remove-prof').click(removeProf);
            $('#professor_select').val(null).trigger('change');
        });

        tinymce.init({
            selector: '#content',
            file_browser_callback: elFinderBrowser,
            plugins: ['advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'],
            convert_urls: false
        });

        tinymce.init({
            selector: '#pagseguro_button',
            plugins: ['advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'],
            convert_urls: false
        })


        $('.btn-remove-prof').click(removeProf);

    });

    function elFinderBrowser(field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: "{{ route('elfinder.tinymce4') }}",
            title: 'elFinder 2.0',
            width: 900,
            height: 450,
            resizable: 'yes'
        }, {
            setUrl: function (url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    }

    function removeProf() {
        $('tr[data-id="' + $(this).data('id') + '"]').remove();
    }

</script>
@endpush