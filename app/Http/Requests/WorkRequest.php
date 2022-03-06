<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required',
            'title' => 'nullable',
            'url' => 'nullable|url',
            'languages' => 'required',
            'creation_time' => 'nullable|integer',
            'description' => 'nullable',
        ];
    }
}
