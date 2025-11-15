<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTeacherTimeingRequest;
use App\Http\Requests\StoreTeacherTimeingRequest;
use App\Http\Requests\UpdateTeacherTimeingRequest;
use App\Models\Teacher;
use App\Models\TeacherTimeing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherTimeingController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('teacher_timeing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacherTimeings = TeacherTimeing::with(['teacher', 'created_by'])->get();

        return view('admin.teacherTimeings.index', compact('teacherTimeings'));
    }

    public function create()
    {
        abort_if(Gate::denies('teacher_timeing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = Teacher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.teacherTimeings.create', compact('teachers'));
    }

    public function store(StoreTeacherTimeingRequest $request)
    {
        $teacherTimeing = TeacherTimeing::create($request->all());

        return redirect()->route('admin.teacher-timeings.index');
    }

    public function edit(TeacherTimeing $teacherTimeing)
    {
        abort_if(Gate::denies('teacher_timeing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = Teacher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teacherTimeing->load('teacher', 'created_by');

        return view('admin.teacherTimeings.edit', compact('teacherTimeing', 'teachers'));
    }

    public function update(UpdateTeacherTimeingRequest $request, TeacherTimeing $teacherTimeing)
    {
        $teacherTimeing->update($request->all());

        return redirect()->route('admin.teacher-timeings.index');
    }

    public function show(TeacherTimeing $teacherTimeing)
    {
        abort_if(Gate::denies('teacher_timeing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacherTimeing->load('teacher', 'created_by');

        return view('admin.teacherTimeings.show', compact('teacherTimeing'));
    }

    public function destroy(TeacherTimeing $teacherTimeing)
    {
        abort_if(Gate::denies('teacher_timeing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacherTimeing->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeacherTimeingRequest $request)
    {
        $teacherTimeings = TeacherTimeing::find(request('ids'));

        foreach ($teacherTimeings as $teacherTimeing) {
            $teacherTimeing->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
