@extends('layouts.admin')
@section('content')
<div class="content">
    @can('rekanan_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.rekanans.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.rekanan.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.rekanan.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Rekanan">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.rekanan.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rekanan.fields.perusahaan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rekanan.fields.area') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rekanan.fields.nama') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rekanans as $key => $rekanan)
                                    <tr data-entry-id="{{ $rekanan->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $rekanan->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rekanan->perusahaan->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rekanan->area->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rekanan->nama ?? '' }}
                                        </td>
                                        <td>
                                            @can('rekanan_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.rekanans.show', $rekanan->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('rekanan_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.rekanans.edit', $rekanan->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('rekanan_delete')
                                                <form action="{{ route('admin.rekanans.destroy', $rekanan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rekanan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rekanans.massDestroy') }}",
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
  let table = $('.datatable-Rekanan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection