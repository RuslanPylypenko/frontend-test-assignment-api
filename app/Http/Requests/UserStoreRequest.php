<?php

namespace App\Http\Requests;


use App\Models\Position;
use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:60'],
            'email' => ['required', 'email'],
            'phone' => ['required', new Phone()],
            'position_id' => ['required', 'integer', Rule::in(Position::all()->pluck('id')->toArray())],
            'photo' => ['required', 'mimes:jpeg,jpg','max:5000', 'dimensions:min_width=70,min_height=70']
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Username should contain 2-60 characters',
            'name.max' => 'Username should contain 2-60 characters',
            'email.email' => 'User email, must be a valid email according to RFC2822',
            'position_id.in' => 'User`s position id. You can get list of all positions with their IDs using the API method GET api/v1/positions',
            'photo.mimes' => 'The photo format must be jpeg/jpg type.',
            'photo.max' => 'The photo size must not be greater than 5 Mb.',
            'photo.dimensions' => 'Minimum size of photo 70x70px.',
        ];
    }
}
