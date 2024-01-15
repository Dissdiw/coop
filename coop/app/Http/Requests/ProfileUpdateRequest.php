<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phoneno' => ['required', 'string', 'max:255'],
        ];

        
        $filename = '' ;

        if ($request->hasFile('fileImg')) {

            $filename = $request->getSchemeAndHttpHost() . '/img/' . time() . '.' . $request->fileImg->extension();

            $request->fileImg->move(public_path('/img/'), $filename);

        }

    }
}
