<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends BaseModel
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = ['name','bio','user_id', 'uuid'];

    public function owner(): BelongsTo {
        return $this->belongsTo(related:User::class, foreignKey:'user_id');
    }
}
