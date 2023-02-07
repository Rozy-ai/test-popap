<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Popapa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the script associated with the Popapa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function script(): HasOne
    {
        return $this->hasOne(Script::class);
    }
}
