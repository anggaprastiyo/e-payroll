<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHariLiburNasionalRequest;
use App\Http\Requests\StoreHariLiburNasionalRequest;
use App\Http\Requests\UpdateHariLiburNasionalRequest;
use App\Models\HariLiburNasional;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HariLiburNasionalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hari_libur_nasional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLiburNasionals = HariLiburNasional::with(['perusahaan'])->get();

        return view('admin.hariLiburNasionals.index', compact('hariLiburNasionals'));
    }

    public function create()
    {
        abort_if(Gate::denies('hari_libur_nasional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hariLiburNasionals.create', compact('perusahaans'));
    }

    public function store(StoreHariLiburNasionalRequest $request)
    {
        $hariLiburNasional = HariLiburNasional::create($request->all());

        return redirect()->route('admin.hari-libur-nasionals.index');
    }

    public function edit(HariLiburNasional $hariLiburNasional)
    {
        abort_if(Gate::denies('hari_libur_nasional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Perusahaan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hariLiburNasional->load('perusahaan');

        return view('admin.hariLiburNasionals.edit', compact('hariLiburNasional', 'perusahaans'));
    }

    public function update(UpdateHariLiburNasionalRequest $request, HariLiburNasional $hariLiburNasional)
    {
        $hariLiburNasional->update($request->all());

        return redirect()->route('admin.hari-libur-nasionals.index');
    }

    public function show(HariLiburNasional $hariLiburNasional)
    {
        abort_if(Gate::denies('hari_libur_nasional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLiburNasional->load('perusahaan');

        return view('admin.hariLiburNasionals.show', compact('hariLiburNasional'));
    }

    public function destroy(HariLiburNasional $hariLiburNasional)
    {
        abort_if(Gate::denies('hari_libur_nasional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hariLiburNasional->delete();

        return back();
    }

    public function massDestroy(MassDestroyHariLiburNasionalRequest $request)
    {
        $hariLiburNasionals = HariLiburNasional::find(request('ids'));

        foreach ($hariLiburNasionals as $hariLiburNasional) {
            $hariLiburNasional->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
