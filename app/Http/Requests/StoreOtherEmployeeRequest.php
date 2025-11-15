<?php

namespace App\Http\Requests;

use App\Models\OtherEmployee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOtherEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_employee_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
                'unique:other_employees',
            ],
            'date_of_joining' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'salary' => [
                'string',
                'nullable',
            ],
            'parmanent_address' => [
                'string',
                'nullable',
            ],
            'aadhar' => [
                'string',
                'nullable',
            ],
        ];
    }
}
