<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJabatanRequest;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Jabatan;
use App\Models\Kantor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JabatanController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('jabatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Jabatan::with(['kantor'])->select(sprintf('%s.*', (new Jabatan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'jabatan_show';
                $editGate      = 'jabatan_edit';
                $deleteGate    = 'jabatan_delete';
                $crudRoutePart = 'jabatans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('kantor_nama', function ($row) {
                return $row->kantor ? $row->kantor->nama : '';
            });

            $table->editColumn('kode', function ($row) {
                return $row->kode ? $row->kode : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('koefisien_tunjangan', function ($row) {
                return $row->koefisien_tunjangan ? $row->koefisien_tunjangan : '';
            });
            $table->editColumn('is_lembur_otomatis', function ($row) {
                return $row->is_lembur_otomatis ? Jabatan::IS_LEMBUR_OTOMATIS_RADIO[$row->is_lembur_otomatis] : '';
            });
            $table->editColumn('tujangan_kinerja', function ($row) {
                return $row->tujangan_kinerja ? $row->tujangan_kinerja : '';
            });
            $table->editColumn('tunjangan_komunikasi', function ($row) {
                return $row->tunjangan_komunikasi ? $row->tunjangan_komunikasi : '';
            });
            $table->editColumn('tunjangan_cuti', function ($row) {
                return $row->tunjangan_cuti ? $row->tunjangan_cuti : '';
            });
            $table->editColumn('tunjangan_pakaian', function ($row) {
                return $row->tunjangan_pakaian ? $row->tunjangan_pakaian : '';
            });
            $table->editColumn('tunjangan_jabatan', function ($row) {
                return $row->tunjangan_jabatan ? $row->tunjangan_jabatan : '';
            });
            $table->editColumn('tunjangan_kemahalan', function ($row) {
                return $row->tunjangan_kemahalan ? $row->tunjangan_kemahalan : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kantor']);

            return $table->make(true);
        }

        $kantors = Kantor::get();

        return view('admin.jabatans.index', compact('kantors'));
    }

    public function create()
    {
        abort_if(Gate::denies('jabatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kantors = Kantor::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jabatans.create', compact('kantors'));
    }

    public function store(StoreJabatanRequest $request)
    {
        $jabatan = Jabatan::create($request->all());

        return redirect()->route('admin.jabatans.index');
    }

    public function edit(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kantors = Kantor::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jabatan->load('kantor');

        return view('admin.jabatans.edit', compact('jabatan', 'kantors'));
    }

    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        $jabatan->update($request->all());

        return redirect()->route('admin.jabatans.index');
    }

    public function show(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatan->load('kantor');

        return view('admin.jabatans.show', compact('jabatan'));
    }

    public function destroy(Jabatan $jabatan)
    {
        abort_if(Gate::denies('jabatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyJabatanRequest $request)
    {
        $jabatans = Jabatan::find(request('ids'));

        foreach ($jabatans as $jabatan) {
            $jabatan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
