<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorasExtra extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'horas_extras';

    protected $fillable = ['fecha_hora_inicio','fecha_hora_fin','remuneracion','empleado_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    
}
