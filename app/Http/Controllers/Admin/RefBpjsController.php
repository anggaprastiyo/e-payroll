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

class RefBpjsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ref_bpj_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refBpjs = RefBpj::all();

        return view('admin.refBpjs.index', compact('refBpjs'));
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
