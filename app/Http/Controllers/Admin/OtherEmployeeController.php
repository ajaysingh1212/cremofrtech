<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOtherEmployeeRequest;
use App\Http\Requests\StoreOtherEmployeeRequest;
use App\Http\Requests\UpdateOtherEmployeeRequest;
use App\Models\OtherEmployee;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OtherEmployeeController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('other_employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherEmployees = OtherEmployee::with(['select_employee', 'created_by', 'media'])->get();

        return view('admin.otherEmployees.index', compact('otherEmployees'));
    }

    public function create()
    {
        abort_if(Gate::denies('other_employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_employees = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.otherEmployees.create', compact('select_employees'));
    }

    public function store(StoreOtherEmployeeRequest $request)
    {
        $otherEmployee = OtherEmployee::create($request->all());

        if ($request->input('attechment', false)) {
            $otherEmployee->addMedia(storage_path('tmp/uploads/' . basename($request->input('attechment'))))->toMediaCollection('attechment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $otherEmployee->id]);
        }

        return redirect()->route('admin.other-employees.index');
    }

    public function edit(OtherEmployee $otherEmployee)
    {
        abort_if(Gate::denies('other_employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_employees = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $otherEmployee->load('select_employee', 'created_by');

        return view('admin.otherEmployees.edit', compact('otherEmployee', 'select_employees'));
    }

    public function update(UpdateOtherEmployeeRequest $request, OtherEmployee $otherEmployee)
    {
        $otherEmployee->update($request->all());

        if ($request->input('attechment', false)) {
            if (! $otherEmployee->attechment || $request->input('attechment') !== $otherEmployee->attechment->file_name) {
                if ($otherEmployee->attechment) {
                    $otherEmployee->attechment->delete();
                }
                $otherEmployee->addMedia(storage_path('tmp/uploads/' . basename($request->input('attechment'))))->toMediaCollection('attechment');
            }
        } elseif ($otherEmployee->attechment) {
            $otherEmployee->attechment->delete();
        }

        return redirect()->route('admin.other-employees.index');
    }

    public function show(OtherEmployee $otherEmployee)
    {
        abort_if(Gate::denies('other_employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherEmployee->load('select_employee', 'created_by');

        return view('admin.otherEmployees.show', compact('otherEmployee'));
    }

    public function destroy(OtherEmployee $otherEmployee)
    {
        abort_if(Gate::denies('other_employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherEmployee->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtherEmployeeRequest $request)
    {
        $otherEmployees = OtherEmployee::find(request('ids'));

        foreach ($otherEmployees as $otherEmployee) {
            $otherEmployee->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('other_employee_create') && Gate::denies('other_employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OtherEmployee();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
