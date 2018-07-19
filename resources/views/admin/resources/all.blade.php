@extends('layouts.admin')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                {!! $filter !!}
                {!! $grid !!}
            </div>
        </div>
    </div>

@endsection

@push('scripts')

<script>

    $(function () {
        $('.btn-remove').click(removeModel);
    });

    function removeModel() {

        if (!confirm('Você tem certeza de remover este registro?')) {
            return false;
        }

        $.post("{{ route('admin.resources.remove') }}" + "/" + $(this).data('id'))
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