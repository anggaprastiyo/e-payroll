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
use Yajra\DataTables\Facades\DataTables;

class GajiBulananDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('gaji_bulanan_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GajiBulananDetail::with(['gaji_bulanan', 'user'])->select(sprintf('%s.*', (new GajiBulananDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'gaji_bulanan_detail_show';
                $editGate      = 'gaji_bulanan_detail_edit';
                $deleteGate    = 'gaji_bulanan_detail_delete';
                $crudRoutePart = 'gaji-bulanan-details';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('gaji_bulanan_tanggal', function ($row) {
                return $row->gaji_bulanan ? $row->gaji_bulanan->tanggal : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('gaji_pokok', function ($row) {
                return $row->gaji_pokok ? $row->gaji_pokok : '';
            });
            $table->editColumn('total_tunjangan', function ($row) {
                return $row->total_tunjangan ? $row->total_tunjangan : '';
            });
            $table->editColumn('total_iuran_bpjstk', function ($row) {
                return $row->total_iuran_bpjstk ? $row->total_iuran_bpjstk : '';
            });
            $table->editColumn('total_iuran_bpjskes', function ($row) {
                return $row->total_iuran_bpjskes ? $row->total_iuran_bpjskes : '';
            });
            $table->editColumn('total_lembur', function ($row) {
                return $row->total_lembur ? $row->total_lembur : '';
            });
            $table->editColumn('total_pajak', function ($row) {
                return $row->total_pajak ? $row->total_pajak : '';
            });
            $table->editColumn('total_premi_bpjstk', function ($row) {
                return $row->total_premi_bpjstk ? $row->total_premi_bpjstk : '';
            });
            $table->editColumn('total_premi_bpjskes', function ($row) {
                return $row->total_premi_bpjskes ? $row->total_premi_bpjskes : '';
            });
            $table->editColumn('premi_taspen_save', function ($row) {
                return $row->premi_taspen_save ? $row->premi_taspen_save : '';
            });
            $table->editColumn('total_potongan_absensi', function ($row) {
                return $row->total_potongan_absensi ? $row->total_potongan_absensi : '';
            });
            $table->editColumn('total_potongan_pihak_ketiga', function ($row) {
                return $row->total_potongan_pihak_ketiga ? $row->total_potongan_pihak_ketiga : '';
            });
            $table->editColumn('total_thp', function ($row) {
                return $row->total_thp ? $row->total_thp : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'gaji_bulanan', 'user']);

            return $table->make(true);
        }

        $gaji_bulanans = GajiBulanan::get();
        $users         = User::get();

        return view('admin.gajiBulananDetails.index', compact('gaji_bulanans', 'users'));
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
