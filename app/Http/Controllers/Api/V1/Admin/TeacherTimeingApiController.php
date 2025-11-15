<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherTimeingRequest;
use App\Http\Requests\UpdateTeacherTimeingRequest;
use App\Http\Resources\Admin\TeacherTimeingResource;
use App\Models\TeacherTimeing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherTimeingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('teacher_timeing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeacherTimeingResource(TeacherTimeing::with(['teacher', 'created_by'])->get());
    }

    public function store(StoreTeacherTimeingRequest $request)
    {
        $teacherTimeing = TeacherTimeing::create($request->all());

        return (new TeacherTimeingResource($teacherTimeing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TeacherTimeing $teacherTimeing)
    {
        abort_if(Gate::denies('teacher_timeing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeacherTimeingResource($teacherTimeing->load(['teacher', 'created_by']));
    }

    public function update(UpdateTeacherTimeingRequest $request, TeacherTimeing $teacherTimeing)
    {
        $teacherTimeing->update($request->all());

        return (new TeacherTimeingResource($teacherTimeing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TeacherTimeing $teacherTimeing)
    {
        abort_if(Gate::denies('teacher_timeing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacherTimeing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
