<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function File($id, Request $request)
    {
        $log = Log::findOrFail($id); // Obtén el log por su id
        $existingFiles = explode(',', $log->archivo); // Convierte la cadena en un array
        $fileToDelete = $request->input('file'); // El nombre del archivo a eliminar

        // Verifica si el archivo existe en el array
        if (($key = array_search($fileToDelete, $existingFiles)) !== false) {
            unset($existingFiles[$key]); // Elimina el archivo del array

            // Elimina el archivo del sistema de archivos si existe
            $file_path = public_path('log/archivo/' . $fileToDelete);
            if (file_exists($file_path)) {
                @unlink($file_path);
            }

            // Actualiza la lista de archivos en el modelo y guarda
            $log->archivo = implode(',', $existingFiles);
            $log->save();
        }

        return back()->with('success', 'Archivo eliminado correctamente.');
    }
}
