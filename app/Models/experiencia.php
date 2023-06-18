<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Experiencia
 *
 * @property $id
 * @property $Nombre
 * @property $Descripcion
 * @property $Año
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Experiencia extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Descripcion' => 'required',
		'Año' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Descripcion','Año'];



}
