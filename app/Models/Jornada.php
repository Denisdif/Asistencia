<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'jornadas';

    protected $fillable = ['nombre','hora_entrada','hora_salida','dia','categoria_de_horario_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriasDeHorario()
    {
        return $this->hasOne('App\Models\CategoriasDeHorario', 'id', 'categoria_de_horario_id');
    }
    
}
