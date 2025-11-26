<?php
// contact.php
include 'config/db.php'; // Connect to database

// --- CONTACT INFORMATION ---
$contact_info = [
    'address' => 'Hirapur,  Dhanbad, Jharkhand, 826001',
    'phone' => '+91 6201403690',
    'email' => 'rathoredipanshu21@gmail.com',
    'map_link' => 'https://maps.app.goo.gl/YourActualMapLinkHere', 
];

$form_message = '';

// --- HANDLE FORM SUBMISSION ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Ensure table exists (Safety check logic should be handled by manual SQL setup provided below)
    $sql = "INSERT INTO contact_enquiries (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql)) {
        // Success Message (Forest Theme)
        $form_message = '<div class="p-4 mb-8 text-sm text-green-200 bg-green-900/40 border border-green-500/50 rounded-xl flex items-center shadow-[0_0_15px_rgba(74,222,128,0.2)]" role="alert">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-2 text-green-400"></i>
                            <span><strong>Message Sent!</strong> We will get back to you shortly.</span>
                        </div>';
    } else {
        // Error Message
        $form_message = '<div class="p-4 mb-8 text-sm text-red-200 bg-red-900/40 border border-red-500/50 rounded-xl flex items-center" role="alert">
                            <i data-lucide="alert-circle" class="w-5 h-5 mr-2 text-red-400"></i>
                            <span>Error: ' . $conn->error . '</span>
                        </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get in Touch | Dipanshu Singh</title>
    
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

        /* --- ANIMATION LAYERS --- */
        #resume-cursor-glow {
            position: fixed; top: 0; left: 0; width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(74, 222, 128, 0.1) 0%, transparent 70%);
            transform: translate(-50%, -50%); pointer-events: none; z-index: 9998; mix-blend-mode: screen;
        }
        #resume-cursor-bird {
            position: fixed; top: 0; left: 0; width: 350px; height: auto;
            pointer-events: none; z-index: 9999;
            will-change: transform; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.5)); transform-origin: center center;
        }
        #resume-spore-canvas { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none; }
        
        .resume-bg-layer { position: fixed; top: 0; left: 0; width: 100%; height: 100vh; pointer-events: none; z-index: 0; }
        .resume-tree {
            position: absolute; top: 0; height: 100vh; width: 450px;
            background-image: url('Assets/left3.png'); background-size: contain; background-repeat: no-repeat;
            opacity: 1; filter: brightness(0.6);
        }
        .tree-left { left: -50px; background-position: left center; }
        .tree-right { right: -50px; transform: scaleX(-1); background-position: left center; }

        /* --- CONTACT PAGE STYLES --- */
        #resume-contact { position: relative; z-index: 10; }

        .glass-panel {
            background: rgba(10, 20, 15, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(74, 222, 128, 0.1);
            border-radius: 1.5rem;
            transition: all 0.4s ease;
        }

        .glass-panel:hover {
            border-color: var(--resume-gold);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        }

        /* Form Inputs */
        .forest-input {
            background: rgba(5, 10, 7, 0.6);
            border: 1px solid rgba(74, 222, 128, 0.2);
            color: #fff;
            transition: all 0.3s ease;
        }
        .forest-input:focus {
            background: rgba(5, 10, 7, 0.9);
            border-color: var(--resume-gold);
            outline: none;
            box-shadow: 0 0 15px rgba(251, 191, 36, 0.15);
        }
        .forest-input::placeholder { color: rgba(255, 255, 255, 0.3); }

        /* Button */
        .forest-btn {
            background: linear-gradient(to right, var(--resume-moss), #064e3b);
            border: 1px solid var(--resume-leaf);
            color: #fff;
            transition: all 0.3s ease;
        }
        .forest-btn:hover {
            background: var(--resume-leaf);
            color: #000;
            box-shadow: 0 0 20px rgba(74, 222, 128, 0.4);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .resume-tree { width: 120px; opacity: 0.4; }
            #resume-cursor-bird, #resume-cursor-glow { display: none; }
            body { cursor: auto; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="relative z-50"><?php include 'navbar.php'; ?></div>
    <?php include 'whatsapp.php'; ?>

    <!-- ANIMATION LAYERS -->
    <div id="resume-cursor-glow"></div>
    <img id="resume-cursor-bird" src="Assets/flyingbird.gif" alt="Flying Bird">
    <canvas id="resume-spore-canvas"></canvas>
    
    <div class="resume-bg-layer">
        <div class="resume-tree tree-left"></div>
        <div class="resume-tree tree-right"></div>
    </div>

    <!-- MAIN CONTENT -->
    <main id="resume-contact" class="container mx-auto px-4 pt-32 pb-20">
        
        <!-- Header -->
        <div class="text-center mb-16" data-aos="zoom-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 border border-yellow-500/30 rounded-full bg-black/60 text-yellow-400 text-xs tracking-[0.2em] uppercase">
                <i data-lucide="mail" class="w-3 h-3"></i> Contact
            </div>
            <h1 class="font-cinzel text-5xl md:text-7xl text-white mb-6 drop-shadow-2xl">
                Start a <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400">Conversation</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                Ready to build your digital future? Connect with our team of experts in Dhanbad or send us a message directly.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">

            <!-- Contact Info Card -->
            <div class="glass-panel p-8 md:p-12 flex flex-col justify-center" data-aos="fade-right">
                <h2 class="text-3xl font-cinzel text-white mb-8 border-b border-green-900/50 pb-4">
                    Reach Out
                </h2>
                
                <div class="space-y-8">
                    <!-- Location -->
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-xl bg-green-900/30 border border-green-500/30 flex items-center justify-center text-green-400 mr-5 group-hover:bg-yellow-500 group-hover:text-black transition-all duration-300">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-white mb-1 group-hover:text-yellow-400 transition-colors">Office Location</h4>
                            <p class="text-gray-400 text-sm leading-relaxed"><?php echo htmlspecialchars($contact_info['address']); ?></p>
                            <a href="<?php echo htmlspecialchars($contact_info['map_link']); ?>" target="_blank" class="text-green-400 hover:text-yellow-400 transition text-xs font-bold uppercase tracking-wider mt-2 inline-flex items-center">
                                View on Map <i data-lucide="external-link" class="w-3 h-3 ml-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-xl bg-green-900/30 border border-green-500/30 flex items-center justify-center text-green-400 mr-5 group-hover:bg-yellow-500 group-hover:text-black transition-all duration-300">
                            <i data-lucide="phone" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-white mb-1 group-hover:text-yellow-400 transition-colors">Call Us</h4>
                            <p class="text-gray-400 text-sm"><?php echo htmlspecialchars($contact_info['phone']); ?></p>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-xl bg-green-900/30 border border-green-500/30 flex items-center justify-center text-green-400 mr-5 group-hover:bg-yellow-500 group-hover:text-black transition-all duration-300">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-white mb-1 group-hover:text-yellow-400 transition-colors">Email Support</h4>
                            <p class="text-gray-400 text-sm"><?php echo htmlspecialchars($contact_info['email']); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="glass-panel p-8 md:p-12" data-aos="fade-left">
                <h2 class="text-3xl font-cinzel text-white mb-8 border-b border-green-900/50 pb-4">
                    Send a Message
                </h2>
                
                <?php echo $form_message; ?>

                <form action="contact.php" method="POST" class="space-y-6">
                    
                    <div>
                        <label for="name" class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required 
                            class="forest-input w-full p-4 rounded-xl text-sm">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required 
                            class="forest-input w-full p-4 rounded-xl text-sm">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Project Inquiry" required 
                            class="forest-input w-full p-4 rounded-xl text-sm">
                    </div>

                    <div>
                        <label for="message" class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Tell us about your project..." required 
                            class="forest-input w-full p-4 rounded-xl text-sm"></textarea>
                    </div>
                    
                    <button type="submit" 
                        class="forest-btn w-full px-6 py-4 font-bold rounded-xl flex items-center justify-center gap-2 uppercase tracking-widest text-sm">
                        Send Message <i data-lucide="send" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>

        </div>

    </main>

    <div class="relative z-50"><?php include 'footer.php'; ?></div>

    <!-- Scripts -->
    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
        gsap.registerPlugin(ScrollTrigger);

        // --- ANIMATION LOGIC ---
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