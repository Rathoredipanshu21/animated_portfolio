<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipanshu Singh | Full Stack Developer</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Specific Typography for Content */
        h1, h2, h3, .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        /* --- CONTENT STYLING --- */
        main {
            position: relative;
            z-index: 10; /* Content is strictly ABOVE trees */
        }

        .glass-card {
            background: rgba(10, 20, 15, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            border-color: var(--gold-accent);
            background: rgba(10, 20, 15, 0.8);
            transform: translateY(-5px);
        }

        /* --- UTILS --- */
        .text-gold { color: var(--gold-accent); }
        .border-gold { border-color: var(--gold-accent); }
        
        /* Typewriter Cursor */
        .typing-cursor {
            display: inline-block;
            width: 3px;
            background-color: var(--gold-accent);
            animation: blink 1s infinite;
        }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
    </style>
</head>
<body>

    

    <main class="w-full">

        <section id="home" class="min-h-screen flex items-center justify-center relative">
            <div class="container mx-auto px-4 text-center relative z-20" data-aos="zoom-in" data-aos-duration="1200">
                
                <div class="inline-flex items-center gap-2 px-5 py-2 mb-8 border border-yellow-500/30 rounded-full bg-black/50 backdrop-blur-md text-yellow-400 text-xs font-bold tracking-widest uppercase shadow-lg">
                    <i data-lucide="map-pin" class="w-3 h-3"></i> Dhanbad, India
                </div>
                
                <h1 class="text-5xl md:text-8xl font-cinzel font-bold text-white mb-6 leading-tight drop-shadow-2xl">
                    HIRE ME FOR <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-yellow-400 to-green-500">GREAT PROJECTS</span>
                </h1>
                
                <div class="h-10 md:h-14 mb-6 text-xl md:text-3xl text-gray-300 font-light">
                    I am a <span id="typewriter-text" class="text-gold font-semibold"></span><span class="typing-cursor">&nbsp;</span>
                </div>

                <div class="flex justify-center items-center gap-6 mb-10">
                    <a href="https://github.com/Rathoredipanshu21" target="_blank" class="text-gray-400 hover:text-white transition-all hover:scale-110 duration-300">
                        <i data-lucide="github" class="w-6 h-6"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/dipanshu-rathore-3549672a8/" target="_blank" class="text-gray-400 hover:text-[#0077b5] transition-all hover:scale-110 duration-300">
                        <i data-lucide="linkedin" class="w-6 h-6"></i>
                    </a>
                    <a href="https://www.instagram.com/r.a.t.h.o.r.e21/" target="_blank" class="text-gray-400 hover:text-[#E4405F] transition-all hover:scale-110 duration-300">
                        <i data-lucide="instagram" class="w-6 h-6"></i>
                    </a>
                    <a href="https://www.facebook.com/dipanshu.rathore.589/" target="_blank" class="text-gray-400 hover:text-[#1877F2] transition-all hover:scale-110 duration-300">
                        <i data-lucide="facebook" class="w-6 h-6"></i>
                    </a>
                    <a href="https://x.com/rathore7482" target="_blank" class="text-gray-400 hover:text-white transition-all hover:scale-110 duration-300">
                        <i data-lucide="twitter" class="w-6 h-6"></i>
                    </a>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="Assets/Dips_resume.pdf" download class="group relative px-8 py-4 bg-white text-black font-bold text-lg rounded-full overflow-hidden transition-all hover:scale-105 hover:shadow-[0_0_30px_rgba(255,255,255,0.3)]">
                        <span class="relative z-10 flex items-center gap-2">
                            <i data-lucide="file-text" class="w-5 h-5"></i> Download Resume
                        </span>
                        <div class="absolute inset-0 bg-gray-200 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </a>
                    
                    <a href="#contact" class="px-8 py-4 border border-green-500 text-green-400 font-bold text-lg rounded-full hover:bg-green-500 hover:text-black transition-all hover:shadow-[0_0_30px_rgba(74,222,128,0.3)] flex items-center justify-center gap-2">
                        <i data-lucide="rocket" class="w-5 h-5"></i> Start a Project
                    </a>
                </div>
            </div>
        </section>

        <section id="about" class="py-32 relative">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    
                    <div data-aos="fade-right" class="relative">
                        <div class="absolute -inset-2 bg-gradient-to-tr from-green-600 to-yellow-500 opacity-20 rounded-2xl blur-2xl"></div>
                        <div class="glass-card p-10 rounded-2xl relative z-10 text-center">
                             <div class="w-24 h-24 mx-auto bg-gray-800 rounded-full mb-6 overflow-hidden border-2 border-gold">
                                <img src="https://ui-avatars.com/api/?name=Dipanshu+Singh&background=fbbf24&color=000" alt="Dipanshu Singh" class="w-full h-full object-cover">
                             </div>
                             <h3 class="text-2xl font-cinzel text-white mb-2">Dipanshu Singh</h3>
                             <p class="text-gray-400">Full Stack Developer</p>
                             <div class="mt-6 flex justify-center gap-4 text-sm text-gray-300">
                                 <span class="flex items-center gap-1"><i data-lucide="code"></i> Clean Code</span>
                                 <span class="flex items-center gap-1"><i data-lucide="zap"></i> Fast Delivery</span>
                             </div>
                        </div>
                    </div>

                    <div data-aos="fade-left" class="space-y-6">
                        <h2 class="text-4xl md:text-5xl font-cinzel text-white">
                            About <span class="text-gold">Me</span>
                        </h2>
                        <div class="text-gray-300 text-lg leading-relaxed space-y-4">
                            <p>
                                Hey, I'm <strong>Dipanshu Singh</strong>, based in <strong>Dhanbad, India</strong>. I am a passionate technologist dedicated to building scalable and efficient digital solutions.
                            </p>
                            <p>
                                With extensive experience in the <strong>MERN Stack</strong> and <strong>PHP Development</strong>, I transform complex requirements into seamless web applications. My approach combines technical precision with creative problem-solving.
                            </p>
                            <p>
                                Beyond development, I specialize in <strong>Digital Marketing</strong> (Meta Ads & SEO), ensuring that the products I build also reach their intended audience effectively.
                            </p>
                        </div>
                        
                        <div class="pt-4 flex flex-wrap gap-3">
                            <span class="px-4 py-2 bg-green-900/30 border border-green-600/40 rounded-full text-green-300 text-sm font-medium">PHP Expert</span>
                            <span class="px-4 py-2 bg-yellow-900/30 border border-yellow-600/40 rounded-full text-yellow-300 text-sm font-medium">Full Stack Architect</span>
                            <span class="px-4 py-2 bg-blue-900/30 border border-blue-600/40 rounded-full text-blue-300 text-sm font-medium">Growth Strategist</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="services" class="py-32 relative">
            <div class="container mx-auto px-6 max-w-7xl">
                <div class="text-center mb-20" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-cinzel text-white mb-6">My <span class="text-green-500">Expertise</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Delivering professional solutions tailored to your business needs.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="glass-card p-8 rounded-2xl group" data-aos="fade-up" data-aos-delay="0">
                        <div class="w-14 h-14 bg-green-900/40 rounded-xl flex items-center justify-center mb-6 text-green-400 group-hover:scale-110 transition-transform">
                            <i data-lucide="server" class="w-7 h-7"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Backend Development</h3>
                        <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                            Building secure, high-performance server-side architectures using PHP and Node.js tailored for scalability.
                        </p>
                    </div>

                    <div class="glass-card p-8 rounded-2xl group" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-14 h-14 bg-yellow-900/40 rounded-xl flex items-center justify-center mb-6 text-yellow-400 group-hover:scale-110 transition-transform">
                            <i data-lucide="layout" class="w-7 h-7"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Full Stack Solutions</h3>
                        <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                            Creating responsive, dynamic user interfaces with React.js, integrated seamlessly with robust databases.
                        </p>
                    </div>

                    <div class="glass-card p-8 rounded-2xl group" data-aos="fade-up" data-aos-delay="400">
                        <div class="w-14 h-14 bg-blue-900/40 rounded-xl flex items-center justify-center mb-6 text-blue-400 group-hover:scale-110 transition-transform">
                            <i data-lucide="trending-up" class="w-7 h-7"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Digital Marketing</h3>
                        <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                            Strategic Meta Ads and SEO campaigns designed to maximize ROI and enhance brand visibility.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <footer id="contact" class="py-24 border-t border-gray-800 bg-black/80 relative">
           
        </footer>

    </main>

    <script>
        // 1. Initialize Libraries (AOS, Lucide)
        // Note: ScrollTrigger is registered in birdfly.php, but it doesn't hurt to have it here too if needed for content
        AOS.init({ duration: 1000, once: true, offset: 80 });
        lucide.createIcons();

        // 2. Typewriter Effect
        const roles = [
            "PHP Developer", 
            "MERN Stack Developer", 
            "Full Stack Developer", 
            "Digital Marketer"
        ];
        const typeText = document.getElementById("typewriter-text");
        let roleIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeWriter() {
            const currentRole = roles[roleIndex];
            if (isDeleting) {
                typeText.textContent = currentRole.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typeText.textContent = currentRole.substring(0, charIndex + 1);
                charIndex++;
            }

            let typeSpeed = isDeleting ? 50 : 100;
            if (!isDeleting && charIndex === currentRole.length) {
                isDeleting = true;
                typeSpeed = 2000;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
                typeSpeed = 500;
            }
            setTimeout(typeWriter, typeSpeed);
        }
        document.addEventListener('DOMContentLoaded', typeWriter);
    </script>
</body>
</html>