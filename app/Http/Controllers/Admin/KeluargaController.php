<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeluargaRequest;
use App\Http\Requests\StoreKeluargaRequest;
use App\Http\Requests\UpdateKeluargaRequest;
use App\Models\Keluarga;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KeluargaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keluarga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keluargas = Keluarga::with(['user'])->get();

        $users = User::get();

        return view('admin.keluargas.index', compact('keluargas', 'users'));
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
