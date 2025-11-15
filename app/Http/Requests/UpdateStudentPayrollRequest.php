<?php

namespace App\Http\Requests;

use App\Models\StudentPayroll;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentPayrollRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_payroll_edit');
    }

    public function rules()
    {
        return [
            'student_id' => [
                'required',
                'integer',
            ],
            'course_amount' => [
                'string',
                'required',
            ],
            'due_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'paid_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'attechment' => [
                'array',
            ],
        ];
    }
}
