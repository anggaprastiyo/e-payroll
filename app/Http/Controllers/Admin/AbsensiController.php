<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAbsensiRequest;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\Absensi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AbsensiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('absensi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $absensis = Absensi::with(['user'])->get();

        $users = User::get();

        return view('admin.absensis.index', compact('absensis', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('absensi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.absensis.create', compact('users'));
    }

    public function store(StoreAbsensiRequest $request)
    {
        $absensi = Absensi::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $absensi->id]);
        }

        return redirect()->route('admin.absensis.index');
    }

    public function edit(Absensi $absensi)
    {
        abort_if(Gate::denies('absensi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $absensi->load('user');

        return view('admin.absensis.edit', compact('absensi', 'users'));
    }

    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $absensi->update($request->all());

        return redirect()->route('admin.absensis.index');
    }

    public function show(Absensi $absensi)
    {
        abort_if(Gate::denies('absensi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $absensi->load('user');

        return view('admin.absensis.show', compact('absensi'));
    }

    public function destroy(Absensi $absensi)
    {
        abort_if(Gate::denies('absensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $absensi->delete();

        return back();
    }

    public function massDestroy(MassDestroyAbsensiRequest $request)
    {
        $absensis = Absensi::find(request('ids'));

        foreach ($absensis as $absensi) {
            $absensi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('absensi_create') && Gate::denies('absensi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Absensi();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
