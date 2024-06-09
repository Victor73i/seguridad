<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteInsumoFungibleRequest extends FormRequest
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
            'nota' => 'required',
            'descripcion' => 'required',
            'id_glpi_passivedcequipments' => 'required',
            'id_glpi_users' => 'required',
            'id_glpi_tickets' => 'required',
            'id_glpi_locations' => 'required',
            'archivo' => 'required',
            'no_pedido' => 'required',
            'id_equipo_it' => 'required',
            'fecha_asignacion' => 'required',
        ];
    }
}