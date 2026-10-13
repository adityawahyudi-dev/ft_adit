<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title_id',
        'title_en',
        'slug',
        'category',
        'category_label_id',
        'category_label_en',
        'status_label_id',
        'status_label_en',
        'summary_id',
        'summary_en',
        'description_id',
        'description_en',
        'problem_id',
        'problem_en',
        'solution_id',
        'solution_en',
        'key_features',
        'technologies',
        'metrics',
        'mockup_url',
        'demo_url',
        'repository_url',
        'status',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'key_features' => 'array',
        'technologies' => 'array',
        'metrics' => 'array',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getLocalized(string $field, string $locale = 'id'): string
    {
        $suffix = ($locale === 'en') ? '_en' : '_id';
        $prop = $field . $suffix;
        return $this->$prop ?? $this->{$field . '_id'} ?? '';
    }

    public function isPublished(): bool
    {
        return $this->status === 'published';
    }
}
