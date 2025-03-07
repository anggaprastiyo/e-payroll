@extends('layouts.admin')
@section('content')
<div class="content">
    @can('jenis_gaji_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.jenis-gajis.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.jenisGaji.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.jenisGaji.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-JenisGaji">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.jenisGaji.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jenisGaji.fields.perusahaan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jenisGaji.fields.kode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jenisGaji.fields.nama') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenisGajis as $key => $jenisGaji)
                                    <tr data-entry-id="{{ $jenisGaji->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $jenisGaji->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jenisGaji->perusahaan->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jenisGaji->kode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jenisGaji->nama ?? '' }}
                                        </td>
                                        <td>
                                            @can('jenis_gaji_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.jenis-gajis.show', $jenisGaji->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('jenis_gaji_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.jenis-gajis.edit', $jenisGaji->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('jenis_gaji_delete')
                                                <form action="{{ route('admin.jenis-gajis.destroy', $jenisGaji->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('jenis_gaji_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jenis-gajis.massDestroy') }}",
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
  let table = $('.datatable-JenisGaji:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection