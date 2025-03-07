<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerusahaanRequest;
use App\Http\Requests\StorePerusahaanRequest;
use App\Http\Requests\UpdatePerusahaanRequest;
use App\Models\Area;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerusahaanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perusahaan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::with(['area'])->get();

        return view('admin.perusahaans.index', compact('perusahaans'));
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
