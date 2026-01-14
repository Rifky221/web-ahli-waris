/**
 * File: beranda.js
 * Deskripsi: JavaScript untuk halaman beranda Sistem Waris
 * Fungsi: Mengatur interaksi burger menu untuk tampilan mobile
 * Author: [Nama Anda]
 * Tanggal: [Tanggal Pembuatan]
 */

// Variabel global untuk mengelola state burger menu
let isMobileMenuOpen = false;

// Fungsi utama yang akan dijalankan saat dokumen siap
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi elemen DOM
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    const body = document.body;
    const html = document.documentElement;

    // Fungsi untuk membuka mobile menu
    function openMobileMenu() {
        isMobileMenuOpen = true;
        burgerMenu.classList.add('active');
        mobileMenu.classList.add('active');
        mobileOverlay.classList.add('active');
        
        // Hanya nonaktifkan scroll Y untuk body, biarkan X normal
        body.style.overflowY = 'hidden';
        body.style.overflowX = 'auto'; // Biarkan X normal
        
        // Untuk html element juga
        html.style.overflowY = 'hidden';
        html.style.overflowX = 'auto'; // Biarkan X normal
    }

    // Fungsi untuk menutup mobile menu
    function closeMobileMenuFunc() {
        isMobileMenuOpen = false;
        burgerMenu.classList.remove('active');
        mobileMenu.classList.remove('active');
        mobileOverlay.classList.remove('active');
        
        // Kembalikan overflow ke default
        body.style.overflowY = '';
        body.style.overflowX = '';
        
        html.style.overflowY = '';
        html.style.overflowX = '';
    }

    // Event Listener untuk burger menu button
    if (burgerMenu) {
        burgerMenu.addEventListener('click', function(e) {
            e.stopPropagation(); // Cegah event bubbling
            
            if (this.classList.contains('active')) {
                closeMobileMenuFunc();
            } else {
                openMobileMenu();
            }
        });
    }

    // Event Listener untuk overlay
    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', function(e) {
            if (isMobileMenuOpen) {
                e.stopPropagation();
                closeMobileMenuFunc();
            }
        });
    }

    // Event Listener untuk tombol close di mobile menu
    if (closeMobileMenu) {
        closeMobileMenu.addEventListener('click', function(e) {
            e.stopPropagation();
            closeMobileMenuFunc();
        });
    }

    // Event Listener untuk semua link di mobile menu
    const mobileMenuLinks = mobileMenu ? mobileMenu.querySelectorAll('a') : [];
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.stopPropagation();
            closeMobileMenuFunc();
        });
    });

    // Event Listener untuk tombol Escape keyboard
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMobileMenuOpen) {
            closeMobileMenuFunc();
        }
    });

    // Mencegah scroll di mobile menu saat menggunakan touch
    if (mobileMenu) {
        mobileMenu.addEventListener('touchmove', function(e) {
            if (isMobileMenuOpen) {
                // Biarkan scroll hanya di dalam mobile menu
                e.stopPropagation();
            }
        }, { passive: false });
    }

    // Fungsi untuk menangani perubahan ukuran layar
    function handleResize() {
        // Jika lebar layar lebih dari 768px dan menu mobile terbuka, tutup menu
        if (window.innerWidth > 768 && isMobileMenuOpen) {
            closeMobileMenuFunc();
        }
        
        // Panggil fungsi untuk memastikan tidak ada horizontal scroll yang tidak diinginkan
        ensureNoHorizontalScroll();
    }

    // Event Listener untuk resize window
    window.addEventListener('resize', handleResize);

    // Inisialisasi komponen lainnya
    initializeOtherComponents();
    
    // Panggil fungsi untuk memastikan tidak ada horizontal scroll yang tidak diinginkan
    ensureNoHorizontalScroll();
});

/**
 * Fungsi untuk memastikan tidak ada horizontal scroll yang tidak diinginkan
 * Tapi tetap memperhatikan burger menu
 */
function ensureNoHorizontalScroll() {
    // Periksa apakah ada elemen yang menyebabkan horizontal scroll
    const bodyWidth = document.body.scrollWidth;
    const viewportWidth = window.innerWidth;
    
    // Hanya terapkan jika burger menu tidak terbuka
    if (bodyWidth > viewportWidth && !isMobileMenuOpen) {
        console.log('Memperbaiki horizontal scroll yang tidak diinginkan...');
        
        // Nonaktifkan horizontal scroll TAPI biarkan untuk burger menu
        document.documentElement.style.overflowX = 'hidden';
        document.body.style.overflowX = 'hidden';
    } else if (isMobileMenuOpen) {
        // Jika burger menu terbuka, pastikan overflow-x normal untuk mobile menu
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) {
            mobileMenu.style.overflowX = 'auto';
        }
    }
}

/**
 * Fungsi untuk menginisialisasi komponen lainnya
 */
function initializeOtherComponents() {
    console.log('Komponen beranda diinisialisasi');
    
    // Tambahkan efek hover untuk alur-item (opsional)
    const alurItems = document.querySelectorAll('.alur-item');
    alurItems.forEach(item => {
        item.addEventListener('click', function() {
            console.log('Alur item diklik: ' + this.querySelector('p').textContent);
        });
    });
    
    // Tambahkan event untuk menutup mobile menu jika klik di luar
    document.addEventListener('click', function(e) {
        const mobileMenu = document.getElementById('mobileMenu');
        const burgerMenu = document.getElementById('burgerMenu');
        
        if (isMobileMenuOpen && mobileMenu && burgerMenu && 
            !mobileMenu.contains(e.target) && 
            !burgerMenu.contains(e.target)) {
            closeMobileMenuFunc();
        }
    });
}

// Fungsi untuk menutup mobile menu (dibuat global untuk akses dari fungsi lain)
function closeMobileMenuFunc() {
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const body = document.body;
    const html = document.documentElement;
    
    if (burgerMenu) burgerMenu.classList.remove('active');
    if (mobileMenu) mobileMenu.classList.remove('active');
    if (mobileOverlay) mobileOverlay.classList.remove('active');
    
    isMobileMenuOpen = false;
    
    // Kembalikan overflow ke default
    if (body) {
        body.style.overflowY = '';
        body.style.overflowX = '';
    }
    
    if (html) {
        html.style.overflowY = '';
        html.style.overflowX = '';
    }
}

// Panggil saat halaman dimuat sepenuhnya
window.addEventListener('load', function() {
    // Tunggu sebentar untuk memastikan semua elemen sudah terload
    setTimeout(ensureNoHorizontalScroll, 100);
});

/**
 * Fungsi utilitas untuk debugging
 */
function debugHorizontalScroll() {
    const bodyWidth = document.body.scrollWidth;
    const viewportWidth = window.innerWidth;
    const htmlWidth = document.documentElement.scrollWidth;
    
    console.log('Debug Horizontal Scroll:');
    console.log('- Body scrollWidth:', bodyWidth);
    console.log('- Viewport width:', viewportWidth);
    console.log('- HTML scrollWidth:', htmlWidth);
    console.log('- Burger menu open:', isMobileMenuOpen);
    console.log('- Difference:', bodyWidth - viewportWidth);
    
    // Cari elemen yang mungkin menyebabkan overflow
    if (bodyWidth > viewportWidth) {
        console.log('Elemen yang mungkin menyebabkan overflow:');
        document.querySelectorAll('*').forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.right > viewportWidth || rect.left < 0) {
                console.log('-', el.tagName, el.className, 'width:', rect.width, 'right:', rect.right);
            }
        });
    }
}
/**
 * Animasi untuk Hero Section
 */
function initializeHeroAnimations() {
    const heroParagraph = document.querySelector('.hero p');
    
    if (heroParagraph) {
        // Animasi saat scroll ke hero section
        const observerOptions = {
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    
                    // Animasi teks per kata (optional)
                    animateTextWords(entry.target);
                }
            });
        }, observerOptions);
        
        observer.observe(heroParagraph);
        
        // Hover effect tambahan
        heroParagraph.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        heroParagraph.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }
}

/**
 * Animasi untuk kata-kata dalam teks (efek ketikan)
 */
function animateTextWords(element) {
    const text = element.textContent;
    const words = text.split(' ');
    
    // Hanya lakukan di desktop untuk performance
    if (window.innerWidth > 768) {
        element.innerHTML = words.map(word => 
            `<span class="word" style="opacity: 0; animation: fadeInWord 0.5s ease forwards">${word}</span>`
        ).join(' ');
        
        // Tambahkan animasi dengan delay bertahap
        const wordElements = element.querySelectorAll('.word');
        wordElements.forEach((word, index) => {
            word.style.animationDelay = `${index * 0.05}s`;
        });
    }
}

// Tambahkan style untuk animasi kata
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInWord {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .hero p .word {
        display: inline-block;
    }
`;
document.head.appendChild(style);

// Panggil fungsi animasi hero di dalam initializeOtherComponents()
function initializeOtherComponents() {
    // ... kode yang sudah ada ...
    
    // Inisialisasi animasi hero
    initializeHeroAnimations();
    
    // ... kode yang sudah ada ...
}

// Untuk debugging, bisa dipanggil dari console: debugHorizontalScroll()