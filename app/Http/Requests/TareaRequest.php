<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'nullable',
            'prioridad' => 'required',
            'fecha_asignacion' => 'required',
            'fecha_aproximada' => 'required',
            'fecha_terminado' => 'nullable',
            'id_glpi_users' => 'required',
            'id_glpi_tickets' => 'nullable',
            'observacion' => 'nullable',

        ];
    }
}
