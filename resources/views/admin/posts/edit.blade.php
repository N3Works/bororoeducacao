@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <h2> {{ $model->id ? 'Editar Post' : 'Novo Post' }}</h2>
    </div>

    <form action="{{ $model->id ? route('admin.posts.update', $model->id) : route('admin.posts.save') }}"
          method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                <a href="/admin/postagem/listar" class="btn btn-default pull-right">Voltar</a>
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
                        <div class="col-md-4">
                            <label for="publish_at">Dt. Publicação</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" id="publish_at" name="publish_at"
                                       value="{{ $model->publish_at->format('d/m/Y') }}" required>
                                <div class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                            </div>
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
                            <label for="post_tags">Palavras-chave</label>
                            <input type="text" class="form-control" name="post_tags" id="post_tags" value="{{ $model->tags_comma() }}">
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
                            <input type="text" class="form-control" name="keywords_seo" id="keywords_seo" value="{{ $model->keywords_seo }}">
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
                                            <img src="/uploads/posts/{{ $model->thumbnail_img }}">
                                        @endif
                                    </div>
                                    <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">Selecionar</span><span class="fileinput-exists">Alterar</span><input
                                            type="file" name="thumbnail_img" @if(!isset($model->thumbnail_img)) required @endif></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="alert alert-info">Incluir uma imagem com a resolução 970x970 em png.</div>
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
                                            <img src="/uploads/posts/{{ $model->cover_img }}">
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
                <a href="/admin/postagem/listar" class="btn btn-default pull-right">Voltar</a>
            </div>
        </div>

    </form>


@endsection

@push('styles')
<link type="text/css" href="{{ asset('assets/vendor/magic-check.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.css') }}"
      rel="stylesheet">
<link type="text/css" href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
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
        contaCaracterInit("#title", 150);
        contaCaracterInit("#description", 255);
        contaCaracterInit("#description_seo", 255);
        
        $('#post_tags').tokenfield();
        $('#keywords_seo').tokenfield();

        $('#publish_at').datepicker({
            language: 'pt-BR',
            todayHighlight: true
        });

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