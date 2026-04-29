@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('informasi') }}">Informasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->judul, 30) }}</li>
                </ol>
            </nav>

            <article class="news-article">
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1">{{ $berita->judul }}</h1>
                    
                    <div class="text-muted fst-italic mb-2">
                        Diposting pada {{ $berita->published_at ? $berita->published_at->format('d M Y, H:i') : $berita->created_at->format('d M Y, H:i') }}
                        oleh <span class="fw-bold">{{ $berita->penulis }}</span>
                    </div>
                    
                    <div class="d-flex gap-2 mb-3">
                        <span class="badge bg-secondary text-decoration-none link-light">{{ $berita->kategori }}</span>
                        @if($berita->views > 0)
                            <span class="badge bg-light text-dark border"><i class="fas fa-eye"></i> {{ number_format($berita->views) }} views</span>
                        @endif
                    </div>
                </header>
                
                @if($berita->thumbnail)
                    <figure class="mb-4">
                        <img class="img-fluid rounded" 
                             src="/SistemWebWaris/SistemWarisCMS/public/storage/{{ $berita->thumbnail }}" 
                             alt="{{ $berita->judul }}" 
                             style="width: 100%; max-height: 500px; object-fit: cover;"
                             onerror="this.onerror=null;this.src='https://via.placeholder.com/800x500?text=No+Image'">
                    </figure>
                @endif
                
                <div class="news-content mb-5">
                    @php
                        // Fix relative paths for images in content to point to CMS storage
                        $content = $berita->isi_konten;
                        $content = str_replace('src="/storage/', 'src="/SistemWebWaris/SistemWarisCMS/public/storage/', $content);
                        $content = str_replace('src="storage/', 'src="/SistemWebWaris/SistemWarisCMS/public/storage/', $content);
                    @endphp
                    {!! $content !!}
                </div>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const contentImages = document.querySelectorAll('.news-content img');
                        contentImages.forEach(img => {
                            img.onerror = function() {
                                this.onerror = null;
                                this.src = 'https://via.placeholder.com/800x500?text=No+Image';
                            };
                        });
                    });
                </script>
                
                <div class="d-flex align-items-center justify-content-between mt-5 pt-4 border-top">
                    <div class="d-flex gap-3">
                        <div class="dropdown">
                            <button class="btn btn-primary px-4 py-2 rounded-pill shadow-sm d-flex align-items-center gap-2" type="button" id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: linear-gradient(135deg, #0d6efd, #0a58ca); border: none;">
                                <i class="fas fa-share"></i> 
                                <span class="fw-medium">Bagikan</span>
                            </button>
                            <ul class="dropdown-menu shadow-lg border-0 p-2" aria-labelledby="shareDropdown" style="min-width: 220px; border-radius: 12px;">
                                <li>
                                    <a class="dropdown-item rounded py-2 d-flex align-items-center gap-3" href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul) }}%0A{{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer">
                                        <span class="d-flex align-items-center justify-content-center bg-success bg-opacity-10 rounded-circle" style="width: 32px; height: 32px;">
                                            <i class="fa-brands fa-whatsapp text-success fs-5"></i>
                                        </span>
                                        <span>WhatsApp</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded py-2 d-flex align-items-center gap-3" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer">
                                        <span class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle" style="width: 32px; height: 32px;">
                                            <i class="fa-brands fa-facebook text-primary fs-5"></i>
                                        </span>
                                        <span>Facebook</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded py-2 d-flex align-items-center gap-3" href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer">
                                        <span class="d-flex align-items-center justify-content-center bg-dark bg-opacity-10 rounded-circle" style="width: 32px; height: 32px;">
                                            <i class="fa-brands fa-twitter text-dark fs-5"></i>
                                        </span>
                                        <span>Twitter / X</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-2"></li>
                                <li>
                                    <button type="button" class="dropdown-item rounded py-2 d-flex align-items-center gap-3" onclick="copyToClipboard(event, this)">
                                        <span class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-10 rounded-circle" style="width: 32px; height: 32px;">
                                            <i class="fas fa-link text-secondary"></i>
                                        </span>
                                        <span class="copy-text">Salin Link</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('informasi') }}" class="btn btn-light rounded-pill px-4 text-decoration-none border hover-shadow">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </article>
        </div>
    </div>
</div>

<script>
    function toggleLike(btn) {
        const icon = btn.querySelector('i');
        if (icon.classList.contains('fa-regular')) {
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid');
            btn.classList.remove('btn-outline-danger');
            btn.classList.add('btn-danger');
        } else {
            icon.classList.remove('fa-solid');
            icon.classList.add('fa-regular');
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-outline-danger');
        }
    }
    
    function shareNative() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $berita->judul }}',
                text: '{{ Str::limit(strip_tags($berita->deskripsi), 100) }}',
                url: window.location.href,
            })
            .then(() => console.log('Successful share'))
            .catch((error) => console.log('Error sharing', error));
        } else {
            alert('Fitur berbagi bawaan tidak didukung di browser ini. Silakan gunakan opsi media sosial lainnya.');
        }
    }

    function copyToClipboard(event, btn) {
        event.preventDefault();
        event.stopPropagation(); // Keep dropdown open to show success message

        const spanText = btn.querySelector('.copy-text') || btn.querySelector('span:last-child');
        const originalText = spanText.innerText;
        const icon = btn.querySelector('i');
        const originalIconClass = icon.className;
        const url = window.location.href;

        // Function to handle success UI update
        const handleSuccess = () => {
            spanText.innerText = 'Tersalin!';
            icon.className = 'fas fa-check text-success';
            btn.classList.add('bg-light');
            
            setTimeout(() => {
                spanText.innerText = originalText;
                icon.className = originalIconClass;
                btn.classList.remove('bg-light');
            }, 2000);
        };

        const handleError = (err) => {
             console.error('Copy failed:', err);
             alert('Gagal menyalin link. Silakan salin manual dari address bar.');
        };

        // Fallback method using textarea
        const fallbackCopy = () => {
            try {
                const textArea = document.createElement("textarea");
                textArea.value = url;
                
                // Ensure textarea is not visible but part of DOM
                textArea.style.position = "fixed";
                textArea.style.left = "-9999px";
                textArea.style.top = "0";
                document.body.appendChild(textArea);
                
                textArea.focus();
                textArea.select();

                const successful = document.execCommand('copy');
                document.body.removeChild(textArea);

                if (successful) {
                    handleSuccess();
                } else {
                    handleError('Fallback execCommand failed');
                }
            } catch (err) {
                handleError(err);
            }
        };

        // Try modern Clipboard API first
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url)
                .then(handleSuccess)
                .catch(err => {
                    console.warn('Clipboard API failed, trying fallback:', err);
                    fallbackCopy();
                });
        } else {
            fallbackCopy();
        }
    }
</script>

<style>
    .news-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #2c3e50;
    }
    .news-content p {
        margin-bottom: 1.5rem;
    }
    .news-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }
    
    .hover-shadow:hover {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }
    
    .dropdown-item:active {
        background-color: #f8f9fa;
        color: inherit;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection
