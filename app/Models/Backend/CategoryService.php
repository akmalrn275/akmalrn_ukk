<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;

    protected $table = 'categorys_services';

    protected $fillable = [
        'image',
        'name', 
        'overview',
        'description', 
        'price',    
    ];

    public function bookings()
    {
        return $this->hasMany(Service::class);
    }

    public function imageCategoryServices()
    {
        return $this->hasMany(ImageCategoryService::class);
    }   
}
