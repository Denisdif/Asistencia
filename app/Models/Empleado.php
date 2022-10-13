<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empleados';

    protected $fillable = ['nombre','categoria_de_horario_id', 'puesto_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horasExtras()
    {
        return $this->hasMany('App\Models\HorasExtra', 'empleado_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidencias()
    {
        return $this->hasMany('App\Models\Incidencium', 'empleado_id', 'id');
    }
    
}
