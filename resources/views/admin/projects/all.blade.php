@extends('layouts.admin')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            {!! $grid !!}
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

        $.post("{{ route('admin.posts.remove') }}" + "/" + $(this).data('id'))
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