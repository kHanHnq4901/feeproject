<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    protected $table = 'fee';

    public $timestamps = false;

    public $primaryKey = 'idMajor';
    public $primaryKey2 = 'idCourse';
}
