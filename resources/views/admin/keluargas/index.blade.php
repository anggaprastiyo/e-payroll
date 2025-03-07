@extends('layouts.admin')
@section('content')
<div class="content">
    @can('keluarga_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.keluargas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.keluarga.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.keluarga.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Keluarga">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.nama') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.hubungan_keluarga') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.jenis_kelamin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.tanggal_lahir') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.keluarga.fields.no_ktp') }}
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
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Keluarga::HUBUNGAN_KELUARGA_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Keluarga::JENIS_KELAMIN_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keluargas as $key => $keluarga)
                                    <tr data-entry-id="{{ $keluarga->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $keluarga->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $keluarga->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $keluarga->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Keluarga::HUBUNGAN_KELUARGA_SELECT[$keluarga->hubungan_keluarga] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Keluarga::JENIS_KELAMIN_RADIO[$keluarga->jenis_kelamin] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $keluarga->tanggal_lahir ?? '' }}
                                        </td>
                                        <td>
                                            {{ $keluarga->no_ktp ?? '' }}
                                        </td>
                                        <td>
                                            @can('keluarga_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.keluargas.show', $keluarga->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('keluarga_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.keluargas.edit', $keluarga->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('keluarga_delete')
                                                <form action="{{ route('admin.keluargas.destroy', $keluarga->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('keluarga_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.keluargas.massDestroy') }}",
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
  let table = $('.datatable-Keluarga:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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