<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'category',
        'icon',
        'badge_id',
        'badge_en',
        'title_id',
        'title_en',
        'description_id',
        'description_en',
        'technologies',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getLocalized(string $field, string $locale = 'id'): string
    {
        $suffix = ($locale === 'en') ? '_en' : '_id';
        $prop = $field . $suffix;
        return $this->$prop ?? $this->{$field . '_id'} ?? '';
    }
}
