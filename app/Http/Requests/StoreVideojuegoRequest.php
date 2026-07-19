<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideojuegoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambiamos a true para permitir que el formulario pase 
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|min:3',
            'slug' => 'required|unique:videojuegos',
            'desarrollador' => 'required',
            'descripcion' => 'required|min:10',

            'motor_grafico' => 'nullable|string',
            'peso_gb' => 'nullable|numeric|min:1',

            'plataformas' => 'required|array|min:1',
            'plataformas.*' => 'exists:plataformas,id'                       
        ];
    }

}