<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'level_id',
        'level_en',
        'institution',
        'period',
        'focus_id',
        'focus_en',
        'badge_id',
        'badge_en',
        'is_verified',
        'sort_order',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getLocalized(string $field, string $locale = 'id'): string
    {
        $suffix = ($locale === 'en') ? '_en' : '_id';
        $prop = $field . $suffix;
        return $this->$prop ?? $this->{$field . '_id'} ?? '';
    }
}
