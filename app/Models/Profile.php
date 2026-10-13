<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'headline_id',
        'headline_en',
        'subheadline_id',
        'subheadline_en',
        'bio_id',
        'bio_en',
        'about_id',
        'about_en',
        'education_title',
        'gpa',
        'location',
        'timezone',
        'status_badge_id',
        'status_badge_en',
        'status_description_id',
        'status_description_en',
        'photo_url',
        'cutout_url',
        'cv_url',
        'cv_filename',
        'email',
        'phone',
        'github_url',
        'linkedin_url',
    ];

    /**
     * Helper to get localized attribute
     */
    public function getLocalized(string $field, string $locale = 'id'): string
    {
        $suffix = ($locale === 'en') ? '_en' : '_id';
        $prop = $field . $suffix;
        return $this->$prop ?? $this->{$field . '_id'} ?? '';
    }
}
