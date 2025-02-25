<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ContactAgentSubject extends Model
{
    use HasFactory;
     protected $table = 'contact_agent_email';

     protected $fillable = [
         'full_name',
         'email',
         'subject',
         'message',
     ];
}
