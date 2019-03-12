<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ActualizarPerfil extends FormRequest
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
            'avatar' => 'image',
            'name' => 'required',
            'user' => 'required',
            'password' => 'password',
            'birthday_date' => 'date',
            'country' => 'string',
            'city' => 'string',
            'profession' => 'string',


        ];
    }
    public function messages()
    {
        return [
            'avatar.image' => 'Solo se permiten fotos',
            'name.required' => 'El nombre esta vacio..',
            'user.required' => 'El nombre de usuario esta vacío.',
        ];
    }
}
