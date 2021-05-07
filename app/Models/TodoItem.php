<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;


class TodoItem extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    public $timestamps = false;

    
    protected $fillable = ['name','language'];

    public function UserTodoList(){
        return $this->belongsTo(UserTodoList::class);
    }
}
