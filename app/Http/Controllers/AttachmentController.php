<?php

namespace App\Http\Controllers;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
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

     // Obtener todos los adjuntos
     public function index()
     {
         $attachments = Attachment::all();

         return response()->json([
             'success' => true,
             'attachments' => $attachments,
         ], 200);
     }

     // Descargar un archivo adjunto
     public function download($id)
     {
         $attachment = Attachment::findOrFail($id);

         return Storage::download($attachment->file_path, $attachment->original_name);
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
