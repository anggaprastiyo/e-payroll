@extends('layouts.admin')
@section('content')
<div class="content">
    @can('hari_libur_nasional_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.hari-libur-nasionals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.hariLiburNasional.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.hariLiburNasional.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-HariLiburNasional">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.hariLiburNasional.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hariLiburNasional.fields.perusahaan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hariLiburNasional.fields.tanggal') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hariLiburNasionals as $key => $hariLiburNasional)
                                    <tr data-entry-id="{{ $hariLiburNasional->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $hariLiburNasional->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hariLiburNasional->perusahaan->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hariLiburNasional->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            @can('hari_libur_nasional_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.hari-libur-nasionals.show', $hariLiburNasional->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('hari_libur_nasional_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.hari-libur-nasionals.edit', $hariLiburNasional->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('hari_libur_nasional_delete')
                                                <form action="{{ route('admin.hari-libur-nasionals.destroy', $hariLiburNasional->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hari_libur_nasional_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hari-libur-nasionals.massDestroy') }}",
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
  let table = $('.datatable-HariLiburNasional:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection