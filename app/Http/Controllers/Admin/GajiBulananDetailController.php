<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGajiBulananDetailRequest;
use App\Http\Requests\StoreGajiBulananDetailRequest;
use App\Http\Requests\UpdateGajiBulananDetailRequest;
use App\Models\GajiBulanan;
use App\Models\GajiBulananDetail;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GajiBulananDetailController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gaji_bulanan_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gajiBulananDetails = GajiBulananDetail::with(['gaji_bulanan', 'user'])->get();

        $gaji_bulanans = GajiBulanan::get();

        $users = User::get();

        return view('admin.gajiBulananDetails.index', compact('gajiBulananDetails', 'gaji_bulanans', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('gaji_bulanan_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gaji_bulanans = GajiBulanan::pluck('tanggal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gajiBulananDetails.create', compact('gaji_bulanans', 'users'));
    }

    public function store(StoreGajiBulananDetailRequest $request)
    {
        $gajiBulananDetail = GajiBulananDetail::create($request->all());

        return redirect()->route('admin.gaji-bulanan-details.index');
    }

    public function edit(GajiBulananDetail $gajiBulananDetail)
    {
        abort_if(Gate::denies('gaji_bulanan_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gaji_bulanans = GajiBulanan::pluck('tanggal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gajiBulananDetail->load('gaji_bulanan', 'user');

        return view('admin.gajiBulananDetails.edit', compact('gajiBulananDetail', 'gaji_bulanans', 'users'));
    }

    public function update(UpdateGajiBulananDetailRequest $request, GajiBulananDetail $gajiBulananDetail)
    {
        $gajiBulananDetail->update($request->all());

        return redirect()->route('admin.gaji-bulanan-details.index');
    }

    public function show(GajiBulananDetail $gajiBulananDetail)
    {
        abort_if(Gate::denies('gaji_bulanan_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gajiBulananDetail->load('gaji_bulanan', 'user');

        return view('admin.gajiBulananDetails.show', compact('gajiBulananDetail'));
    }

    public function destroy(GajiBulananDetail $gajiBulananDetail)
    {
        abort_if(Gate::denies('gaji_bulanan_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gajiBulananDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyGajiBulananDetailRequest $request)
    {
        $gajiBulananDetails = GajiBulananDetail::find(request('ids'));

        foreach ($gajiBulananDetails as $gajiBulananDetail) {
            $gajiBulananDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
