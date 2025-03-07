<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPerusahaanRequest;
use App\Http\Requests\StorePerusahaanRequest;
use App\Http\Requests\UpdatePerusahaanRequest;
use App\Models\Area;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PerusahaanController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('perusahaan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Perusahaan::with(['area'])->select(sprintf('%s.*', (new Perusahaan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'perusahaan_show';
                $editGate      = 'perusahaan_edit';
                $deleteGate    = 'perusahaan_delete';
                $crudRoutePart = 'perusahaans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('area_nama', function ($row) {
                return $row->area ? $row->area->nama : '';
            });

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'area']);

            return $table->make(true);
        }

        $areas = Area::get();

        return view('admin.perusahaans.index', compact('areas'));
    }

    public function create()
    {
        abort_if(Gate::denies('perusahaan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.perusahaans.create', compact('areas'));
    }

    public function store(StorePerusahaanRequest $request)
    {
        $perusahaan = Perusahaan::create($request->all());

        return redirect()->route('admin.perusahaans.index');
    }

    public function edit(Perusahaan $perusahaan)
    {
        abort_if(Gate::denies('perusahaan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $perusahaan->load('area');

        return view('admin.perusahaans.edit', compact('areas', 'perusahaan'));
    }

    public function update(UpdatePerusahaanRequest $request, Perusahaan $perusahaan)
    {
        $perusahaan->update($request->all());

        return redirect()->route('admin.perusahaans.index');
    }

    public function show(Perusahaan $perusahaan)
    {
        abort_if(Gate::denies('perusahaan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaan->load('area');

        return view('admin.perusahaans.show', compact('perusahaan'));
    }

    public function destroy(Perusahaan $perusahaan)
    {
        abort_if(Gate::denies('perusahaan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerusahaanRequest $request)
    {
        $perusahaans = Perusahaan::find(request('ids'));

        foreach ($perusahaans as $perusahaan) {
            $perusahaan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
