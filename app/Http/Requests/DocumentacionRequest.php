<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentacionRequest extends FormRequest
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
            'fecha_creacion' => 'required',
            'id_estado_documentacion' => 'required',
            'id_tipo_documentacion' => 'required',
            'id_glpi_users' => 'required',
            'id_categoria_documentacion' => 'required',
        ];
        // Ajusta las reglas específicas para la creación o la actualización
        if ($this->isMethod('post')) { // Si es una creación
            $rules['archivo'] = 'required|file'; // Aquí puedes ajustar según necesites validar el archivo
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) { // Si es una actualización
            // Para la actualización, el archivo no es obligatorio, pero si se envía, se valida
            $rules['archivo'] = 'nullable|file';
        }

        return $rules;
    }
}
