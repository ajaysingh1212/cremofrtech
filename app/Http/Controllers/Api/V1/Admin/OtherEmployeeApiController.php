<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOtherEmployeeRequest;
use App\Http\Requests\UpdateOtherEmployeeRequest;
use App\Http\Resources\Admin\OtherEmployeeResource;
use App\Models\OtherEmployee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherEmployeeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('other_employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherEmployeeResource(OtherEmployee::with(['select_employee', 'created_by'])->get());
    }

    public function store(StoreOtherEmployeeRequest $request)
    {
        $otherEmployee = OtherEmployee::create($request->all());

        if ($request->input('attechment', false)) {
            $otherEmployee->addMedia(storage_path('tmp/uploads/' . basename($request->input('attechment'))))->toMediaCollection('attechment');
        }

        return (new OtherEmployeeResource($otherEmployee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OtherEmployee $otherEmployee)
    {
        abort_if(Gate::denies('other_employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherEmployeeResource($otherEmployee->load(['select_employee', 'created_by']));
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

        return (new OtherEmployeeResource($otherEmployee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OtherEmployee $otherEmployee)
    {
        abort_if(Gate::denies('other_employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherEmployee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
