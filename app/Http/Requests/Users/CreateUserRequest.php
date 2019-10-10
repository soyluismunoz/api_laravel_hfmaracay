<?php

namespace App\Http\Requests\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'last_name' => 'string|required',
            'email' => 'string|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'same:password|min:8',
            'phone' => 'string|required',
            'birth_date' => 'string|required',
            'city' => 'string|required',
            'state' => 'string|required',
            'country' => 'string|required',
            'area' => 'string|required',
            'level' => 'string|required',
            'linkedin' => 'string|nullable',
            'facebook' => 'string|nullable',
            'instagram' => 'string|nullable',
            'twitter' => 'string|nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'last_name.required' => 'Apellido requerido',
            'email.required' => 'Email requerido',
            'email.email' => 'Email inválido',
            'email.unique' => 'Email ya registrado',
            'password.required' => 'Contraseña requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password_confirmation.same' => 'Contraseñas no coinciden',
            'phone.required' => 'Teléfono requerido',
            'birth_date.required' => 'Fecha de nacimiento requerida',
            'city.required' => 'Ciudad requerida',
            'state.required' => 'Estado requerido',
            'country.required' => 'País requerido',
            'area.required' => 'Área requerida',
            'level.required' => 'Nivel requerido'
        ];
    }

    public function createUser(User $user)
    {
        $user->fill([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'city' => $this->city,
            'state' => $this->state,
            'country_id' => $this->country,
            'area_id' => $this->area,
            'level' => $this->level,
            'linkedin' => $this->linkedin,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter
        ]);

        $user->save();
    }
}
