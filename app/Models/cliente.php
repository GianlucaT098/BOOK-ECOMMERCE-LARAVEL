<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'codice';
}

class libro extends Model
{
    protected $table = 'libro';
}


?>