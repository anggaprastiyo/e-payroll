@extends('layouts.admin')
@section('content')
<div class="content">
    @can('potongan_absensi_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.potongan-absensis.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.potonganAbsensi.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.potonganAbsensi.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PotonganAbsensi">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.perusahaan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.terlambat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.pulang_cepat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.izin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.sakit') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.potonganAbsensi.fields.tanpa_kabar') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($potonganAbsensis as $key => $potonganAbsensi)
                                    <tr data-entry-id="{{ $potonganAbsensi->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->perusahaan->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->terlambat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->pulang_cepat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->izin ?? '' }}
                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->sakit ?? '' }}
                                        </td>
                                        <td>
                                            {{ $potonganAbsensi->tanpa_kabar ?? '' }}
                                        </td>
                                        <td>
                                            @can('potongan_absensi_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.potongan-absensis.show', $potonganAbsensi->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('potongan_absensi_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.potongan-absensis.edit', $potonganAbsensi->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('potongan_absensi_delete')
                                                <form action="{{ route('admin.potongan-absensis.destroy', $potonganAbsensi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('potongan_absensi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.potongan-absensis.massDestroy') }}",
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
  let table = $('.datatable-PotonganAbsensi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection