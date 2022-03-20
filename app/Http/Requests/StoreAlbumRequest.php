<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
            'title' => 'string|required',
            'artist_id' => 'nullable',
            'edition' => 'nullable|string',
            'label_id' => 'sometimes|required',
            'description' => 'nullable',
            'released_date' => 'date',
            'cover' => 'sometimes|image|nullable|image|max:2048',
        ];
    }
}
