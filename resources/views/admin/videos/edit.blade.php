@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <h2> {{ $model->id ? 'Editar Vídeo' : 'Novo Vídeo' }}</h2>
    </div>

    <form action="{{ $model->id ? route('admin.videos.update', $model->id) : route('admin.videos.save') }}"
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
                            <label for="title">URL Incorporação</label>
                            <input type="text" class="form-control" name="video_link" id="video_link" value="{{ $model->video_link }}"
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
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit">Salvar</button>
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
        @if ($model)
            $('#resource_type').val('{{ $model->resource_type }}');
        @endif
    })
</script>
@endpush