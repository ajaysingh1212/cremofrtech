<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('teacher_create');
    }

    public function rules()
    {
        return [
            'select_teacher_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
                'unique:teachers',
            ],
            'courses.*' => [
                'integer',
            ],
            'courses' => [
                'array',
            ],
            'date_of_joining' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'qualification' => [
                'string',
                'nullable',
            ],
            'salary' => [
                'required',
            ],
        ];
    }
}
