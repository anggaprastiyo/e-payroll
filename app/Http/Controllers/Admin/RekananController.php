<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRekananRequest;
use App\Http\Requests\StoreRekananRequest;
use App\Http\Requests\UpdateRekananRequest;
use App\Models\Area;
use App\Models\Perusahaan;
use App\Models\Rekanan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RekananController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('rekanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Rekanan::with(['perusahaan', 'area'])->select(sprintf('%s.*', (new Rekanan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'rekanan_show';
                $editGate      = 'rekanan_edit';
                $deleteGate    = 'rekanan_delete';
                $crudRoutePart = 'rekanans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('perusahaan_nama', function ($row) {
                return $row->perusahaan ? $row->perusahaan->nama : '';
            });

            $table->addColumn('area_nama', function ($row) {
                return $row->area ? $row->area->nama : '';
            });

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'perusahaan', 'area']);

            return $table->make(true);
        }

        $perusahaans = Perusahaan::get();
        $areas       = Area::get();

        return view('admin.rekanans.index', compact('perusahaans', 'areas'));
    }

    public function create()
    {
        abort_if(Gate::denies('rekanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rekanans.create', compact('areas', 'perusahaans'));
    }

    public function store(StoreRekananRequest $request)
    {
        $rekanan = Rekanan::create($request->all());

        return redirect()->route('admin.rekanans.index');
    }

    public function edit(Rekanan $rekanan)
    {
        abort_if(Gate::denies('rekanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rekanan->load('perusahaan', 'area');

        return view('admin.rekanans.edit', compact('areas', 'perusahaans', 'rekanan'));
    }

    public function update(UpdateRekananRequest $request, Rekanan $rekanan)
    {
        $rekanan->update($request->all());

        return redirect()->route('admin.rekanans.index');
    }

    public function show(Rekanan $rekanan)
    {
        abort_if(Gate::denies('rekanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekanan->load('perusahaan', 'area');

        return view('admin.rekanans.show', compact('rekanan'));
    }

    public function destroy(Rekanan $rekanan)
    {
        abort_if(Gate::denies('rekanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyRekananRequest $request)
    {
        $rekanans = Rekanan::find(request('ids'));

        foreach ($rekanans as $rekanan) {
            $rekanan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
