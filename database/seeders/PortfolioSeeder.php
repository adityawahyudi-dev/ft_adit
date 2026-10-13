<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Certification;
use App\Models\Project;
use App\Models\Education;
use App\Models\SiteSetting;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@aditya.dev'],
            [
                'name' => 'Aditya Yazidil Wahyudi',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Profile
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'full_name' => 'Aditya Yazidil Wahyudi',
                'headline_id' => 'FULL-STACK DEVELOPER',
                'headline_en' => 'FULL-STACK DEVELOPER',
                'subheadline_id' => 'developer & builder',
                'subheadline_en' => 'developer & builder',
                'bio_id' => 'Fokus membangun aplikasi web modern yang terukur, responsif, dan elegan melalui arsitektur kode bersih serta rancangan UI intuitif.',
                'bio_en' => 'Focusing on engineering modern, scalable, responsive, and elegant web applications through clean code architecture and intuitive UI systems.',
                'about_id' => 'Sarjana Teknik Informatika dengan pemahaman mendalam pada fondasi ilmu komputer, algoritma terstruktur, analisis data, serta rekayasa sistem web modern berskala responsif dan berkinerja tinggi.',
                'about_en' => 'Computer Science graduate with deep comprehension of computing fundamentals, structured algorithms, data analysis, and high-performance responsive web system engineering.',
                'education_title' => 'S1 Teknik Informatika',
                'gpa' => '3.89',
                'location' => 'Situbondo, Jawa Timur',
                'timezone' => 'WIB (UTC+7)',
                'status_badge_id' => 'TERSEDIA UNTUK MAGANG / KERJA',
                'status_badge_en' => 'AVAILABLE FOR HIRE',
                'status_description_id' => 'Terbuka untuk posisi Web Developer, Software Engineer, atau Magang Industri. Fleksibel untuk skema Remote, On-site, maupun Hybrid.',
                'status_description_en' => 'Open for Web Developer, Software Engineer, or Internship positions. Flexible for Remote, On-site, or Hybrid roles.',
                'photo_url' => '/assets/images/aditya-portrait.png',
                'cutout_url' => '/assets/images/aditya-cutout.png',
                'cv_url' => '/assets/images/cv-preview.png',
                'cv_filename' => 'CV_Aditya_Yazidil_Wahyudi.pdf',
                'email' => 'adityayazidilwahyudi@gmail.com',
                'phone' => '085156712232',
                'github_url' => 'https://github.com/aditya-yazidil',
                'linkedin_url' => 'https://linkedin.com/in/aditya-yazidil',
            ]
        );

        // 3. Skills (4 Primary Foundational Pillars + Tech Stack)
        $skills = [
            [
                'name' => 'HTML5 & CSS3',
                'category' => 'fundamental',
                'icon' => 'html',
                'badge_id' => 'FONDASI',
                'badge_en' => 'FOUNDATION',
                'title_id' => 'WEB MODERN',
                'title_en' => 'MODERN WEB',
                'description_id' => 'HTML5, CSS3, struktur semantik, hierarki DOM & aksesibilitas terstandar.',
                'description_en' => 'HTML5, CSS3, semantic structure, DOM hierarchy & standardized accessibility.',
                'technologies' => ['HTML5 Semantik', 'CSS3 Layout', 'Flexbox / Grid', 'WCAG AA Accessibility'],
                'sort_order' => 1,
            ],
            [
                'name' => 'Clean Code & Scripting',
                'category' => 'programming',
                'icon' => 'code',
                'badge_id' => 'LOGIKA & SKRIP',
                'badge_en' => 'LOGIC & SCRIPT',
                'title_id' => 'CLEAN CODE',
                'title_en' => 'CLEAN CODE',
                'description_id' => 'JavaScript ES6+, PHP Modern, Python dasar & konsumsi RESTful API.',
                'description_en' => 'JavaScript ES6+, Modern PHP, Python fundamentals & RESTful API consumption.',
                'technologies' => ['JavaScript ES6+', 'PHP 8.x', 'Python 3', 'RESTful APIs'],
                'sort_order' => 2,
            ],
            [
                'name' => 'Responsive UI Design',
                'category' => 'ui',
                'icon' => 'devices',
                'badge_id' => 'TAMPILAN',
                'badge_en' => 'INTERFACE',
                'title_id' => 'RESPONSIVE UI',
                'title_en' => 'RESPONSIVE UI',
                'description_id' => 'Mobile-first methodology, Tailwind CSS utility architecture, adaptif multi-device.',
                'description_en' => 'Mobile-first methodology, Tailwind CSS utility architecture, adaptive across devices.',
                'technologies' => ['Tailwind CSS', 'Mobile First', 'Micro-interactions', 'Design Systems'],
                'sort_order' => 3,
            ],
            [
                'name' => 'Relational Database SQL',
                'category' => 'database',
                'icon' => 'table_chart',
                'badge_id' => 'RELASI DATA',
                'badge_en' => 'DATA RELATIONS',
                'title_id' => 'DATABASE SQL',
                'title_en' => 'SQL DATABASE',
                'description_id' => 'MySQL, perancangan skema relasional, normalisasi 3NF & integritas data transaksi.',
                'description_en' => 'MySQL, relational schema design, 3NF normalization & transactional data integrity.',
                'technologies' => ['MySQL', 'Relational Schema', 'Query Optimization', 'Database Indexing'],
                'sort_order' => 4,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }

        // 4. Certifications (Dicoding Academy Verified)
        $certifications = [
            [
                'title_id' => 'BELAJAR DASAR PEMROGRAMAN WEB',
                'title_en' => 'BASIC WEB PROGRAMMING PRINCIPLES',
                'track_id' => 'WEB DEVELOPMENT TRACK',
                'track_en' => 'WEB DEVELOPMENT TRACK',
                'issuer' => 'Dicoding Indonesia',
                'credential_id' => '6RPNOK804X2M',
                'issue_date_id' => '18 Agustus 2026',
                'issue_date_en' => 'August 18, 2026',
                'valid_until' => '2029',
                'credential_url' => 'https://www.dicoding.com/certificates/6RPNOK804X2M',
                'image_url' => '/assets/images/cert-web-dev.png',
                'description_id' => 'Sertifikasi kelulusan kurikulum penguasaan struktur semantik HTML5, styling responsif CSS3, arsitektur flexbox & grid, serta manipulasi interaktif Document Object Model (DOM).',
                'description_en' => 'Official curriculum completion certificate covering semantic HTML5 structure, responsive CSS3 styling, flexbox & grid layout architectures, and interactive Document Object Model (DOM) manipulation.',
                'skills' => ['HTML5 Semantik', 'CSS3 Layout', 'Responsive Design', 'DOM API'],
                'sort_order' => 1,
            ],
            [
                'title_id' => 'INTRODUCTION TO FINANCIAL LITERACY',
                'title_en' => 'INTRODUCTION TO FINANCIAL LITERACY',
                'track_id' => 'FINANCIAL & MANAGEMENT',
                'track_en' => 'FINANCIAL & MANAGEMENT',
                'issuer' => 'Dicoding Indonesia',
                'credential_id' => 'ERZR7916MZYV',
                'issue_date_id' => '12 Agustus 2026',
                'issue_date_en' => 'August 12, 2026',
                'valid_until' => '2029',
                'credential_url' => 'https://www.dicoding.com/certificates/ERZR7916MZYV',
                'image_url' => '/assets/images/cert-financial-lit.png',
                'description_id' => 'Sertifikasi kompetensi perencanaan finansial, literasi alokasi anggaran dan cash flow, manajemen resiko aset teknologi, serta evaluasi operasional bisnis digital.',
                'description_en' => 'Competency credential covering strategic financial planning, budget allocation & cash flow literacy, tech asset risk management, and digital business operations evaluation.',
                'skills' => ['Financial Literacy', 'Budget Allocation', 'Risk Management', 'Capital Efficiency'],
                'sort_order' => 2,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::updateOrCreate(
                ['credential_id' => $cert['credential_id']],
                $cert
            );
        }

        // 5. Projects
        $projects = [
            [
                'title_id' => 'SISTEM MANAJEMEN INVENTARIS & OPERASIONAL',
                'title_en' => 'INVENTORY & OPERATIONS MANAGEMENT SYSTEM',
                'slug' => 'logiflow-inventory',
                'category' => 'fullstack',
                'category_label_id' => '01 / FULL-STACK',
                'category_label_en' => '01 / FULL-STACK',
                'status_label_id' => 'v1.0 Produksi • Live Deploy',
                'status_label_en' => 'v1.0 Production · Live Deploy',
                'summary_id' => 'Platform logistik enterprise modular dengan Role-Based Access Control, audit trail mutasi barang real-time, serta otomasi ekspor laporan multi-filter.',
                'summary_en' => 'Modular enterprise logistics platform with Role-Based Access Control, real-time item mutation audit trail, and automated multi-filter report exports.',
                'description_id' => 'LogiFlow dirancang untuk memecahkan inefisiensi pencatatan stok gudang manual pada skala multi-cabang. Dibangun dengan pendekatan Domain-Driven Design, sistem ini menangani sinkronisasi keluar-masuk barang secara atomik dengan validasi integritas transaksi database.',
                'description_en' => 'LogiFlow is engineered to eliminate manual warehouse inventory tracking bottlenecks across multi-branch environments. Built with Domain-Driven Design principles, it handles inbound/outbound inventory sync atomically with strict database transaction integrity.',
                'problem_id' => 'Pencatatan inventaris manual sering mengalami selisih stok (discrepancy) hingga 18% dan lambatnya pembuatan rekapitulasi bulanan lintas departemen.',
                'problem_en' => 'Manual warehouse recordkeeping suffered from up to 18% inventory discrepancies and prolonged month-end reconciliation cycles across departments.',
                'solution_id' => 'Menerapkan event-driven stock journaling dengan lock baris pesanan, validasi otomatis ambang batas minimum stok, dan panel analitik visual real-time.',
                'solution_en' => 'Implemented event-driven stock journaling with order-level row locking, automated minimum threshold reorder alerts, and real-time visual analytics dashboards.',
                'key_features' => [
                    'Multi-tier Role-Based Access Control (Admin, Gudang, Auditor)',
                    'Atomic inventory mutation ledger dengan audit trail lengkap',
                    'Grafik analitik tren stok dan performa operasional 7-hari',
                    'Ekspor laporan otomatis format PDF & spreadsheet Excel'
                ],
                'technologies' => ['Laravel', 'PHP 8.5', 'MySQL', 'Tailwind CSS', 'Vite', 'Chart.js'],
                'metrics' => [
                    ['label' => 'Lighthouse', 'value' => '98/100'],
                    ['label' => 'Coverage', 'value' => '94%'],
                    ['label' => 'Security', 'value' => 'Zero-vuln'],
                ],
                'mockup_url' => '/assets/images/project-logiflow.png',
                'demo_url' => 'https://github.com/aditya-yazidil',
                'repository_url' => 'https://github.com/aditya-yazidil',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title_id' => 'HIGH-PERFORMANCE RESTFUL API SERVICES',
                'title_en' => 'HIGH-PERFORMANCE RESTFUL API SERVICES',
                'slug' => 'projectify-api-services',
                'category' => 'backend',
                'category_label_id' => '02 / BACKEND ENGINE',
                'category_label_en' => '02 / BACKEND ENGINE',
                'status_label_id' => '<65ms Latency • Benchmarked',
                'status_label_en' => '<65ms Latency • Benchmarked',
                'summary_id' => 'Infrastruktur backend terstruktur dengan autentikasi JWT berlapis, pagination dinamis, rate-limiting anti-DoS, dan dokumentasi OpenAPI/Swagger otomatis.',
                'summary_en' => 'Structured backend infrastructure with layered JWT authentication, dynamic cursor pagination, anti-DoS rate limiting, and automated OpenAPI/Swagger documentation.',
                'description_id' => 'Projectify API Service merupakan blueprint rekayasa API RESTful berorientasi microservice yang mengutamakan latensi rendah, format respons terstandardisasi RFC 7807, dan pipeline validasi payload yang ketat.',
                'description_en' => 'Projectify API Service is a production-grade microservice-oriented RESTful API blueprint emphasizing low latency, RFC 7807 standardized response schemas, and strict request payload validation pipelines.',
                'problem_id' => 'API publik yang lambat merespons query kompleks dan rentan terhadap flooding request tanpa skema autentikasi token stateless yang aman.',
                'problem_en' => 'Legacy APIs experienced slow response times on complex queries and remained vulnerable to high-concurrency request flooding without secure stateless token mechanisms.',
                'solution_id' => 'Membangun arsitektur asynchronous dengan connection pool terisolasi, caching redis layer ganda, serta endpoint self-documenting berbasis OpenAPI.',
                'solution_en' => 'Architected asynchronous routing with isolated connection pooling, dual-tier caching, and self-documenting OpenAPI specifications.',
                'key_features' => [
                    'Autentikasi Stateless JWT dengan Refresh Token Rotation',
                    'Dynamic Cursor-Based Pagination untuk jutaan baris data',
                    'Interactive Swagger UI & Postman Collection terintegrasi',
                    'Strict CORS, Security Headers, dan Token Bucket Rate Limiting'
                ],
                'technologies' => ['Python', 'FastAPI', 'SQLite / MySQL', 'OpenAPI / Swagger', 'JWT', 'Pytest'],
                'metrics' => [
                    ['label' => 'P99 Latency', 'value' => '62ms'],
                    ['label' => 'Auth Protocol', 'value' => 'OAuth2 + JWT'],
                    ['label' => 'Concurrency', 'value' => 'Async I/O'],
                ],
                'mockup_url' => '/assets/images/project-api.png',
                'demo_url' => 'https://github.com/aditya-yazidil',
                'repository_url' => 'https://github.com/aditya-yazidil',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title_id' => 'ARCHITECTURAL EDITORIAL DESIGN SYSTEM',
                'title_en' => 'ARCHITECTURAL EDITORIAL DESIGN SYSTEM',
                'slug' => 'architectural-editorial-design-system',
                'category' => 'designsystem',
                'category_label_id' => '03 / DESIGN SYSTEM',
                'category_label_en' => '03 / DESIGN SYSTEM',
                'status_label_id' => 'WCAG AA Compliant • 100% Tokenized',
                'status_label_en' => 'WCAG AA Compliant • 100% Tokenized',
                'summary_id' => 'Sistem desain web modular yang menggabungkan presisi arsitektural cetak dengan token variabel CSS, tipografi cair, dan fluid responsive layout.',
                'summary_en' => 'Modular web design system blending architectural print precision with CSS variable tokens, fluid typography, and responsive grid layouts.',
                'description_id' => 'Sistem desain berfilosofi Architectural Editorial yang mengadopsi warna taktil Warm Ivory, tinta Charcoal, dan aksen Sage Gray. Menghadirkan keseimbangan unik antara ketegasan sans condensed industrial dan keanggunan serif editorial.',
                'description_en' => 'A tactile Architectural Editorial design system utilizing Warm Ivory surfaces, Charcoal typography, and Sage Gray geometric planes. Bridges the visual gap between condensed industrial drafting and classical monograph elegance.',
                'problem_id' => 'Desain website portofolio developer kerap seragam, mengandalkan gradien neon yang silau, dan minim hierarki tipografi bermakna.',
                'problem_en' => 'Modern developer portfolios frequently look homogenized, relying on hyper-saturated neon glows with inadequate typographic hierarchy.',
                'solution_id' => 'Merancang sistem token terpadu berbasis material fisik (kertas ivory, batu beton, tinta arang) dengan aksesibilitas rasio kontras tinggi dan motion terkontrol.',
                'solution_en' => 'Engineered a unified token system anchored in tactile physical materials (warm ivory paper, cast concrete, charcoal ink) featuring WCAG AA contrast and reduced-motion support.',
                'key_features' => [
                    'Sistem Inverted Arch responsif untuk framing visual fotografi',
                    '34 Komponen UI atomik terstandardisasi tanpa dependensi berat',
                    'Dual Theme Engine: Editorial Warm Light & Architectural Minimalist Dark',
                    'Typographic pairing: Barlow Condensed, Newsreader Serif & Plus Jakarta Sans'
                ],
                'technologies' => ['HTML5 Semantic', 'Modern CSS3', 'Tailwind CSS Tokens', 'Vanilla JS', 'WCAG AA'],
                'metrics' => [
                    ['label' => 'Contrast Ratio', 'value' => '> 4.5:1'],
                    ['label' => 'Component Count', 'value' => '34 UI Blocks'],
                    ['label' => 'Semantic Quality', 'value' => '100% Tokenized'],
                ],
                'mockup_url' => '/assets/images/project-designsystem.png',
                'demo_url' => 'https://github.com/aditya-yazidil',
                'repository_url' => 'https://github.com/aditya-yazidil',
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(
                ['slug' => $proj['slug']],
                $proj
            );
        }

        // 6. Education Timeline
        $education = [
            [
                'level_id' => 'S1 TEKNIK INFORMATIKA',
                'level_en' => 'B.S. IN COMPUTER SCIENCE',
                'institution' => 'Universitas Nurul Jadid',
                'period' => '2021 — 2025',
                'focus_id' => 'Fokus Software Engineering, Web & Algoritma',
                'focus_en' => 'Focus: Software Engineering, Web & Algorithms',
                'badge_id' => 'IPK 3.89 • Predikat Memuaskan',
                'badge_en' => 'GPA 3.89 • High Honors',
                'is_verified' => true,
                'sort_order' => 1,
            ],
            [
                'level_id' => 'SMK RPL (REKAYASA PERANGKAT LUNAK)',
                'level_en' => 'VOCATIONAL HIGH SCHOOL - SOFTWARE ENGINEERING',
                'institution' => 'SMK Nurul Abrar Al-Robaniyyin',
                'period' => '2018 — 2021',
                'focus_id' => 'Dasar Pemrograman, Struktur Basis Data & Web',
                'focus_en' => 'Programming Fundamentals, Database & Web',
                'badge_id' => 'Lulusan Kompeten',
                'badge_en' => 'Certified Graduate',
                'is_verified' => true,
                'sort_order' => 2,
            ],
            [
                'level_id' => 'SMP NURUL ABRAR AL-ROBANIYYIN',
                'level_en' => 'JUNIOR HIGH SCHOOL',
                'institution' => 'SMP Nurul Abrar Al-Robaniyyin',
                'period' => '2015 — 2018',
                'focus_id' => 'Pendidikan Dasar Lanjutan & Logika Matematika',
                'focus_en' => 'Intermediate Foundation & Mathematical Logic',
                'badge_id' => null,
                'badge_en' => null,
                'is_verified' => true,
                'sort_order' => 3,
            ],
            [
                'level_id' => 'SEKOLAH DASAR (SDN 1 KUKUSAN)',
                'level_en' => 'PRIMARY SCHOOL',
                'institution' => 'SDN 1 Kukusan',
                'period' => '2009 — 2015',
                'focus_id' => 'Pendidikan Dasar Umum',
                'focus_en' => 'Primary Education Foundation',
                'badge_id' => null,
                'badge_en' => null,
                'is_verified' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($education as $edu) {
            Education::updateOrCreate(
                ['level_id' => $edu['level_id'], 'institution' => $edu['institution']],
                $edu
            );
        }

        // 7. Site Settings
        $settings = [
            'site_title' => 'Aditya Yazidil Wahyudi — Portfolio',
            'site_tagline' => 'Full-Stack Developer & Builder',
            'meta_description' => 'Portofolio profesional Aditya Yazidil Wahyudi, lulusan S1 Teknik Informatika berfokus pada Full-Stack Web Development, arsitektur kode bersih, dan UI/UX elegan.',
            'contact_email' => 'adityayazidilwahyudi@gmail.com',
            'contact_phone' => '085156712232',
            'response_sla' => 'Dalam waktu 1x24 jam kerja',
            'cv_download_enabled' => '1',
            'research_project_progress' => '65',
            'research_project_sprint' => 'Sprint 4 / 6',
            'research_project_target' => 'Target Rilis: Q2 2026',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::set($key, $val);
        }
    }
}
