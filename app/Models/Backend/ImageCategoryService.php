<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategoryService extends Model
{
    use HasFactory;

    protected $table = 'image_categorys_services';

    protected $fillable = [
        'category_service_id',
        'image',
    ];

    public function categoryService()
    {
        return $this->belongsTo(CategoryService::class);
    }
}
