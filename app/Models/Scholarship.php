<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $table = 'scholarship';

    public $timestamps = false;

    public $primaryKey = 'idScholarship';
}
