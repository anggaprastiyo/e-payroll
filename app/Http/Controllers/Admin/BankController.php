<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBankRequest;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Area;
use App\Models\Bank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BankController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Bank::with(['area'])->select(sprintf('%s.*', (new Bank)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bank_show';
                $editGate      = 'bank_edit';
                $deleteGate    = 'bank_delete';
                $crudRoutePart = 'banks';

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
            $table->addColumn('area_nama', function ($row) {
                return $row->area ? $row->area->nama : '';
            });

            $table->editColumn('kode', function ($row) {
                return $row->kode ? $row->kode : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'area']);

            return $table->make(true);
        }

        $areas = Area::get();

        return view('admin.banks.index', compact('areas'));
    }

    public function create()
    {
        abort_if(Gate::denies('bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.banks.create', compact('areas'));
    }

    public function store(StoreBankRequest $request)
    {
        $bank = Bank::create($request->all());

        return redirect()->route('admin.banks.index');
    }

    public function edit(Bank $bank)
    {
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank->load('area');

        return view('admin.banks.edit', compact('areas', 'bank'));
    }

    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->all());

        return redirect()->route('admin.banks.index');
    }

    public function show(Bank $bank)
    {
        abort_if(Gate::denies('bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank->load('area');

        return view('admin.banks.show', compact('bank'));
    }

    public function destroy(Bank $bank)
    {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bank->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankRequest $request)
    {
        $banks = Bank::find(request('ids'));

        foreach ($banks as $bank) {
            $bank->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
