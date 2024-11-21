<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $table="sala";
    protected $primarykey="id";
    protected $fillable=['nombre'];
    protected $hidden=['id'];
    
    public function sucursal(){
        return $this->hasMany(Sucursal::class,'id');
    }
}