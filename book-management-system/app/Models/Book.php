<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'publication_year'];

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
