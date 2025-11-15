<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_emp';
    public $incrementing = true;
    protected $fillable = ['jabatan_id', 'nama', 'email', 'alamat', 'img'];
    
    public function position()
    {
        return $this->belongsTo(position::class, 'jabatan_id');    }
}
