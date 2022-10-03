<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasDeHorario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'categorias_de_horarios';

    protected $fillable = ['nombre'];
	
}
