<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'user_id',
        'category_service_id',
        'check_in_date',
        'check_out_date',
        'guest_count',
        'special_requests',
        'payment_method',
        'payment_status',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryService()
    {
        return $this->belongsTo(CategoryService::class);
    }
}
