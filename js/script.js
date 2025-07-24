document.addEventListener('DOMContentLoaded', function () {

    // =======================================================
    // BAGIAN 1: EFEK HEADER TRANSPARAN SAAT SCROLL
    // =======================================================
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // =======================================================
    // BAGIAN 2: LOGIKA UNTUK NAVIGASI MOBILE (HAMBURGER) - FINAL FIX
    // =======================================================
    const hamburger = document.getElementById('hamburger-menu');
    const navLinksList = document.getElementById('nav-links');

    if (hamburger && navLinksList) {
        // Fungsi untuk membuka/menutup menu
        const toggleMenu = () => {
            hamburger.classList.toggle('open');
            navLinksList.classList.toggle('active');
        };
        
        // Buka/tutup menu saat tombol hamburger di-klik
        hamburger.addEventListener('click', toggleMenu);

        // Tutup menu saat salah satu link di dalamnya di-klik
        // Ini penting agar setelah memilih, menu otomatis tertutup
        navLinksList.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (navLinksList.classList.contains('active')) {
                    toggleMenu();
                }
            });
        });
    }


    // =======================================================
    // BAGIAN 3: LOGIKA UNTUK SMOOTH SCROLL (BERLAKU DI DESKTOP & MOBILE)
    // =======================================================
    const allNavLinks = document.querySelectorAll('#nav-links a');

    allNavLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Cek apakah ini link ke section di halaman yang sama (mengandung '#')
            if (href.includes('#')) {
                const url = new URL(href, window.location.origin);
                const onSamePage = url.pathname === window.location.pathname || url.pathname.endsWith('/');

                if (onSamePage) {
                    e.preventDefault(); // Hentikan aksi default HANYA jika scroll di halaman yang sama
                    const targetId = url.hash.substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        const headerHeight = header ? header.offsetHeight : 80;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerHeight;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            }
            // Jika link tidak mengandung '#' (misal ke ppdb.php), biarkan browser bekerja normal
        });
    });

});