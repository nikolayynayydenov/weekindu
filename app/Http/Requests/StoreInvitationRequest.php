<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreInvitationRequest extends Request
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
            'guest_name' => 'required|max:100|min:1',
            'guest_email' => 'min:1|max:255|email',
            'accepted' => 'in:on',
            'music' => 'array',
            'music.*' => 'max:50',
            'food' => 'array',
            'food.*' => 'max:50',
            'drinks' => 'array',
            'drinks.*' => 'max:50',
            'extras' => 'json|max:1000'
        ];
    }
}
