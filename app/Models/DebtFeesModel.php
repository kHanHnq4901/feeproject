<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DebtFeesModel extends Model
{
    protected $table = 'debtfees';

    public $timestamps = false;

    public $primaryKey = 'idStudent';
}
