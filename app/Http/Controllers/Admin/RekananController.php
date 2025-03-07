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

class RekananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rekanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekanans = Rekanan::with(['perusahaan', 'area'])->get();

        return view('admin.rekanans.index', compact('rekanans'));
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
