<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Squad extends Model {

    use SoftDeletes;
    protected $table = "squads";

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Athlete::class);
    }

}