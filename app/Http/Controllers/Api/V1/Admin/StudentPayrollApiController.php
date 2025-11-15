<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreStudentPayrollRequest;
use App\Http\Requests\UpdateStudentPayrollRequest;
use App\Http\Resources\Admin\StudentPayrollResource;
use App\Models\StudentPayroll;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentPayrollApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('student_payroll_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentPayrollResource(StudentPayroll::with(['student', 'created_by'])->get());
    }

    public function store(StoreStudentPayrollRequest $request)
    {
        $studentPayroll = StudentPayroll::create($request->all());

        foreach ($request->input('attechment', []) as $file) {
            $studentPayroll->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attechment');
        }

        return (new StudentPayrollResource($studentPayroll))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentPayroll $studentPayroll)
    {
        abort_if(Gate::denies('student_payroll_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentPayrollResource($studentPayroll->load(['student', 'created_by']));
    }

    public function update(UpdateStudentPayrollRequest $request, StudentPayroll $studentPayroll)
    {
        $studentPayroll->update($request->all());

        if (count($studentPayroll->attechment) > 0) {
            foreach ($studentPayroll->attechment as $media) {
                if (! in_array($media->file_name, $request->input('attechment', []))) {
                    $media->delete();
                }
            }
        }
        $media = $studentPayroll->attechment->pluck('file_name')->toArray();
        foreach ($request->input('attechment', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $studentPayroll->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attechment');
            }
        }

        return (new StudentPayrollResource($studentPayroll))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentPayroll $studentPayroll)
    {
        abort_if(Gate::denies('student_payroll_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentPayroll->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
