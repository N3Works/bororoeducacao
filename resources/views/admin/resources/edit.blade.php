@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <h2> {{ $model->id ? 'Editar Recurso' : 'Novo Recurso' }}</h2>
    </div>

    <form action="{{ $model->id ? route('admin.resources.update', $model->slug) : route('admin.resources.save') }}"
          method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                <a href="/admin/recursos/listar" class="btn btn-default pull-right">Voltar</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Dados Principais</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-8">
                            <label for="title">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}"
                                   required>
                        </div>
                        <div class="col-md-4">
                            <label for="title">Ordem</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{ $model->position }}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="resource_type">Tipo</label>
                            <select name="resource_type" id="resource_type" class="form-control" required>
                                <option value="">Selecione</option>
                                <option value="ebook">E-book</option>
                            </select>
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
                            <label>Configuração</label>
                            <input class="magic-checkbox" type="checkbox" name="is_active" id="is_active"
                                   @if ($model->is_active) checked @endif>
                            <label for="is_active">Ativo</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Arquivo</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="resource_file_name">Nome</label>
                            <input type="text" class="form-control" name="resource_file_name" id="resource_file_name"
                                   value="{{ $model->resource_file_name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="resource_file">Arquivo</label>
                            <input type="file" name="resource_file" id="resource_file">
                            @if ($model->resource_file)
                                <div class="help-block">
                                    Para realizar o download do arquivo salvo <a
                                            href="{{ route('resources.download', $model->slug) }}" target="_blank">clique
                                        aqui</a>.
                                </div>
                            @endif
                        </div>
                    </div>
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
                                            <img src="/uploads/resources/{{ $model->thumbnail_img }}">
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
                <a href="/admin/recursos/listar" class="btn btn-default pull-right">Voltar</a>
            </div>
        </div>

    </form>


@endsection

@push('styles')
<link type="text/css" href="{{ asset('assets/vendor/magic-check.css') }}" rel="stylesheet">
rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/form-jasnyupload/fileinput.min.js') }}"></script>

<script>
    $(function () {
        contaCaracterInit("#name", 150);
        contaCaracterInit("#description", 255);
        @if ($model)
            $('#resource_type').val('{{ $model->resource_type }}');
        @endif
    })
</script>
@endpush