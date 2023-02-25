<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasUuid;

class BaseModel extends Model
{
    use HasFactory;
    use HasFactory, HasUuid;
}
