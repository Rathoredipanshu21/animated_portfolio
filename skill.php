<?php
// skills.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Expertise | Dipanshu Singh</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Animation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* --- FOREST THEME PALETTE --- */
        :root {
            --resume-jungle: #050a07;
            --resume-moss: #1a422a;
            --resume-leaf: #4ade80;
            --resume-gold: #fbbf24;
        }

        body {
            background-color: var(--resume-jungle);
            color: #f1f5f9;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            cursor: none;
        }

        h1, h2, h3, .font-cinzel { font-family: 'Cinzel', serif; }

        /* --- CUSTOM CURSOR --- */
        #resume-cursor-glow {
            position: fixed; top: 0; left: 0;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(74, 222, 128, 0.1) 0%, transparent 70%);
            transform: translate(-50%, -50%); pointer-events: none; z-index: 9998;
            mix-blend-mode: screen;
        }

        #resume-cursor-bird {
            position: fixed; top: 0; left: 0;
            width: 350px; height: auto;
            pointer-events: none; z-index: 9999;
            will-change: transform; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.5));
            transform-origin: center center;
        }

        /* --- BACKGROUND LAYERS --- */
        .resume-bg-layer {
            position: fixed; top: 0; left: 0; 
            width: 100%; height: 100vh; pointer-events: none; z-index: 0;
        }
        .resume-tree {
            position: absolute; top: 0; height: 100vh; width: 450px;
            background-image: url('Assets/left3.png'); background-size: contain; background-repeat: no-repeat;
            opacity: 1; filter: brightness(0.6);
        }
        .tree-left { left: -50px; background-position: left center; }
        .tree-right { right: -50px; transform: scaleX(-1); background-position: left center; }
        
        #resume-spore-canvas { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none; }

        /* --- SKILLS STYLING --- */
        #resume-skills { position: relative; z-index: 10; }

        .skill-category-card {
            background: rgba(10, 20, 15, 0.7);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(74, 222, 128, 0.1);
            border-radius: 1.5rem;
            padding: 2.5rem;
            transition: all 0.4s ease;
            height: 100%;
        }

        .skill-category-card:hover {
            border-color: var(--resume-gold);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        }

        .skill-icon-wrapper {
            width: 3.5rem; height: 3.5rem;
            border-radius: 1rem;
            background: rgba(5, 10, 7, 0.8);
            border: 1px solid rgba(74, 222, 128, 0.3);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--resume-leaf);
            transition: all 0.3s ease;
        }

        .skill-category-card:hover .skill-icon-wrapper {
            background: var(--resume-gold);
            color: #000;
            border-color: var(--resume-gold);
            transform: scale(1.1) rotate(5deg);
        }

        .skill-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: #cbd5e1;
            transition: color 0.2s;
        }

        .skill-list li::before {
            content: "•";
            position: absolute; left: 0; top: 0;
            color: var(--resume-leaf);
            font-weight: bold;
        }

        .skill-list li:hover { color: #fff; }
        .skill-list li:hover::before { color: var(--resume-gold); }

        .marketing-badge {
            background: linear-gradient(135deg, rgba(26, 66, 42, 0.9), rgba(5, 10, 7, 0.9));
            border: 1px solid var(--resume-gold);
        }

        @media (max-width: 768px) {
            .resume-tree { width: 120px; opacity: 0.4; }
            #resume-cursor-bird, #resume-cursor-glow { display: none; }
            body { cursor: auto; }
        }
    </style>
</head>
<body>

   

    <!-- ANIMATION LAYERS -->
    <div id="resume-cursor-glow"></div>
    <img id="resume-cursor-bird" src="Assets/flyingbird.gif" alt="Flying Bird">
    <canvas id="resume-spore-canvas"></canvas>
    
    <div class="resume-bg-layer">
        <div class="resume-tree tree-left"></div>
        <div class="resume-tree tree-right"></div>
    </div>

    <!-- MAIN CONTENT -->
    <main id="resume-skills" class="container mx-auto px-4 pt-32 pb-20">
        
        <!-- Header -->
        <div class="text-center mb-20" data-aos="zoom-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 border border-yellow-500/30 rounded-full bg-black/60 text-yellow-400 text-xs tracking-[0.2em] uppercase">
                <i data-lucide="cpu" class="w-3 h-3"></i> Capabilities
            </div>
            <h1 class="font-cinzel text-5xl md:text-7xl text-white mb-6 drop-shadow-2xl">
                Technical <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400">Arsenal</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                A curated collection of tools, languages, and methodologies I use to navigate the digital landscape.
            </p>
        </div>

        <!-- Technical Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            
            <!-- Front-End -->
            <div class="skill-category-card group" data-aos="fade-up" data-aos-delay="0">
                <div class="skill-icon-wrapper">
                    <i data-lucide="monitor" class="w-8 h-8"></i>
                </div>
                <h3 class="text-2xl font-cinzel text-white mb-6 border-b border-gray-700 pb-3 group-hover:border-yellow-500 transition-colors">Front-End</h3>
                <ul class="skill-list">
                    <li>HTML5, CSS3, JavaScript (ES6+)</li>
                    <li>React.js</li>
                    <li>Tailwind CSS, Bootstrap</li>
                    <li>GSAP, Locomotive Scroll</li>
                    <li>AOS Animation Library</li>
                </ul>
            </div>

            <!-- Back-End -->
            <div class="skill-category-card group" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-icon-wrapper">
                    <i data-lucide="server" class="w-8 h-8"></i>
                </div>
                <h3 class="text-2xl font-cinzel text-white mb-6 border-b border-gray-700 pb-3 group-hover:border-yellow-500 transition-colors">Back-End</h3>
                <ul class="skill-list">
                    <li>PHP (Modern OOP)</li>
                    <li>Node.js</li>
                    <li>Express.js</li>
                    <li>RESTful API Development</li>
                    <li>Authentication & Security</li>
                </ul>
            </div>

            <!-- Databases & Tools -->
            <div class="skill-category-card group" data-aos="fade-up" data-aos-delay="200">
                <div class="skill-icon-wrapper">
                    <i data-lucide="database" class="w-8 h-8"></i>
                </div>
                <h3 class="text-2xl font-cinzel text-white mb-6 border-b border-gray-700 pb-3 group-hover:border-yellow-500 transition-colors">Data & Tools</h3>
                <ul class="skill-list">
                    <li>MySQL, MongoDB</li>
                    <li>Git & Version Control</li>
                    <li>Hosting Panels (cPanel/Plesk)</li>
                    <li>Canva Design</li>
                    <li>Postman API Testing</li>
                </ul>
            </div>
        </div>

        <!-- Digital Marketing & Soft Skills Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Marketing -->
            <div class="skill-category-card marketing-badge group" data-aos="fade-right">
                <div class="flex items-start justify-between mb-6">
                    <div class="skill-icon-wrapper mb-0 bg-yellow-500 text-black border-none">
                        <i data-lucide="trending-up" class="w-8 h-8"></i>
                    </div>
                    <span class="px-3 py-1 bg-black/50 rounded-full text-yellow-400 text-xs font-bold uppercase tracking-wider border border-yellow-500/30">Specialist</span>
                </div>
                <h3 class="text-3xl font-cinzel text-white mb-6">Digital Marketing</h3>
                <ul class="skill-list text-lg space-y-3">
                    <li><strong>Meta Ads Manager:</strong> Expert management of Facebook & Instagram campaigns.</li>
                    <li><strong>Instagram Growth:</strong> Ad boosts for high engagement and conversions.</li>
                    <li><strong>Optimization:</strong> Audience targeting, A/B testing, and performance tracking.</li>
                    <li><strong>Strategy:</strong> Content planning and funnel optimization.</li>
                </ul>
            </div>

            <!-- Soft Skills -->
            <div class="skill-category-card group" data-aos="fade-left">
                <div class="skill-icon-wrapper">
                    <i data-lucide="users" class="w-8 h-8"></i>
                </div>
                <h3 class="text-2xl font-cinzel text-white mb-6 border-b border-gray-700 pb-3 group-hover:border-yellow-500 transition-colors">Soft Skills</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <ul class="skill-list">
                        <li>Excellent Communication (Verbal/Written)</li>
                        <li>Strong Teamwork & Collaboration</li>
                        <li>Problem-Solving & Debugging</li>
                    </ul>
                    <ul class="skill-list">
                        <li>Attention to Detail</li>
                        <li>Continuous Learning Mindset</li>
                        <li>Industry Trend Awareness</li>
                    </ul>
                </div>
            </div>

        </div>

    </main>


    <!-- Scripts -->
    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
        gsap.registerPlugin(ScrollTrigger);

        // --- ANIMATION LOGIC (Shared) ---
        const cursorBird = document.getElementById('resume-cursor-bird');
        const cursorGlow = document.getElementById('resume-cursor-glow');
        let mouseX = 0, mouseY = 0, birdX = 0, birdY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX; mouseY = e.clientY;
            gsap.to(cursorGlow, { x: mouseX, y: mouseY, duration: 0.1, overwrite: true });
        });

        gsap.ticker.add(() => {
            const dt = 1.0 - Math.pow(1.0 - 0.05, gsap.ticker.deltaRatio());
            const dx = mouseX - birdX; const dy = mouseY - birdY;
            if (Math.abs(dx) > 0.5 || Math.abs(dy) > 0.5) {
                birdX += dx * dt; birdY += dy * dt;
                let scaleDirection = mouseX < window.innerWidth / 2 ? -1 : 1;
                gsap.set(cursorBird, { x: birdX - 175, y: birdY - 175, scaleX: scaleDirection, rotation: dy * 0.05 });
            }
        });

        gsap.to('.resume-tree', { yPercent: 20, ease: "none", scrollTrigger: { trigger: "body", start: "top top", end: "bottom bottom", scrub: 1 } });

        const canvas = document.getElementById('resume-spore-canvas');
        const ctx = canvas.getContext('2d');
        let width, height, spores = [];
        
        const resize = () => { width = canvas.width = window.innerWidth; height = canvas.height = window.innerHeight; };
        window.addEventListener('resize', resize); resize();
        
        class Spore {
            constructor() { this.reset(); }
            reset() { this.x = Math.random()*width; this.y = Math.random()*height; this.size = Math.random()*2+1; this.speedX = (Math.random()-.5); this.speedY = (Math.random()-.5); this.opacity = 0; this.life=0; this.maxLife=Math.random()*200+100; }
            update() { this.x+=this.speedX; this.y+=this.speedY; this.life++; if(this.life<50)this.opacity+=0.02; else if(this.life>this.maxLife-50)this.opacity-=0.02; if(this.life>this.maxLife)this.reset(); }
            draw() { ctx.fillStyle = `rgba(251, 191, 36, ${this.opacity})`; ctx.beginPath(); ctx.arc(this.x, this.y, this.size, 0, Math.PI*2); ctx.fill(); }
        }
        
        for(let i=0;i<100;i++) spores.push(new Spore());
        function animate() { ctx.clearRect(0,0,width,height); spores.forEach(s=>{s.update();s.draw();}); requestAnimationFrame(animate); }
        animate();
    </script>
</body>
</html>