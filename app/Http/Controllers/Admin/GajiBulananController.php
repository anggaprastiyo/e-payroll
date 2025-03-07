<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGajiBulananRequest;
use App\Http\Requests\StoreGajiBulananRequest;
use App\Http\Requests\UpdateGajiBulananRequest;
use App\Models\GajiBulanan;
use App\Models\JenisGaji;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GajiBulananController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gaji_bulanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gajiBulanans = GajiBulanan::with(['perusahaan', 'jenis_gaji'])->get();

        $perusahaans = Perusahaan::get();

        $jenis_gajis = JenisGaji::get();

        return view('admin.gajiBulanans.index', compact('gajiBulanans', 'jenis_gajis', 'perusahaans'));
    }

    public function create()
    {
        abort_if(Gate::denies('gaji_bulanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jenis_gajis = JenisGaji::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gajiBulanans.create', compact('jenis_gajis', 'perusahaans'));
    }

    public function store(StoreGajiBulananRequest $request)
    {
        $gajiBulanan = GajiBulanan::create($request->all());

        return redirect()->route('admin.gaji-bulanans.index');
    }

    public function edit(GajiBulanan $gajiBulanan)
    {
        abort_if(Gate::denies('gaji_bulanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jenis_gajis = JenisGaji::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gajiBulanan->load('perusahaan', 'jenis_gaji');

        return view('admin.gajiBulanans.edit', compact('gajiBulanan', 'jenis_gajis', 'perusahaans'));
    }

    public function update(UpdateGajiBulananRequest $request, GajiBulanan $gajiBulanan)
    {
        $gajiBulanan->update($request->all());

        return redirect()->route('admin.gaji-bulanans.index');
    }

    public function show(GajiBulanan $gajiBulanan)
    {
        abort_if(Gate::denies('gaji_bulanan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gajiBulanan->load('perusahaan', 'jenis_gaji');

        return view('admin.gajiBulanans.show', compact('gajiBulanan'));
    }

    public function destroy(GajiBulanan $gajiBulanan)
    {
        abort_if(Gate::denies('gaji_bulanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gajiBulanan->delete();

        return back();
    }

    public function massDestroy(MassDestroyGajiBulananRequest $request)
    {
        $gajiBulanans = GajiBulanan::find(request('ids'));

        foreach ($gajiBulanans as $gajiBulanan) {
            $gajiBulanan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
