<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_create');
    }

    public function rules()
    {
        return [
            'select_user_id' => [
                'required',
                'integer',
            ],
            'select_courses.*' => [
                'integer',
            ],
            'select_courses' => [
                'array',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
                'unique:students',
            ],
            'father_name' => [
                'string',
                'nullable',
            ],
            'mother_name' => [
                'string',
                'nullable',
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'qualification' => [
                'string',
                'required',
            ],
            'present_address' => [
                'string',
                'nullable',
            ],
            'date_of_joing' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'due_amount' => [
                'string',
                'nullable',
            ],
        ];
    }
}
