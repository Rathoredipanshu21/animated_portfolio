<?php
    // navbar.php
    $currentPage = basename($_SERVER['SCRIPT_FILENAME'], '.php');

    // Define navigation items
    $navItems = [
        ['name' => 'Home', 'file' => 'index.php'],
        ['name' => 'About', 'file' => '#about'],
        ['name' => 'Skills', 'file' => 'skills.php'],
        ['name' => 'Projects', 'file' => 'project'],
        ['name' => 'Travel Diaries', 'file' => 'travel'],
        ['name' => 'Contact', 'file' => 'contact'],
    ];
?>

<!-- Load Tailwind, Lucide Icons, and Fonts -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    /* --- GLOBAL OVERFLOW FIX --- */
    html, body {
        overflow-x: hidden;
        width: 100%;
        position: relative;
    }

    /* --- THEME VARIABLES --- */
    :root {
        --deep-jungle: #050a07;
        --leaf-light: #4ade80;
        --gold-accent: #fbbf24;
    }

    /* Fonts */
    .font-cinzel { font-family: 'Cinzel', serif; }
    .font-montserrat { font-family: 'Montserrat', sans-serif; }

    /* Navbar Container */
    #main-navbar {
        transition: all 0.4s ease-in-out;
        background: rgba(5, 10, 7, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(74, 222, 128, 0.1);
    }

    /* Hover State */
    #main-navbar:hover {
        border-color: var(--gold-accent);
        box-shadow: 0 0 20px rgba(251, 191, 36, 0.15);
    }

    /* Desktop Nav Links */
    .nav-link {
        font-family: 'Montserrat', sans-serif;
        position: relative;
        transition: color 0.3s ease;
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: var(--gold-accent);
        transition: width 0.3s ease;
    }

    .nav-link:hover {
        color: var(--gold-accent);
    }

    .nav-link:hover::after {
        width: 100%;
    }

    /* Mobile Menu Container */
    #mobile-menu-overlay {
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        /* Ensure it sits below the navbar but above page content */
        z-index: 40; 
    }

    /* When hidden, move off screen */
    .menu-hidden {
        transform: translateX(100%);
    }

    /* When shown, move to 0 */
    .menu-visible {
        transform: translateX(0);
    }

    /* Scrolled State */
    .navbar-scrolled {
        background-color: rgba(5, 10, 7, 0.95) !important; 
        border-bottom: 1px solid rgba(74, 222, 128, 0.2);
    }
</style>

<!-- Navbar Wrapper (High Z-Index to stay above mobile menu) -->
<div class="fixed top-0 left-0 right-0 z-[60] w-full font-montserrat">
    <div id="navbar-wrapper" class="py-4 transition-all duration-300 ease-in-out">
        <nav id="main-navbar" class="mx-auto flex justify-between items-center w-[92%] md:w-[85%] lg:w-[80%] py-3 px-6 md:px-8 rounded-full relative bg-opacity-90">
            
            <!-- Logo -->
            <a href="index.php" class="text-xl md:text-2xl font-bold tracking-wider text-white font-cinzel flex items-center gap-2">
                <i data-lucide="leaf" class="w-5 h-5 text-green-400"></i>
                FOREST <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400">DEV</span>
            </a>

            <!-- Desktop Navigation (Hidden on Mobile) -->
            <div class="hidden lg:flex items-center space-x-8">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?php echo $item['file']; ?>" class="nav-link text-gray-300 text-xs uppercase tracking-[0.15em] font-semibold">
                        <?php echo $item['name']; ?>
                    </a>
                <?php endforeach; ?>

                <a href="#contact" class="px-6 py-2.5 rounded-full border border-green-500 text-green-400 font-bold text-xs uppercase tracking-widest hover:bg-green-500 hover:text-black transition-all shadow-[0_0_10px_rgba(74,222,128,0.2)] hover:shadow-[0_0_20px_rgba(74,222,128,0.6)]">
                    Hire Me
                </a>
            </div>
            
            <!-- Mobile Menu Toggle Button (Visible on Mobile) -->
            <!-- ADDED ID 'mobile-menu-btn' here specifically -->
            <button id="mobile-menu-btn" class="lg:hidden text-white hover:text-yellow-400 cursor-pointer transition focus:outline-none p-2">
                <i id="menu-icon" data-lucide="menu" class="w-8 h-8"></i>
            </button>
        </nav>
    </div>
</div>

<!-- Mobile Menu Full Screen Overlay -->
<!-- ADDED ID 'mobile-menu-overlay' here -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-[#050a07] menu-hidden flex flex-col justify-center items-center gap-8 h-screen w-screen overflow-hidden">
    
    <!-- Background Decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_rgba(74,222,128,0.1)_0%,_transparent_70%)] pointer-events-none"></div>

    <!-- Mobile Navigation Links Loop -->
    <div class="flex flex-col items-center gap-6 z-50">
        <?php foreach ($navItems as $item): ?>
            <a href="<?php echo $item['file']; ?>" class="mobile-nav-link text-2xl font-cinzel text-gray-200 hover:text-yellow-400 transition-colors tracking-widest uppercase">
                <?php echo $item['name']; ?>
            </a>
        <?php endforeach; ?>

        <!-- Mobile Hire Me Button -->
        <a href="#contact" class="mobile-nav-link mt-6 px-10 py-3 rounded-full border border-green-500 text-green-400 font-bold text-sm uppercase tracking-widest hover:bg-green-500 hover:text-black transition-all">
            Hire Me
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Icons
        lucide.createIcons();
        
        // Select Elements
        const menuBtn = document.getElementById('mobile-menu-btn');
        const menuIcon = document.getElementById('menu-icon');
        const mobileMenu = document.getElementById('mobile-menu-overlay');
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');
        const mainNav = document.getElementById('main-navbar');
        
        let isMenuOpen = false;

        // Toggle Menu Function
        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                // Open Menu
                mobileMenu.classList.remove('menu-hidden');
                mobileMenu.classList.add('menu-visible');
                document.body.style.overflow = 'hidden'; // Stop background scrolling
                
                // Change Icon to 'X'
                // We recreate the icon element to ensure Lucide renders it
                menuBtn.innerHTML = '<i data-lucide="x" class="w-8 h-8 text-yellow-400"></i>';
                lucide.createIcons();
            } else {
                // Close Menu
                mobileMenu.classList.remove('menu-visible');
                mobileMenu.classList.add('menu-hidden');
                document.body.style.overflow = ''; // Restore scrolling
                
                // Change Icon back to 'Menu'
                menuBtn.innerHTML = '<i data-lucide="menu" class="w-8 h-8 text-white"></i>';
                lucide.createIcons();
            }
        }

        // Add Click Event
        if(menuBtn) {
            menuBtn.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent bubbling
                toggleMenu();
            });
        }

        // Close Menu when clicking a link
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if(isMenuOpen) toggleMenu();
            });
        });

        // Scroll Effect for Navbar
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                mainNav.classList.add('navbar-scrolled');
            } else {
                mainNav.classList.remove('navbar-scrolled');
            }
        });
    });
</script>