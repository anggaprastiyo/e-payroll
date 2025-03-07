<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPotonganAbsensiRequest;
use App\Http\Requests\StorePotonganAbsensiRequest;
use App\Http\Requests\UpdatePotonganAbsensiRequest;
use App\Models\Perusahaan;
use App\Models\PotonganAbsensi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PotonganAbsensiController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('potongan_absensi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PotonganAbsensi::with(['perusahaan'])->select(sprintf('%s.*', (new PotonganAbsensi)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'potongan_absensi_show';
                $editGate      = 'potongan_absensi_edit';
                $deleteGate    = 'potongan_absensi_delete';
                $crudRoutePart = 'potongan-absensis';

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

            $table->editColumn('terlambat', function ($row) {
                return $row->terlambat ? $row->terlambat : '';
            });
            $table->editColumn('pulang_cepat', function ($row) {
                return $row->pulang_cepat ? $row->pulang_cepat : '';
            });
            $table->editColumn('izin', function ($row) {
                return $row->izin ? $row->izin : '';
            });
            $table->editColumn('sakit', function ($row) {
                return $row->sakit ? $row->sakit : '';
            });
            $table->editColumn('tanpa_kabar', function ($row) {
                return $row->tanpa_kabar ? $row->tanpa_kabar : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'perusahaan']);

            return $table->make(true);
        }

        $perusahaans = Perusahaan::get();

        return view('admin.potonganAbsensis.index', compact('perusahaans'));
    }

    public function create()
    {
        abort_if(Gate::denies('potongan_absensi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.potonganAbsensis.create', compact('perusahaans'));
    }

    public function store(StorePotonganAbsensiRequest $request)
    {
        $potonganAbsensi = PotonganAbsensi::create($request->all());

        return redirect()->route('admin.potongan-absensis.index');
    }

    public function edit(PotonganAbsensi $potonganAbsensi)
    {
        abort_if(Gate::denies('potongan_absensi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $potonganAbsensi->load('perusahaan');

        return view('admin.potonganAbsensis.edit', compact('perusahaans', 'potonganAbsensi'));
    }

    public function update(UpdatePotonganAbsensiRequest $request, PotonganAbsensi $potonganAbsensi)
    {
        $potonganAbsensi->update($request->all());

        return redirect()->route('admin.potongan-absensis.index');
    }

    public function show(PotonganAbsensi $potonganAbsensi)
    {
        abort_if(Gate::denies('potongan_absensi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $potonganAbsensi->load('perusahaan');

        return view('admin.potonganAbsensis.show', compact('potonganAbsensi'));
    }

    public function destroy(PotonganAbsensi $potonganAbsensi)
    {
        abort_if(Gate::denies('potongan_absensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $potonganAbsensi->delete();

        return back();
    }

    public function massDestroy(MassDestroyPotonganAbsensiRequest $request)
    {
        $potonganAbsensis = PotonganAbsensi::find(request('ids'));

        foreach ($potonganAbsensis as $potonganAbsensi) {
            $potonganAbsensi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
