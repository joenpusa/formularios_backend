<?php

namespace App\Http\Controllers;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttachmentController extends Controller
{
    public function index(Request $request)
    {
        // Parámetros de búsqueda
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // Cantidad de registros por página
        $query = Attachment::orderBy('created_at', 'desc'); // Orden cronológico descendente

        // Si hay búsqueda, filtrar por nombre original o tipo de archivo
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('original_name', 'LIKE', "%{$search}%")
                  ->orWhere('file_type', 'LIKE', "%{$search}%");
            });
        }

        // Obtener los registros con paginación
        $files = $query->paginate($perPage);

        // Mapear los resultados para agregar el nombre del usuario desde la tabla foránea
        $files->getCollection()->transform(function ($file) {
            $userName = DB::table($file->form_name)
                ->where('id', $file->form_id)
                ->value('created_by'); // ID del usuario en la tabla referenciada

            if ($userName) {
                $user = DB::table('users')->where('id', $userName)->value('name'); // Obtener nombre del usuario
                $file->created_by_name = $user ?: 'Desconocido';
            } else {
                $file->created_by_name = 'Desconocido';
            }

            return $file;
        });

        return response()->json($files);
    }

     // Guardar un archivo adjunto
    public function store(Request $request)
    {
        $request->validate([
            'form_name' => 'required|string',
            'form_id' => 'required|integer',
            'file' => 'required|file|mimes:pdf,png,jpeg,jpg,xlsx|max:10240', // 10 MB máximo
        ]);

        $file = $request->file('file');
        $path = $file->store('attachments'); // Guarda en el directorio 'storage/app/attachments'

        $attachment = Attachment::create([
            'form_name' => $request->form_name,
            'form_id' => $request->form_id,
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientOriginalExtension(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Archivo guardado exitosamente.',
            'attachment' => $attachment,
        ], 201);
    }



     // Descargar un archivo adjunto
    public function download($id)
    {
        $attachment = Attachment::findOrFail($id);
        $filePath = $attachment->file_path; // Aseguramos que la variable se define correctamente

        // Verificar si el archivo realmente existe en el disco "public"
        if (!Storage::disk('public')->exists($filePath)) {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }

        // Obtener contenido del archivo
        $fileContent = Storage::disk('public')->get($filePath);
        $base64File = base64_encode($fileContent);
        $mimeType = Storage::disk('public')->mimeType($filePath);

        // Responder con el archivo en base64
        return response()->json([
            'file_name' => $attachment->original_name,
            'file_content' => $base64File,
            'mime_type' => $mimeType
        ]);
    }

     // Eliminar un archivo adjunto
     public function destroy($id)
     {
         $attachment = Attachment::findOrFail($id);

         Storage::delete($attachment->file_path);
         $attachment->delete();

         return response()->json([
             'success' => true,
             'message' => 'Archivo eliminado exitosamente.',
         ], 200);
     }
}
