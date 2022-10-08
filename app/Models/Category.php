<?php
namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory , Trans , SoftDeletes;
    // protected $guarded =[];
    //$guarded =[]; => من الحقول الممنوعة
    // protected $fillable =['name','image','parent_id'];
    protected $guarded = [];

//$fillable => مين الحقول المسموحة
    public function parent()
    {
        return $this->belongsTo(Category::class , 'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class  );
    }



}
