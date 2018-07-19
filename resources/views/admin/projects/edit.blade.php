@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <h2> {{ $model->id ? 'Editar Projeto' : 'Novo Projeto' }}</h2>
    </div>

    <form action="{{ $model->id ? route('admin.projects.update', $model->slug) : route('admin.projects.save') }}"
          method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
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
                            <label for="title">Nome Cliente</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name"
                                   value="{{ $model->customer_name }}"
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
                                            <img src="/uploads/projects/{{ $model->thumbnail_img }}">
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
                                            <img src="/uploads/projects/{{ $model->cover_img }}">
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
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
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

<script>
    $(function () {
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