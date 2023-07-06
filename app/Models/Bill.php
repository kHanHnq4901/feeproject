<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    protected $table = 'bill';

    public $timestamps = false;

    public $primaryKey = 'idBill';
}
