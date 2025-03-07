<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPotonganAbsensiRequest;
use App\Http\Requests\StorePotonganAbsensiRequest;
use App\Http\Requests\UpdatePotonganAbsensiRequest;
use App\Models\Perusahaan;
use App\Models\PotonganAbsensi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PotonganAbsensiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('potongan_absensi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $potonganAbsensis = PotonganAbsensi::with(['perusahaan'])->get();

        return view('admin.potonganAbsensis.index', compact('potonganAbsensis'));
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
