<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'configuration';

    protected $fillable = [
        'logo',
        'title_logo',
        'company_name',
        'title',
        'email_address',
        'phone_number',
        'map',
        'footer',
        'meta_keywords',
        'meta_descriptions',
        'address',
        'instagram',
        'youtube',
    ];
}
