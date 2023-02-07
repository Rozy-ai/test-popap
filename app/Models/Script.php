<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Script extends Model
{
    use HasFactory;

    protected $fillable = ['popapa_id', 'path_scripts'];

    /**
     * Get the popapa that owns the Script
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function popapa(): BelongsTo
    {
        return $this->belongsTo(Popapa::class);
    }
}
