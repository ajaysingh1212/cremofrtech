<?php

namespace App\Http\Requests;

use App\Models\OtherEmployee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOtherEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('other_employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:other_employees,id',
        ];
    }
}
