<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPayrollRequest;
use App\Http\Requests\StorePayrollRequest;
use App\Http\Requests\UpdatePayrollRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayrollController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payroll_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payrolls.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payroll_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payrolls.create');
    }

    public function store(StorePayrollRequest $request)
    {
        $payroll = Payroll::create($request->all());

        return redirect()->route('admin.payrolls.index');
    }

    public function edit(Payroll $payroll)
    {
        abort_if(Gate::denies('payroll_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payrolls.edit', compact('payroll'));
    }

    public function update(UpdatePayrollRequest $request, Payroll $payroll)
    {
        $payroll->update($request->all());

        return redirect()->route('admin.payrolls.index');
    }

    public function show(Payroll $payroll)
    {
        abort_if(Gate::denies('payroll_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payrolls.show', compact('payroll'));
    }

    public function destroy(Payroll $payroll)
    {
        abort_if(Gate::denies('payroll_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payroll->delete();

        return back();
    }

    public function massDestroy(MassDestroyPayrollRequest $request)
    {
        $payrolls = Payroll::find(request('ids'));

        foreach ($payrolls as $payroll) {
            $payroll->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
