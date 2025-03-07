<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHariLiburNasionalRequest;
use App\Http\Requests\StoreHariLiburNasionalRequest;
use App\Http\Requests\UpdateHariLiburNasionalRequest;
use App\Models\HariLiburNasional;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HariLiburNasionalController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hari_libur_nasional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HariLiburNasional::with(['perusahaan'])->select(sprintf('%s.*', (new HariLiburNasional)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hari_libur_nasional_show';
                $editGate      = 'hari_libur_nasional_edit';
                $deleteGate    = 'hari_libur_nasional_delete';
                $crudRoutePart = 'hari-libur-nasionals';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('perusahaan_nama', function ($row) {
                return $row->perusahaan ? $row->perusahaan->nama : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'perusahaan']);

            return $table->make(true);
        }

        $perusahaans = Perusahaan::get();

        return view('admin.hariLiburNasionals.index', compact('perusahaans'));
    }

    public function create()
    {
        abort_if(Gate::denies('hari_libur_nasional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hariLiburNasionals.create', compact('perusahaans'));
    }

    public function store(StoreHariLiburNasionalRequest $request)
    {
        $hariLiburNasional = HariLiburNasional::create($request->all());

        return redirect()->route('admin.hari-libur-nasionals.index');
    }

    public function edit(HariLiburNasional $hariLiburNasional)
    {
        abort_if(Gate::denies('hari_libur_nasional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hariLiburNasional->load('perusahaan');

        return view('admin.hariLiburNasionals.edit', compact('hariLiburNasional', 'perusahaans'));
    }

    public function update(UpdateHariLiburNasionalRequest $request, HariLiburNasional $hariLiburNasional)
    {
        $hariLiburNasional->update($request->all());

        return redirect()->route('admin.hari-libur-nasionals.index');
    }

    public function show(HariLiburNasional $hariLiburNasional)
    {
        abort_if(Gate::denies('hari_libur_nasional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLiburNasional->load('perusahaan');

        return view('admin.hariLiburNasionals.show', compact('hariLiburNasional'));
    }

    public function destroy(HariLiburNasional $hariLiburNasional)
    {
        abort_if(Gate::denies('hari_libur_nasional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLiburNasional->delete();

        return back();
    }

    public function massDestroy(MassDestroyHariLiburNasionalRequest $request)
    {
        $hariLiburNasionals = HariLiburNasional::find(request('ids'));

        foreach ($hariLiburNasionals as $hariLiburNasional) {
            $hariLiburNasional->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
