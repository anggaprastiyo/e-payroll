<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRefBpjRequest;
use App\Http\Requests\StoreRefBpjRequest;
use App\Http\Requests\UpdateRefBpjRequest;
use App\Models\RefBpj;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RefBpjsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('ref_bpj_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RefBpj::query()->select(sprintf('%s.*', (new RefBpj)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ref_bpj_show';
                $editGate      = 'ref_bpj_edit';
                $deleteGate    = 'ref_bpj_delete';
                $crudRoutePart = 'ref-bpjs';

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
            $table->editColumn('kode', function ($row) {
                return $row->kode ? $row->kode : '';
            });
            $table->editColumn('provider', function ($row) {
                return $row->provider ? RefBpj::PROVIDER_RADIO[$row->provider] : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('presentase', function ($row) {
                return $row->presentase ? $row->presentase : '';
            });
            $table->editColumn('jenis_beban', function ($row) {
                return $row->jenis_beban ? RefBpj::JENIS_BEBAN_RADIO[$row->jenis_beban] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.refBpjs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ref_bpj_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.refBpjs.create');
    }

    public function store(StoreRefBpjRequest $request)
    {
        $refBpj = RefBpj::create($request->all());

        return redirect()->route('admin.ref-bpjs.index');
    }

    public function edit(RefBpj $refBpj)
    {
        abort_if(Gate::denies('ref_bpj_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.refBpjs.edit', compact('refBpj'));
    }

    public function update(UpdateRefBpjRequest $request, RefBpj $refBpj)
    {
        $refBpj->update($request->all());

        return redirect()->route('admin.ref-bpjs.index');
    }

    public function show(RefBpj $refBpj)
    {
        abort_if(Gate::denies('ref_bpj_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.refBpjs.show', compact('refBpj'));
    }

    public function destroy(RefBpj $refBpj)
    {
        abort_if(Gate::denies('ref_bpj_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refBpj->delete();

        return back();
    }

    public function massDestroy(MassDestroyRefBpjRequest $request)
    {
        $refBpjs = RefBpj::find(request('ids'));

        foreach ($refBpjs as $refBpj) {
            $refBpj->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
