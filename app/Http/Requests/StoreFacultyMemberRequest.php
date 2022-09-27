<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreFacultyMemberRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('faculty_resource_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}

