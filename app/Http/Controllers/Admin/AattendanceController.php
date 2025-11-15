<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAattendanceRequest;
use App\Http\Requests\StoreAattendanceRequest;
use App\Http\Requests\UpdateAattendanceRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AattendanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('aattendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aattendances.index');
    }

    public function create()
    {
        abort_if(Gate::denies('aattendance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aattendances.create');
    }

    public function store(StoreAattendanceRequest $request)
    {
        $aattendance = Aattendance::create($request->all());

        return redirect()->route('admin.aattendances.index');
    }

    public function edit(Aattendance $aattendance)
    {
        abort_if(Gate::denies('aattendance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aattendances.edit', compact('aattendance'));
    }

    public function update(UpdateAattendanceRequest $request, Aattendance $aattendance)
    {
        $aattendance->update($request->all());

        return redirect()->route('admin.aattendances.index');
    }

    public function show(Aattendance $aattendance)
    {
        abort_if(Gate::denies('aattendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aattendances.show', compact('aattendance'));
    }

    public function destroy(Aattendance $aattendance)
    {
        abort_if(Gate::denies('aattendance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aattendance->delete();

        return back();
    }

    public function massDestroy(MassDestroyAattendanceRequest $request)
    {
        $aattendances = Aattendance::find(request('ids'));

        foreach ($aattendances as $aattendance) {
            $aattendance->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
