<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, HasFactory;

		protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
    ];

    protected $table = 'posts';

    public function user()
    {
      return $this->belongsTo(User::class);
    }

}
