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
            'date' => 'sometimes|max:255',
            'description' => 'required',
            'is_public' => 'sometimes|in:on',
            'type' => 'sometimes|max:80',
            'dress-code' => 'sometimes|max:80',
            'background_photo' => 'sometimes|image|max:2000',
            'location_string' => 'sometimes|max:80',
            'location_coordinates' => 'sometimes|max:50',
            'extras' => 'sometimes|json|max:1000'
        ];
    }
}
