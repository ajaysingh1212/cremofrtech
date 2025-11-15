<?php

namespace App\Http\Requests;

use App\Models\TeacherTimeing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeacherTimeingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('teacher_timeing_create');
    }

    public function rules()
    {
        return [
            'classes_timeing' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'selecte_days' => [
                'string',
                'nullable',
            ],
        ];
    }
}
