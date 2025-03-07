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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-GajiBulananDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.id') }}
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                            <tbody>
                                @foreach($gajiBulananDetails as $key => $gajiBulananDetail)
                                    <tr data-entry-id="{{ $gajiBulananDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->gaji_bulanan->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->gaji_pokok ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_tunjangan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_iuran_bpjstk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_iuran_bpjskes ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_lembur ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_pajak ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_premi_bpjstk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_premi_bpjskes ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->premi_taspen_save ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_potongan_absensi ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_potongan_pihak_ketiga ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gajiBulananDetail->total_thp ?? '' }}
                                        </td>
                                        <td>
                                            @can('gaji_bulanan_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.gaji-bulanan-details.show', $gajiBulananDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('gaji_bulanan_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.gaji-bulanan-details.edit', $gajiBulananDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('gaji_bulanan_detail_delete')
                                                <form action="{{ route('admin.gaji-bulanan-details.destroy', $gajiBulananDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('gaji_bulanan_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gaji-bulanan-details.massDestroy') }}",
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
  let table = $('.datatable-GajiBulananDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
})

</script>
@endsection