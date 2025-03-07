<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyKantorRequest;
use App\Http\Requests\StoreKantorRequest;
use App\Http\Requests\UpdateKantorRequest;
use App\Models\Area;
use App\Models\Kantor;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KantorController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('kantor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Kantor::with(['perusahaan', 'area'])->select(sprintf('%s.*', (new Kantor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'kantor_show';
                $editGate      = 'kantor_edit';
                $deleteGate    = 'kantor_delete';
                $crudRoutePart = 'kantors';

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

            $table->addColumn('area_nama', function ($row) {
                return $row->area ? $row->area->nama : '';
            });

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'perusahaan', 'area']);

            return $table->make(true);
        }

        $perusahaans = Perusahaan::get();
        $areas       = Area::get();

        return view('admin.kantors.index', compact('perusahaans', 'areas'));
    }

    public function create()
    {
        abort_if(Gate::denies('kantor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.kantors.create', compact('areas', 'perusahaans'));
    }

    public function store(StoreKantorRequest $request)
    {
        $kantor = Kantor::create($request->all());

        return redirect()->route('admin.kantors.index');
    }

    public function edit(Kantor $kantor)
    {
        abort_if(Gate::denies('kantor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kantor->load('perusahaan', 'area');

        return view('admin.kantors.edit', compact('areas', 'kantor', 'perusahaans'));
    }

    public function update(UpdateKantorRequest $request, Kantor $kantor)
    {
        $kantor->update($request->all());

        return redirect()->route('admin.kantors.index');
    }

    public function show(Kantor $kantor)
    {
        abort_if(Gate::denies('kantor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kantor->load('perusahaan', 'area');

        return view('admin.kantors.show', compact('kantor'));
    }

    public function destroy(Kantor $kantor)
    {
        abort_if(Gate::denies('kantor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kantor->delete();

        return back();
    }

    public function massDestroy(MassDestroyKantorRequest $request)
    {
        $kantors = Kantor::find(request('ids'));

        foreach ($kantors as $kantor) {
            $kantor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
