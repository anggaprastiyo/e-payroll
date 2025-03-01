@extends('layouts.admin')
@section('content')
@can('jabatan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jabatans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jabatan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jabatan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Jabatan">
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
                                <option value="{{ $key }}">{{ $item }}</option>
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('jabatan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jabatans.massDestroy') }}",
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
    ajax: "{{ route('admin.jabatans.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'kantor_nama', name: 'kantor.nama' },
{ data: 'kode', name: 'kode' },
{ data: 'nama', name: 'nama' },
{ data: 'koefisien_tunjangan', name: 'koefisien_tunjangan' },
{ data: 'is_lembur_otomatis', name: 'is_lembur_otomatis' },
{ data: 'tujangan_kinerja', name: 'tujangan_kinerja' },
{ data: 'tunjangan_komunikasi', name: 'tunjangan_komunikasi' },
{ data: 'tunjangan_cuti', name: 'tunjangan_cuti' },
{ data: 'tunjangan_pakaian', name: 'tunjangan_pakaian' },
{ data: 'tunjangan_jabatan', name: 'tunjangan_jabatan' },
{ data: 'tunjangan_kemahalan', name: 'tunjangan_kemahalan' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Jabatan').DataTable(dtOverrideGlobals);
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