<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreEventRequest extends Request
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
            'title' => 'required|max:80|unique:events',
            'date' => 'max:255',
            'description' => 'required',
            'is_public' => 'in:on',
            'type' => 'max:80',
            'dress-code' => 'max:80',
            'music' => 'array',
            'music.*' => 'max:50',
            'food' => 'array',
            'food.*' => 'max:50',
            'drinks' => 'array',
            'drinks.*' => 'max:50',
            'location_string' => 'max:80',
            'location_coordinates' => 'max:50'
        ];
    }
}
