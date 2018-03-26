@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <h2> {{ $model->id ? 'Editar Pessoa' : 'Novo Pessoa' }}</h2>
    </div>

    <form action="{{ $model->id ? route('admin.persons.update', $model->id) : route('admin.persons.save') }}"
          method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                <a href="/admin/pessoa/listar" class="btn btn-default pull-right">Voltar</a>
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
                        <div class="col-md-10">
                            <label for="title">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}"
                                   required>
                        </div>
                        <div class="col-md-2">
                            <label for="title">Posição</label>
                            <input type="text" class="form-control" name="position" id="position"
                                   value="{{ $model->position }}"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="title">Facebook</label>
                            <input type="text" class="form-control" name="url_facebook" id="url_facebook"
                                   value="{{ $model->url_facebook }}"
                                   maxlength="255">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="title">Linkedin</label>
                            <input type="text" class="form-control" name="url_linkedin" id="url_linkedin"
                                   value="{{ $model->url_linkedin }}"
                                   maxlength="255">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="title">Instagram</label>
                            <input type="text" class="form-control" name="url_instagram" id="url_instagram"
                                   value="{{ $model->url_instagram }}"
                                   maxlength="255">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" rows="4"
                                      class="form-control" maxlength="255" required>{{ $model->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Configuração</label>
                            <input class="magic-checkbox" type="checkbox" name="is_partner" id="is_partner"
                                   @if ($model->is_partner) checked @endif>
                            <label for="is_partner">Parceiro</label>
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
                                            <img src="/uploads/person/{{ $model->thumbnail_img }}">
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
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                <a href="/admin/pessoa/listar" class="btn btn-default pull-right">Voltar</a>
            </div>
        </div>

    </form>


@endsection

@push('styles')
<link type="text/css" href="{{ asset('assets/vendor/magic-check.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.css') }}"
      rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('packages/zofe/rapyd/assets/tinymce_4/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/form-jasnyupload/fileinput.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-mask-plugin/jquery.mask.js') }}"></script>

<script>
    $(function () {
        contaCaracterInit("#name", 150);
        contaCaracterInit("#url_facebook", 255);
        contaCaracterInit("#url_linkedin", 255);
        contaCaracterInit("#url_instagram", 255);
        contaCaracterInit("#description", 255);

        $('#position').mask('999');

        tinymce.init({
            selector: '#content',
            file_browser_callback: elFinderBrowser,
            plugins: ['advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'],
            convert_urls: false
        });

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
</script>
@endpush