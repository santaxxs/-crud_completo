<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carro
 *
 * @property $id
 * @property $tipo
 * @property $modelo
 * @property $color
 * @property $año
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carro extends Model
{
    
    static $rules = [
		'tipo' => 'required',
		'modelo' => 'required',
		'color' => 'required',
		'año' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo','modelo','color','año'];



}
