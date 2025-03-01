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
use Yajra\DataTables\Facades\DataTables;

class LemburController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('lembur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lembur::with(['user'])->select(sprintf('%s.*', (new Lembur)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lembur_show';
                $editGate      = 'lembur_edit';
                $deleteGate    = 'lembur_delete';
                $crudRoutePart = 'lemburs';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('jam_mulai', function ($row) {
                return $row->jam_mulai ? $row->jam_mulai : '';
            });
            $table->editColumn('jam_akhir', function ($row) {
                return $row->jam_akhir ? $row->jam_akhir : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Lembur::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.lemburs.index', compact('users'));
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
