<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideojuegoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permitimos el paso
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Rescatamos el objeto videojuego que viaja en la URL (Route Model Binding)
        $videojuego = $this->route('videojuego');

        return [
            'titulo' => 'required|min:3',
            // Le decimos a unique que ignore el ID del registro actual
            'slug' => 'required|unique:videojuegos,slug,' . $videojuego->id,
            'desarrollador' => 'required',
            'descripcion' => 'required|min:10',
            'motor_grafico' => 'nullable|string',
            'peso_gb' => 'nullable|numeric|min:1',

            'plataformas' => 'required|array|min:1',
            'plataformas.*' => 'exists:plataformas,id'           
        ];
    }

}