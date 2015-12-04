<?php

namespace KnowTube\Http\Requests;

use KnowTube\Http\Requests\Request;

class ResourceChangeRequest extends Request
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
            'title' => 'required',
            'url' => 'required|url',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }
}
