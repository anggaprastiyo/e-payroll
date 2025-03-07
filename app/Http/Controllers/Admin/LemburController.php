<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLemburRequest;
use App\Http\Requests\StoreLemburRequest;
use App\Http\Requests\UpdateLemburRequest;
use App\Models\Lembur;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LemburController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('lembur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lemburs = Lembur::with(['user'])->get();

        $users = User::get();

        return view('admin.lemburs.index', compact('lemburs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('lembur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lemburs.create', compact('users'));
    }

    public function store(StoreLemburRequest $request)
    {
        $lembur = Lembur::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $lembur->id]);
        }

        return redirect()->route('admin.lemburs.index');
    }

    public function edit(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lembur->load('user');

        return view('admin.lemburs.edit', compact('lembur', 'users'));
    }

    public function update(UpdateLemburRequest $request, Lembur $lembur)
    {
        $lembur->update($request->all());

        return redirect()->route('admin.lemburs.index');
    }

    public function show(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lembur->load('user');

        return view('admin.lemburs.show', compact('lembur'));
    }

    public function destroy(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lembur->delete();

        return back();
    }

    public function massDestroy(MassDestroyLemburRequest $request)
    {
        $lemburs = Lembur::find(request('ids'));

        foreach ($lemburs as $lembur) {
            $lembur->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('lembur_create') && Gate::denies('lembur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Lembur();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
