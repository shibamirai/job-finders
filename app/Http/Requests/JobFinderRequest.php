<?php

namespace App\Http\Requests;

use App\Enums\EmploymentPattern;
use App\Enums\Gender;
use App\Enums\Handicap;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class JobFinderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'required',
            'name' => ['required', Rule::unique('job_finders')->ignore($this->route()->parameter('job_finder'))],
            'gender' => ['required', new Enum(Gender::class)],
            'age' => 'required|integer|between:18,60',
            'handicap' => ['required', new Enum(Handicap::class)],
            'use_from' => 'required',
            'skills' => 'nullable',
            'occupation' => 'required',
            'description' => 'nullable',
            'hired_at' => 'required',
            'employment_pattern' => ['required', new Enum(EmploymentPattern::class)],
        ];
    }
}
