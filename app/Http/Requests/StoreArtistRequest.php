<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
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
            'name' => 'string|required',
            'bio' => 'required',
            'website' => 'required|url',
            'slug' => 'string',
            'pic' => 'sometimes|image|nullable|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
