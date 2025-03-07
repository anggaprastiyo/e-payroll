@extends('layouts.admin')
@section('content')
<div class="content">
    @can('gaji_bulanan_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.gaji-bulanan-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.gajiBulananDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.gajiBulananDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-GajiBulananDetail">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.gaji_bulanan') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.gaji_pokok') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_tunjangan') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjstk') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjskes') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_lembur') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_pajak') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjstk') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjskes') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.premi_taspen_save') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_potongan_absensi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_potongan_pihak_ketiga') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gajiBulananDetail.fields.total_thp') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($gaji_bulanans as $key => $item)
                                            <option value="{{ $item->tanggal }}">{{ $item->tanggal }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
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
@can('gaji_bulanan_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gaji-bulanan-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.gaji-bulanan-details.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'gaji_bulanan_tanggal', name: 'gaji_bulanan.tanggal' },
{ data: 'user_name', name: 'user.name' },
{ data: 'gaji_pokok', name: 'gaji_pokok' },
{ data: 'total_tunjangan', name: 'total_tunjangan' },
{ data: 'total_iuran_bpjstk', name: 'total_iuran_bpjstk' },
{ data: 'total_iuran_bpjskes', name: 'total_iuran_bpjskes' },
{ data: 'total_lembur', name: 'total_lembur' },
{ data: 'total_pajak', name: 'total_pajak' },
{ data: 'total_premi_bpjstk', name: 'total_premi_bpjstk' },
{ data: 'total_premi_bpjskes', name: 'total_premi_bpjskes' },
{ data: 'premi_taspen_save', name: 'premi_taspen_save' },
{ data: 'total_potongan_absensi', name: 'total_potongan_absensi' },
{ data: 'total_potongan_pihak_ketiga', name: 'total_potongan_pihak_ketiga' },
{ data: 'total_thp', name: 'total_thp' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-GajiBulananDetail').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection