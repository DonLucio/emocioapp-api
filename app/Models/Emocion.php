<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emocion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo', 'tipo');
    }
}
