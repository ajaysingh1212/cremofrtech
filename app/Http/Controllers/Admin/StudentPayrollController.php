<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudentPayrollRequest;
use App\Http\Requests\StoreStudentPayrollRequest;
use App\Http\Requests\UpdateStudentPayrollRequest;
use App\Models\Student;
use App\Models\StudentPayroll;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StudentPayrollController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('student_payroll_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentPayrolls = StudentPayroll::with(['student', 'created_by', 'media'])->get();

        return view('admin.studentPayrolls.index', compact('studentPayrolls'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_payroll_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.studentPayrolls.create', compact('students'));
    }

    public function store(StoreStudentPayrollRequest $request)
    {
        $studentPayroll = StudentPayroll::create($request->all());

        foreach ($request->input('attechment', []) as $file) {
            $studentPayroll->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attechment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $studentPayroll->id]);
        }

        return redirect()->route('admin.student-payrolls.index');
    }

    public function edit(StudentPayroll $studentPayroll)
    {
        abort_if(Gate::denies('student_payroll_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $studentPayroll->load('student', 'created_by');

        return view('admin.studentPayrolls.edit', compact('studentPayroll', 'students'));
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

        return redirect()->route('admin.student-payrolls.index');
    }

    public function show(StudentPayroll $studentPayroll)
    {
        abort_if(Gate::denies('student_payroll_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentPayroll->load('student', 'created_by');

        return view('admin.studentPayrolls.show', compact('studentPayroll'));
    }

    public function destroy(StudentPayroll $studentPayroll)
    {
        abort_if(Gate::denies('student_payroll_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentPayroll->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentPayrollRequest $request)
    {
        $studentPayrolls = StudentPayroll::find(request('ids'));

        foreach ($studentPayrolls as $studentPayroll) {
            $studentPayroll->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('student_payroll_create') && Gate::denies('student_payroll_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StudentPayroll();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
