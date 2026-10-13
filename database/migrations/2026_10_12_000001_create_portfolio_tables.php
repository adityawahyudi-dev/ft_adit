<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Users role enhancement
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('admin')->after('email');
            });
        }

        // 2. Profiles table
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('headline_id');
            $table->string('headline_en');
            $table->string('subheadline_id');
            $table->string('subheadline_en');
            $table->text('bio_id');
            $table->text('bio_en');
            $table->text('about_id')->nullable();
            $table->text('about_en')->nullable();
            $table->string('education_title');
            $table->string('gpa')->default('3.89');
            $table->string('location')->default('Situbondo, Jawa Timur');
            $table->string('timezone')->default('WIB (UTC+7)');
            $table->string('status_badge_id')->default('TERSEDIA UNTUK MAGANG / KERJA');
            $table->string('status_badge_en')->default('AVAILABLE FOR HIRE');
            $table->string('status_description_id')->nullable();
            $table->string('status_description_en')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('cutout_url')->nullable();
            $table->string('cv_url')->nullable();
            $table->string('cv_filename')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->timestamps();
        });

        // 3. Skills table
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('fundamental'); // fundamental, programming, ui, database, tools
            $table->string('icon')->nullable();
            $table->string('badge_id')->nullable();
            $table->string('badge_en')->nullable();
            $table->string('title_id');
            $table->string('title_en');
            $table->text('description_id');
            $table->text('description_en');
            $table->json('technologies')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 4. Certifications table
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('title_id');
            $table->string('title_en');
            $table->string('track_id');
            $table->string('track_en');
            $table->string('issuer')->default('Dicoding Indonesia');
            $table->string('credential_id');
            $table->string('issue_date_id');
            $table->string('issue_date_en');
            $table->string('valid_until')->default('2029');
            $table->string('credential_url')->nullable();
            $table->string('image_url')->nullable();
            $table->text('description_id');
            $table->text('description_en');
            $table->json('skills')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Projects table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title_id');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->string('category')->default('fullstack'); // fullstack, backend, designsystem, research
            $table->string('category_label_id')->default('01 / FULL-STACK');
            $table->string('category_label_en')->default('01 / FULL-STACK');
            $table->string('status_label_id')->default('v1.0 Produksi • Live Deploy');
            $table->string('status_label_en')->default('v1.0 Production · Live Deploy');
            $table->text('summary_id');
            $table->text('summary_en');
            $table->text('description_id');
            $table->text('description_en');
            $table->text('problem_id')->nullable();
            $table->text('problem_en')->nullable();
            $table->text('solution_id')->nullable();
            $table->text('solution_en')->nullable();
            $table->json('key_features')->nullable();
            $table->json('technologies')->nullable();
            $table->json('metrics')->nullable();
            $table->string('mockup_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('status')->default('published'); // published, draft, archived
            $table->boolean('is_featured')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 6. Education table
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('level_id');
            $table->string('level_en');
            $table->string('institution');
            $table->string('period');
            $table->string('focus_id');
            $table->string('focus_en');
            $table->string('badge_id')->nullable();
            $table->string('badge_en')->nullable();
            $table->boolean('is_verified')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 7. Contact Messages table
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('ip_address')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamp('replied_at')->nullable();
            $table->timestamps();
        });

        // 8. Site Settings table
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('education');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('certifications');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('profiles');

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }
    }
};
