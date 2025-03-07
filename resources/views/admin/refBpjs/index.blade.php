@extends('layouts.admin')
@section('content')
<div class="content">
    @can('ref_bpj_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.ref-bpjs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.refBpj.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.refBpj.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RefBpj">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.refBpj.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.refBpj.fields.kode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.refBpj.fields.provider') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.refBpj.fields.nama') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.refBpj.fields.presentase') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.refBpj.fields.jenis_beban') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($refBpjs as $key => $refBpj)
                                    <tr data-entry-id="{{ $refBpj->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $refBpj->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $refBpj->kode ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RefBpj::PROVIDER_RADIO[$refBpj->provider] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $refBpj->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $refBpj->presentase ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RefBpj::JENIS_BEBAN_RADIO[$refBpj->jenis_beban] ?? '' }}
                                        </td>
                                        <td>
                                            @can('ref_bpj_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.ref-bpjs.show', $refBpj->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('ref_bpj_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.ref-bpjs.edit', $refBpj->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('ref_bpj_delete')
                                                <form action="{{ route('admin.ref-bpjs.destroy', $refBpj->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ref_bpj_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ref-bpjs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-RefBpj:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection