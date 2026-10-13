<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title_id',
        'title_en',
        'track_id',
        'track_en',
        'issuer',
        'credential_id',
        'issue_date_id',
        'issue_date_en',
        'valid_until',
        'credential_url',
        'image_url',
        'description_id',
        'description_en',
        'skills',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'skills' => 'array',
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
