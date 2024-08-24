<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Athlete extends Model {

    use SoftDeletes;
    protected $table = "athletes";

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Squad::class);
    }

}