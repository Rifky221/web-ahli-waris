@extends('layouts.app')

@section('title', 'Informasi Waris')

@section('content')

    <!-- HERO SECTION WITH PATTERN -->
    <section class="info-hero">
        <div class="hero-pattern"></div>
        <div class="hero-content">
            <h1>Informasi Waris</h1>
            <p>Berita & Artikel Terkini Kota Administrasi Jakarta Selatan</p>
        </div>
    </section>

    <style>
        /* Modern Theme Styles */
        :root {
            --primary-color: #00a6d6;
            --primary-dark: #008eb8;
            --text-color: #333;
            --text-light: #6b6b6b;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
            --shadow-md: 0 5px 15px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
        }

        body {
            background-color: var(--bg-light);
            background-image: radial-gradient(#e1e4e8 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Hero Section */
        .info-hero {
            position: relative;
            background: linear-gradient(135deg, #00a6d6 0%, #008eb8 100%);
            padding: 60px 20px;
            text-align: center;
            color: white;
            margin-bottom: 40px;
            overflow: hidden;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            background-image: 
                linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-position: 0 0, 10px 10px;
            background-size: 20px 20px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .hero-content p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Container & Cards */
        .news-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px 60px;
        }

        .news-item {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            padding: 25px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.03);
            position: relative;
            overflow: hidden;
        }

        .news-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .news-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-color);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .news-item:hover::before {
            opacity: 1;
        }

        /* Content Layout */
        .news-content {
            flex: 1;
            padding-right: 30px;
            display: flex;
            flex-direction: column;
        }

        .news-author {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 0.9rem;
            color: var(--text-color);
            font-weight: 600;
        }

        .news-author img {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .news-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 12px;
            line-height: 1.3;
            color: var(--text-color);
        }

        .news-title a {
            text-decoration: none;
            color: inherit;
            background-image: linear-gradient(var(--primary-color), var(--primary-color));
            background-position: 0% 100%;
            background-repeat: no-repeat;
            background-size: 0% 2px;
            transition: background-size .3s;
        }

        .news-title a:hover {
            color: var(--primary-color);
            background-size: 100% 2px;
        }

        .news-desc {
            color: var(--text-light);
            font-family: 'Segoe UI', sans-serif;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Thumbnail */
        .news-thumbnail {
            width: 200px;
            height: 140px;
            flex-shrink: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .news-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-item:hover .news-thumbnail img {
            transform: scale(1.05);
        }

        /* Footer & Actions */
        .news-footer {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f0f0f0;
            padding-top: 15px;
        }

        .news-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #888;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .news-date {
            color: #888;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .news-actions {
            display: flex;
            gap: 12px;
        }

        .action-btn {
            background: #f5f7f9;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #666;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .category-badge {
            background: #e3f2fd;
            color: var(--primary-color);
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .news-item {
                flex-direction: column-reverse;
                padding: 20px;
            }
            .news-content {
                padding-right: 0;
            }
            .news-thumbnail {
                width: 100%;
                height: 200px;
                margin-bottom: 20px;
            }
            .hero-content h1 {
                font-size: 1.8rem;
            }
        }
    </style>

    <div class="news-container">
        @forelse($berita as $item)
            <div class="news-item">
                <div class="news-content">
                    <div class="news-author">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->penulis) }}&background=random&size=32" alt="{{ $item->penulis }}">
                        <span>{{ $item->penulis }}</span>
                        @if($item->kategori)
                            <span class="category-badge">{{ $item->kategori }}</span>
                        @endif
                    </div>
                    
                    <h2 class="news-title">
                        <a href="{{ route('berita.show', $item->slug) }}">{{ $item->judul }}</a>
                    </h2>
                    
                    <div class="news-desc">
                        {{ $item->deskripsi ?: \Illuminate\Support\Str::limit(strip_tags($item->isi_konten), 160) }}
                    </div>
                    
                    <div class="news-footer">
                        <div class="news-meta">
                            <span class="news-date">
                                <i class="far fa-calendar-alt"></i> 
                                {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                            </span>
                            <span>
                                <i class="far fa-eye"></i> {{ number_format($item->views ?? 0) }}
                            </span>
                        </div>
                        
                        <div class="news-actions">
                           
                            <button class="action-btn" onclick="shareNews('{{ addslashes($item->judul) }}', '{{ route('berita.show', $item->slug) }}')" title="Bagikan">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                @if($item->thumbnail)
                    <div class="news-thumbnail">
                        <!-- Updated path to point to CMS public storage -->
                        <img src="/SistemWebWaris/SistemWarisCMS/public/storage/{{ $item->thumbnail }}" 
                                 alt="{{ $item->judul }}" 
                                 onerror="this.onerror=null;this.src='https://via.placeholder.com/400x300?text=No+Image'">
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-5" style="background: white; border-radius: 16px; padding: 40px; box-shadow: var(--shadow-sm);">
                <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png" width="80" style="opacity: 0.5; margin-bottom: 20px;">
                <p class="text-muted" style="font-size: 1.1rem;">Belum ada berita yang dipublish.</p>
            </div>
        @endforelse
    </div>

    <script>
        async function shareNews(title, url) {
            if (navigator.share) {
                try {
                    await navigator.share({
                        title: title,
                        text: 'Baca berita ini di Sistem Waris: ' + title,
                        url: url
                    });
                } catch (err) {
                    console.log('Error sharing:', err);
                }
            } else {
                // Fallback copy to clipboard
                navigator.clipboard.writeText(url).then(function() {
                    alert('Link berhasil disalin ke clipboard!');
                }, function(err) {
                    console.error('Gagal menyalin link: ', err);
                    prompt('Salin link ini:', url);
                });
            }
        }

        function toggleLike(btn) {
            const icon = btn.querySelector('i');
            if (icon.classList.contains('fa-regular')) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
                icon.style.color = '#dc3545';
            } else {
                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
                icon.style.color = '';
            }
        }
    </script>

@endsection
