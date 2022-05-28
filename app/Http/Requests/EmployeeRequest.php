<?php

namespace App\Http\Requests;

use App\Http\Traits\WorkingRouteTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    use WorkingRouteTrait;

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"          => 'required|min:3|max:255',
            "email"         => 'required|email|max:50',
            "telephone"     => 'required|min:10|max:10',
            "joined_date"   => 'required|date|date_format:Y-m-d',
            "working_route" => ['required', Rule::in($this->getAllWorkingRoutes())]
        ];
    }
}
