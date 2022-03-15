<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $fillable = [
        'category_id', 'name', 'details', 'image'
    ];

    protected $appends = ['image_path'];


    public function getImagePathAttribute()
    {
        return asset('images/' . $this->image);

    }//end of image path attribute


    public function category()
    {
        return $this->belongsTo(Category::class);

    }//end fo category

}
 
?>