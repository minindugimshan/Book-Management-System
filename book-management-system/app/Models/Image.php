<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['book_id', 'image_path'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
