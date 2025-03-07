@extends('layouts.admin')
@section('content')
<div class="content">
    @can('absensi_setting_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.absensi-settings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.absensiSetting.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.absensiSetting.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AbsensiSetting">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.kantor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.hari') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.jam_datang') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.jam_pulang') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensiSettings as $key => $absensiSetting)
                                    <tr data-entry-id="{{ $absensiSetting->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $absensiSetting->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $absensiSetting->kantor->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AbsensiSetting::HARI_SELECT[$absensiSetting->hari] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $absensiSetting->jam_datang ?? '' }}
                                        </td>
                                        <td>
                                            {{ $absensiSetting->jam_pulang ?? '' }}
                                        </td>
                                        <td>
                                            @can('absensi_setting_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.absensi-settings.show', $absensiSetting->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('absensi_setting_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.absensi-settings.edit', $absensiSetting->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('absensi_setting_delete')
                                                <form action="{{ route('admin.absensi-settings.destroy', $absensiSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('absensi_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.absensi-settings.massDestroy') }}",
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
  let table = $('.datatable-AbsensiSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection