<?php
// Footer page for Forest Portfolio
?>
<!-- Font Imports (Ensure these are loaded) -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    .font-cinzel { font-family: 'Cinzel', serif; }
    .font-montserrat { font-family: 'Montserrat', sans-serif; }
    
    .footer-link {
        transition: all 0.3s ease;
    }
    .footer-link:hover {
        color: #fbbf24; /* Gold Accent */
        padding-left: 5px;
    }
    
    .newsletter-input:focus {
        border-color: #4ade80; /* Leaf Green */
        box-shadow: 0 0 0 2px rgba(74, 222, 128, 0.2);
    }
</style>

<footer id="main-footer" class="bg-[#050a07] relative z-20 font-montserrat border-t border-green-900/30 pt-16 pb-8">
    <div class="container mx-auto px-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
            
            <!-- Column 1: Brand Info -->
            <div class="mb-8 lg:mb-0">
                <h3 class="text-2xl font-bold text-white mb-6 font-cinzel flex items-center gap-2">
                    <i data-lucide="sprout" class="text-green-400"></i> Dipanshu Singh
                </h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Building robust digital ecosystems. I blend technical logic with organic creativity to craft websites that grow your business.
                </p>
                
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 border border-gray-700 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-400 hover:text-yellow-400 transition duration-300">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border border-gray-700 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-400 hover:text-yellow-400 transition duration-300">
                        <i data-lucide="github" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border border-gray-700 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-400 hover:text-yellow-400 transition duration-300">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="mb-8 lg:mb-0">
                 <h3 class="text-lg font-bold text-white mb-6 font-cinzel">
                    Explore
                </h3>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li>
                        <a href="index.php" class="footer-link flex items-center">
                            <i data-lucide="chevron-right" class="w-3 h-3 mr-2 text-green-500"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="#about" class="footer-link flex items-center">
                            <i data-lucide="chevron-right" class="w-3 h-3 mr-2 text-green-500"></i>About Me
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="footer-link flex items-center">
                            <i data-lucide="chevron-right" class="w-3 h-3 mr-2 text-green-500"></i>Services
                        </a>
                    </li>
                    <li>
                        <a href="#projects" class="footer-link flex items-center">
                            <i data-lucide="chevron-right" class="w-3 h-3 mr-2 text-green-500"></i>Projects
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="footer-link flex items-center">
                            <i data-lucide="chevron-right" class="w-3 h-3 mr-2 text-green-500"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="mb-8 lg:mb-0">
                 <h3 class="text-lg font-bold text-white mb-6 font-cinzel">
                    Get in Touch
                </h3>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-green-500 flex-shrink-0"></i>
                        <span>
                            Dhanbad, Jharkhand, India
                        </span>
                    </li>
                    <li class="flex items-center">
                         <i data-lucide="mail" class="w-5 h-5 mr-3 text-green-500 flex-shrink-0"></i>
                        <span>rathoredipanshu21@gmail.com</span>
                    </li>
                    <li class="flex items-center">
                         <i data-lucide="phone" class="w-5 h-5 mr-3 text-green-500 flex-shrink-0"></i>
                        <span>+91 62014 03690</span>
                    </li>
                </ul>

                <div class="mt-8">
                    <a href="Assets/Dips_resume.pdf" download class="group flex items-center justify-center w-full md:w-auto bg-white/5 border border-white/10 text-white font-bold py-3 px-5 rounded-lg hover:bg-green-600 hover:border-green-600 transition duration-300">
                        <i data-lucide="download" class="w-4 h-4 mr-2 group-hover:animate-bounce"></i>
                        Download Resume
                    </a>
                </div>
            </div>

            <!-- Column 4: Newsletter -->
            <div>
                 <h3 class="text-lg font-bold text-white mb-6 font-cinzel">
                    Newsletter
                </h3>
                <p class="text-gray-400 text-sm mb-4">
                    Subscribe for the latest tech updates and project news.
                </p>
                <form action="#" method="POST" class="flex flex-col gap-3">
                    <input type="email" placeholder="Your email address" 
                        class="newsletter-input p-3 w-full rounded-lg bg-gray-900/50 text-white border border-gray-700 focus:outline-none transition-all" required>
                    <button type="submit" 
                        class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-bold p-3 rounded-lg transition duration-300 shadow-lg hover:shadow-green-500/20">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="mt-16 pt-8 border-t border-gray-900 text-center text-gray-500 text-xs">
            <p>&copy; <?php echo date("Y"); ?> Dipanshu Singh. All Rights Reserved.</p>
            <p class="mt-2">
                Designed with <span class="text-green-500">Nature's Logic</span>.
            </p>
        </div>

    </div>
    
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</footer>