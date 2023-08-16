<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'size'
    ];

    /**
     * Relationship with Components
     */
    public function components()
    {
        return $this->hasMany(Component::class);
    }

    /**
     * Relationship with Inspections
     */
    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }
}
