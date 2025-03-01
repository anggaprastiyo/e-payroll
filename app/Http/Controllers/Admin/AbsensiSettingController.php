<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAbsensiSettingRequest;
use App\Http\Requests\StoreAbsensiSettingRequest;
use App\Http\Requests\UpdateAbsensiSettingRequest;
use App\Models\AbsensiSetting;
use App\Models\Kantor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AbsensiSettingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('absensi_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AbsensiSetting::with(['kantor'])->select(sprintf('%s.*', (new AbsensiSetting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'absensi_setting_show';
                $editGate      = 'absensi_setting_edit';
                $deleteGate    = 'absensi_setting_delete';
                $crudRoutePart = 'absensi-settings';

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
            $table->addColumn('kantor_nama', function ($row) {
                return $row->kantor ? $row->kantor->nama : '';
            });

            $table->editColumn('hari', function ($row) {
                return $row->hari ? AbsensiSetting::HARI_SELECT[$row->hari] : '';
            });
            $table->editColumn('jam_datang', function ($row) {
                return $row->jam_datang ? $row->jam_datang : '';
            });
            $table->editColumn('jam_pulang', function ($row) {
                return $row->jam_pulang ? $row->jam_pulang : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kantor']);

            return $table->make(true);
        }

        $kantors = Kantor::get();

        return view('admin.absensiSettings.index', compact('kantors'));
    }

    public function create()
    {
        abort_if(Gate::denies('absensi_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kantors = Kantor::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.absensiSettings.create', compact('kantors'));
    }

    public function store(StoreAbsensiSettingRequest $request)
    {
        $absensiSetting = AbsensiSetting::create($request->all());

        return redirect()->route('admin.absensi-settings.index');
    }

    public function edit(AbsensiSetting $absensiSetting)
    {
        abort_if(Gate::denies('absensi_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kantors = Kantor::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $absensiSetting->load('kantor');

        return view('admin.absensiSettings.edit', compact('absensiSetting', 'kantors'));
    }

    public function update(UpdateAbsensiSettingRequest $request, AbsensiSetting $absensiSetting)
    {
        $absensiSetting->update($request->all());

        return redirect()->route('admin.absensi-settings.index');
    }

    public function show(AbsensiSetting $absensiSetting)
    {
        abort_if(Gate::denies('absensi_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $absensiSetting->load('kantor');

        return view('admin.absensiSettings.show', compact('absensiSetting'));
    }

    public function destroy(AbsensiSetting $absensiSetting)
    {
        abort_if(Gate::denies('absensi_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $absensiSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyAbsensiSettingRequest $request)
    {
        $absensiSettings = AbsensiSetting::find(request('ids'));

        foreach ($absensiSettings as $absensiSetting) {
            $absensiSetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
