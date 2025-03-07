<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJabatanRequest;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Jabatan;
use App\Models\Kantor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JabatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jabatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jabatans = Jabatan::with(['kantor'])->get();

        $kantors = Kantor::get();

        return view('admin.jabatans.index', compact('jabatans', 'kantors'));
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
