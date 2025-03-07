@extends('layouts.admin')
@section('content')
<div class="content">
    @can('jabatan_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.jabatans.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.jabatan.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.jabatan.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Jabatan">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.kantor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.kode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.nama') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.koefisien_tunjangan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.is_lembur_otomatis') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.tujangan_kinerja') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.tunjangan_komunikasi') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.tunjangan_cuti') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.tunjangan_pakaian') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.tunjangan_jabatan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.jabatan.fields.tunjangan_kemahalan') }}
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
                                            @foreach($kantors as $key => $item)
                                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
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
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Jabatan::IS_LEMBUR_OTOMATIS_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
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
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jabatans as $key => $jabatan)
                                    <tr data-entry-id="{{ $jabatan->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $jabatan->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->kantor->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->kode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->koefisien_tunjangan ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Jabatan::IS_LEMBUR_OTOMATIS_RADIO[$jabatan->is_lembur_otomatis] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->tujangan_kinerja ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->tunjangan_komunikasi ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->tunjangan_cuti ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->tunjangan_pakaian ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->tunjangan_jabatan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $jabatan->tunjangan_kemahalan ?? '' }}
                                        </td>
                                        <td>
                                            @can('jabatan_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.jabatans.show', $jabatan->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('jabatan_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.jabatans.edit', $jabatan->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('jabatan_delete')
                                                <form action="{{ route('admin.jabatans.destroy', $jabatan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('jabatan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jabatans.massDestroy') }}",
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
  let table = $('.datatable-Jabatan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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