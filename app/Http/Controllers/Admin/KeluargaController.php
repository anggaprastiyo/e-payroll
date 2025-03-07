<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyKeluargaRequest;
use App\Http\Requests\StoreKeluargaRequest;
use App\Http\Requests\UpdateKeluargaRequest;
use App\Models\Keluarga;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KeluargaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('keluarga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Keluarga::with(['user'])->select(sprintf('%s.*', (new Keluarga)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'keluarga_show';
                $editGate      = 'keluarga_edit';
                $deleteGate    = 'keluarga_delete';
                $crudRoutePart = 'keluargas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('hubungan_keluarga', function ($row) {
                return $row->hubungan_keluarga ? Keluarga::HUBUNGAN_KELUARGA_SELECT[$row->hubungan_keluarga] : '';
            });
            $table->editColumn('jenis_kelamin', function ($row) {
                return $row->jenis_kelamin ? Keluarga::JENIS_KELAMIN_RADIO[$row->jenis_kelamin] : '';
            });

            $table->editColumn('no_ktp', function ($row) {
                return $row->no_ktp ? $row->no_ktp : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.keluargas.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('keluarga_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.keluargas.create', compact('users'));
    }

    public function store(StoreKeluargaRequest $request)
    {
        $keluarga = Keluarga::create($request->all());

        return redirect()->route('admin.keluargas.index');
    }

    public function edit(Keluarga $keluarga)
    {
        abort_if(Gate::denies('keluarga_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $keluarga->load('user');

        return view('admin.keluargas.edit', compact('keluarga', 'users'));
    }

    public function update(UpdateKeluargaRequest $request, Keluarga $keluarga)
    {
        $keluarga->update($request->all());

        return redirect()->route('admin.keluargas.index');
    }

    public function show(Keluarga $keluarga)
    {
        abort_if(Gate::denies('keluarga_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keluarga->load('user');

        return view('admin.keluargas.show', compact('keluarga'));
    }

    public function destroy(Keluarga $keluarga)
    {
        abort_if(Gate::denies('keluarga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keluarga->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeluargaRequest $request)
    {
        $keluargas = Keluarga::find(request('ids'));

        foreach ($keluargas as $keluarga) {
            $keluarga->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
