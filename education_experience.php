<?php
// education_experience.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journey & Qualifications | Dipanshu Singh</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* Specific Typography */
        h1, h2, h3, .font-cinzel { font-family: 'Cinzel', serif; }

        /* --- TIMELINE STYLES --- */
        /* NOTE: Colors correspond to variables defined in birdfly.php */
        #resume-timeline { position: relative; z-index: 10; }

        .timeline-card {
            background: rgba(10, 20, 15, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(74, 222, 128, 0.1);
            padding: 2rem;
            border-radius: 1rem;
            transition: all 0.4s ease;
            position: relative;
        }

        .timeline-card:hover {
            border-color: var(--gold-accent);
            transform: translateX(10px);
            background: rgba(10, 20, 15, 0.8);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .timeline-line {
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--moss-green), var(--leaf-light), var(--moss-green));
        }

        .timeline-dot {
            position: absolute;
            left: -9px; /* Center on line */
            top: 2rem;
            width: 20px; height: 20px;
            background: var(--deep-jungle);
            border: 2px solid var(--gold-accent);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--gold-accent);
            z-index: 10;
        }

        /* Section Divider */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 4rem 0 2rem 0;
        }
        .section-line { flex-grow: 1; height: 1px; background: rgba(74, 222, 128, 0.3); }

        @media (max-width: 768px) {
            .timeline-line { left: -1rem; }
            .timeline-dot { left: calc(-1rem - 9px); }
        }
    </style>
</head>
<body>


    <div class="relative z-50"><?php include 'navbar.php'; ?></div>

    <main id="resume-timeline" class="container mx-auto px-4 pt-32 pb-20 max-w-5xl">
        
        <div class="text-center mb-16" data-aos="zoom-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 border border-yellow-500/30 rounded-full bg-black/60 text-yellow-400 text-xs tracking-[0.2em] uppercase">
                <i data-lucide="history" class="w-3 h-3"></i> My Path
            </div>
            <h1 class="font-cinzel text-5xl md:text-7xl text-white mb-6 drop-shadow-2xl">
                Journey & <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400">Milestones</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                Tracing the path of my academic foundation and professional evolution in the tech landscape.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            <div class="relative pl-4 lg:pl-0">
                <div class="section-divider" data-aos="fade-right">
                    <h2 class="text-2xl font-cinzel text-white flex items-center gap-3">
                        <i data-lucide="briefcase" class="text-yellow-400"></i> Experience
                    </h2>
                    <div class="section-line"></div>
                </div>

                <div class="relative border-l-2 border-green-900/50 ml-2 space-y-12 pb-4">
                    
                    <div class="relative pl-8" data-aos="fade-up" data-aos-delay="0">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card group">
                            <span class="text-xs font-bold text-green-400 uppercase tracking-widest mb-2 block">Dec 2024 – Present</span>
                            <h3 class="text-xl font-bold text-white font-cinzel group-hover:text-yellow-400 transition-colors">Full Stack Developer</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-400 mt-1 mb-3">
                                <i data-lucide="building-2" class="w-4 h-4"></i> SystAIO Technologies
                                <span class="mx-1">•</span>
                                <i data-lucide="map-pin" class="w-4 h-4"></i> Dhanbad
                            </div>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Spearheading full-cycle development of scalable web applications. Implementing modern architectures and driving digital transformation projects.
                            </p>
                        </div>
                    </div>

                    <div class="relative pl-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card group">
                            <span class="text-xs font-bold text-green-400 uppercase tracking-widest mb-2 block">Jan 2023 – Jul 2023</span>
                            <h3 class="text-xl font-bold text-white font-cinzel group-hover:text-yellow-400 transition-colors">Full Stack Developer</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-400 mt-1 mb-3">
                                <i data-lucide="building-2" class="w-4 h-4"></i> ByteWave IT Company
                                <span class="mx-1">•</span>
                                <i data-lucide="map-pin" class="w-4 h-4"></i> Dhanbad
                            </div>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Collaborated on diverse client projects, optimizing backend performance and creating responsive frontend interfaces for seamless user experiences.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="relative pl-4 lg:pl-0">
                <div class="section-divider" data-aos="fade-left">
                    <h2 class="text-2xl font-cinzel text-white flex items-center gap-3">
                        <i data-lucide="graduation-cap" class="text-green-400"></i> Education
                    </h2>
                    <div class="section-line"></div>
                </div>

                <div class="relative border-l-2 border-green-900/50 ml-2 space-y-12 pb-4">
                    
                    <div class="relative pl-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="timeline-dot" style="border-color: var(--leaf-light);"></div>
                        <div class="timeline-card group">
                            <span class="text-xs font-bold text-green-400 uppercase tracking-widest mb-2 block">2023 – 2025</span>
                            <h3 class="text-xl font-bold text-white font-cinzel group-hover:text-green-400 transition-colors">Master of Computer Science</h3>
                            <p class="text-yellow-500 text-sm font-semibold mb-1">(M.Sc. CS)</p>
                            <div class="flex items-center gap-2 text-sm text-gray-400 mt-1">
                                <i data-lucide="school" class="w-4 h-4"></i> BBMK University
                                <span class="mx-1">•</span>
                                <i data-lucide="map-pin" class="w-4 h-4"></i> Dhanbad
                            </div>
                        </div>
                    </div>

                    <div class="relative pl-8" data-aos="fade-up" data-aos-delay="300">
                        <div class="timeline-dot" style="border-color: var(--leaf-light);"></div>
                        <div class="timeline-card group">
                            <span class="text-xs font-bold text-green-400 uppercase tracking-widest mb-2 block">2020 – 2023</span>
                            <h3 class="text-xl font-bold text-white font-cinzel group-hover:text-green-400 transition-colors">Bachelor in Computer Science</h3>
                            <p class="text-yellow-500 text-sm font-semibold mb-1">(B.Sc. CS)</p>
                            <div class="flex items-center gap-2 text-sm text-gray-400 mt-1">
                                <i data-lucide="school" class="w-4 h-4"></i> BBMK University
                                <span class="mx-1">•</span>
                                <i data-lucide="map-pin" class="w-4 h-4"></i> Dhanbad
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </main>
    
    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
    </script>
</body>
</html>