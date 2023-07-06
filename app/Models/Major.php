<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'major';

    public $timestamps = false;

    public $primaryKey = 'idMajor';
}
