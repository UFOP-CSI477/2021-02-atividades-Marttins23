<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleta extends Model
{
    use HasFactory;

    protected $fillable = ['items_id', 'entidades_id', 'data', 'quantidade'];

    public $timestamps = false;

    public function entidade()
    {
        return $this->hasOne(Entidade::class);
    }

    public function item()
    {
        return $this->hasOne(Item::class);
    }
}
