<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'turbine_id',
        'user_id',
        'description',
    ];

    /**
     * Relationship with Turbine
     */
    public function turbine()
    {
        return $this->belongsTo(Turbine::class);
    }
}
