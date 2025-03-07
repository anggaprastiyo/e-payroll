<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPotonganGajiRequest;
use App\Http\Requests\StorePotonganGajiRequest;
use App\Http\Requests\UpdatePotonganGajiRequest;
use App\Models\GajiBulanan;
use App\Models\PotonganGaji;
use App\Models\Rekanan;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PotonganGajiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('potongan_gaji_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $potonganGajis = PotonganGaji::with(['user', 'rekanan', 'periode_gaji'])->get();

        $users = User::get();

        $rekanans = Rekanan::get();

        $gaji_bulanans = GajiBulanan::get();

        return view('admin.potonganGajis.index', compact('gaji_bulanans', 'potonganGajis', 'rekanans', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('potongan_gaji_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rekanans = Rekanan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $periode_gajis = GajiBulanan::pluck('tanggal', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.potonganGajis.create', compact('periode_gajis', 'rekanans', 'users'));
    }

    public function store(StorePotonganGajiRequest $request)
    {
        $potonganGaji = PotonganGaji::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $potonganGaji->id]);
        }

        return redirect()->route('admin.potongan-gajis.index');
    }

    public function edit(PotonganGaji $potonganGaji)
    {
        abort_if(Gate::denies('potongan_gaji_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rekanans = Rekanan::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $periode_gajis = GajiBulanan::pluck('tanggal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $potonganGaji->load('user', 'rekanan', 'periode_gaji');

        return view('admin.potonganGajis.edit', compact('periode_gajis', 'potonganGaji', 'rekanans', 'users'));
    }

    public function update(UpdatePotonganGajiRequest $request, PotonganGaji $potonganGaji)
    {
        $potonganGaji->update($request->all());

        return redirect()->route('admin.potongan-gajis.index');
    }

    public function show(PotonganGaji $potonganGaji)
    {
        abort_if(Gate::denies('potongan_gaji_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $potonganGaji->load('user', 'rekanan', 'periode_gaji');

        return view('admin.potonganGajis.show', compact('potonganGaji'));
    }

    public function destroy(PotonganGaji $potonganGaji)
    {
        abort_if(Gate::denies('potongan_gaji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $potonganGaji->delete();

        return back();
    }

    public function massDestroy(MassDestroyPotonganGajiRequest $request)
    {
        $potonganGajis = PotonganGaji::find(request('ids'));

        foreach ($potonganGajis as $potonganGaji) {
            $potonganGaji->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('potongan_gaji_create') && Gate::denies('potongan_gaji_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PotonganGaji();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
