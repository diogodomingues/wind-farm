<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'turbine_id',
        'name',
        'description',
        'level_damage'
    ];

    /**
     * Relationship with Turbine
     */
    public function turbine()
    {
        return $this->belongsTo(Turbine::class);
    }
}
