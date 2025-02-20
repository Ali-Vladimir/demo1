<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ContactAgentSubject extends Model
{
    use HasFactory;
     // Especifica el nombre de la tabla
     protected $table = 'contact_agent_email';

     // Columnas que se pueden asignar masivamente
     protected $fillable = [
         'full_name', // Asegúrate de que coincida con el nombre de la columna en la base de datos
         'email',
         'subject',
         'message',
     ];
}
