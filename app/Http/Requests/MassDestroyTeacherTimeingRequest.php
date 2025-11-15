<?php

namespace App\Http\Requests;

use App\Models\TeacherTimeing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTeacherTimeingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('teacher_timeing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:teacher_timeings,id',
        ];
    }
}
