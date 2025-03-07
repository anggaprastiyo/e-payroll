<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJenisGajiRequest;
use App\Http\Requests\StoreJenisGajiRequest;
use App\Http\Requests\UpdateJenisGajiRequest;
use App\Models\JenisGaji;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JenisGajiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jenis_gaji_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisGajis = JenisGaji::with(['perusahaan'])->get();

        return view('admin.jenisGajis.index', compact('jenisGajis'));
    }

    public function create()
    {
        abort_if(Gate::denies('jenis_gaji_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jenisGajis.create', compact('perusahaans'));
    }

    public function store(StoreJenisGajiRequest $request)
    {
        $jenisGaji = JenisGaji::create($request->all());

        return redirect()->route('admin.jenis-gajis.index');
    }

    public function edit(JenisGaji $jenisGaji)
    {
        abort_if(Gate::denies('jenis_gaji_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jenisGaji->load('perusahaan');

        return view('admin.jenisGajis.edit', compact('jenisGaji', 'perusahaans'));
    }

    public function update(UpdateJenisGajiRequest $request, JenisGaji $jenisGaji)
    {
        $jenisGaji->update($request->all());

        return redirect()->route('admin.jenis-gajis.index');
    }

    public function show(JenisGaji $jenisGaji)
    {
        abort_if(Gate::denies('jenis_gaji_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisGaji->load('perusahaan');

        return view('admin.jenisGajis.show', compact('jenisGaji'));
    }

    public function destroy(JenisGaji $jenisGaji)
    {
        abort_if(Gate::denies('jenis_gaji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisGaji->delete();

        return back();
    }

    public function massDestroy(MassDestroyJenisGajiRequest $request)
    {
        $jenisGajis = JenisGaji::find(request('ids'));

        foreach ($jenisGajis as $jenisGaji) {
            $jenisGaji->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
