@extends('layouts.admin')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="form-group">
                <form id="form-report" class="form-inline" method="GET" action="{{ route('admin.report.index') }}">
                    <div class="col-md-8">
                        <label for="resource_type">Evento</label>
                        <select class="form-control" id="course_id" name="course_id" required>
                            <option value="">Selecione um evento para filtrar</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                {!! $filter !!}
                {!! $grid !!}
            </div>
        </div>
    </div>

@endsection

@push('styles')
<link type="text/css" href="{{ asset('assets/plugins/form-select2-4.0.3/css/select2.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-mask-plugin/jquery.mask.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/form-select2-4.0.3/js/select2.min.js') }}"></script>
<script>
    $(function () {
        $('#cpf').mask('999.999.999-99');
        $('#status').select2();
        $('#course_id').val('{{ $course_id }}');
        $('input[name="course_id_filter"]').val('{{ $course_id }}');
        $('#course_id').select2();

        $('#course_id').change(function () {
            if (this.value != "") {
                $("#form-report").submit();
            }
        });      

        $('.btn-remove').click(removeModel);
    });

    

    function removeModel() {

        if (!confirm('Você tem certeza de remover este registro?')) {
            return false;
        }

        $.post("{{ route('admin.report.remove') }}" + "/" + $(this).data('id'))
                .done(function (data) {
                    alert('Registro removido com sucesso');
                    window.location.reload();
                })
                .fail(function (err) {
                    alert('Não foi possível remover o registro.');
                });

    }
</script>

@endpush