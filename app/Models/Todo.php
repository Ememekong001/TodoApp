<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Todo extends Model
{
    use HasFactory;
    protected $table='todos';

    protected $fillable=[
        'title',
        'description',
        'location',
        'user_id',
    ];

    public function Todo(){
        return $this->BelongsTo(User::class);
    }
}
