<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'grade'];
    protected $guarded = [];
    protected $table = 'student';

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
