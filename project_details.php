<?php
// project_details.php
include 'config/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) { header("Location: projects.php"); exit; }
$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) { echo "<h1 style='color:white;text-align:center;margin-top:50px;'>Project Not Found</h1>"; exit; }
$project = $result->fetch_assoc();
$images = json_decode($project['project_images'], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($project['title']); ?> | Details</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root { --deep-jungle: #050a07; --moss-green: #1a422a; --leaf-light: #4ade80; --gold-accent: #fbbf24; }
        body { background-color: var(--deep-jungle); color: #f1f5f9; font-family: 'Montserrat', sans-serif; overflow-x: hidden; cursor: none; }
        h1, h2, h3, .font-cinzel { font-family: 'Cinzel', serif; }
        
        #cursor-glow { position: fixed; inset: 0; background: radial-gradient(circle, rgba(74, 222, 128, 0.1) 0%, transparent 70%); pointer-events: none; z-index: 9998; mix-blend-mode: screen; }
        #cursor-bird { position: fixed; top: 0; left: 0; width: 350px; pointer-events: none; z-index: 9999; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.5)); transform-origin: center center; }
        #spore-canvas { position: fixed; inset: 0; z-index: 1; pointer-events: none; }
        .parallax-bg-layer { position: fixed; inset: 0; pointer-events: none; z-index: 0; }
        .jungle-tree { position: absolute; top: 0; height: 100vh; width: 450px; background: url('Assets/left3.png') no-repeat contain; opacity: 1; filter: brightness(0.6); }
        .tree-left { left: -50px; } .tree-right { right: -50px; transform: scaleX(-1); }

        /* ID: resume-projects Scope */
        #resume-projects { position: relative; z-index: 10; }
        
        .glass-panel {
            background: rgba(5, 10, 7, 0.7); backdrop-filter: blur(15px);
            border: 1px solid rgba(74, 222, 128, 0.15); box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: all 0.3s;
        }
        .feature-item { border-left: 1px solid #333; padding-left: 1.5rem; transition: all 0.3s; }
        .feature-item:hover { border-left-color: var(--gold-accent); padding-left: 2rem; color: var(--gold-accent); }
        .gallery-img { transition: transform 0.5s ease; width: 100%; height: 100%; object-fit: cover; }
        .gallery-wrapper { overflow: hidden; border: 1px solid rgba(255,255,255,0.1); }
        .gallery-wrapper:hover { border-color: var(--leaf-light); }
        .gallery-wrapper:hover .gallery-img { transform: scale(1.05); }

        @media(max-width:768px){ .jungle-tree{width:120px;opacity:0.4;} #cursor-bird,#cursor-glow{display:none;} body{cursor:auto;} }
    </style>
</head>
<body>

    <div class="relative z-50"><?php include 'navbar.php'; ?></div>

    <!-- Anim Layers -->
    <div id="cursor-glow"></div>
    <img id="cursor-bird" src="Assets/flyingbird.gif" alt="Flying Bird">
    <canvas id="spore-canvas"></canvas>
    <div class="parallax-bg-layer"><div class="jungle-tree tree-left"></div><div class="jungle-tree tree-right"></div></div>

    <main id="resume-projects" class="container mx-auto px-4 pt-32 pb-20">
        
        <div class="mb-8 text-gray-400 text-sm font-medium" data-aos="fade-right">
            <a href="index.php" class="hover:text-green-400 transition">Home</a> 
            <i data-lucide="chevron-right" class="inline w-3 h-3 mx-2"></i> 
            <a href="projects.php" class="hover:text-green-400 transition">Expeditions</a> 
            <i data-lucide="chevron-right" class="inline w-3 h-3 mx-2"></i>
            <span class="text-yellow-400"><?php echo htmlspecialchars($project['title']); ?></span>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 border-b border-green-900/50 pb-8" data-aos="fade-up">
            <div>
                <span class="text-green-500 tracking-[0.2em] uppercase text-xs font-bold"><?php echo htmlspecialchars($project['subtitle']); ?></span>
                <h1 class="font-cinzel text-4xl md:text-6xl text-white mt-2 drop-shadow-lg"><?php echo htmlspecialchars($project['title']); ?></h1>
            </div>
            <div class="mt-6 md:mt-0">
                <a href="<?php echo htmlspecialchars($project['domain_link']); ?>" target="_blank" 
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black px-8 py-3 rounded-full font-bold hover:scale-105 transition-all shadow-[0_0_20px_rgba(234,179,8,0.4)]">
                    <i data-lucide="globe" class="w-4 h-4"></i> Visit Live Site
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-10">
                <?php if(!empty($images)): ?>
                <div class="rounded-2xl overflow-hidden border border-green-900/50 shadow-2xl relative group" data-aos="zoom-in">
                    <img src="<?php echo htmlspecialchars($images[0]); ?>" class="w-full h-auto">
                </div>
                <?php endif; ?>

                <div class="glass-panel p-8 rounded-2xl" data-aos="fade-up">
                    <h3 class="text-2xl font-bold mb-4 border-l-4 border-green-500 pl-4 font-cinzel text-white">Project Overview</h3>
                    <p class="text-gray-300 leading-relaxed whitespace-pre-line text-lg">
                        <?php echo htmlspecialchars($project['description']); ?>
                    </p>
                </div>

                <div class="glass-panel p-8 rounded-2xl" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-6 border-l-4 border-yellow-500 pl-4 font-cinzel text-white">Core Features</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php $feats = explode("\n", $project['features']); foreach($feats as $f): if(trim($f)!==''): ?>
                        <div class="feature-item text-gray-300"><?php echo htmlspecialchars(trim($f)); ?></div>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="glass-panel p-6 rounded-2xl sticky top-32" data-aos="fade-left">
                    <?php if($project['client_logo']): ?>
                    <div class="flex justify-center mb-8">
                        <div class="bg-black/40 border border-green-500/20 p-4 rounded-xl w-32 h-32 flex items-center justify-center shadow-inner">
                            <img src="<?php echo htmlspecialchars($project['client_logo']); ?>" class="max-w-full max-h-full">
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="space-y-6">
                        <div>
                            <span class="block text-xs text-green-500 uppercase tracking-wider mb-1">Client</span>
                            <span class="text-xl font-semibold text-white font-cinzel"><?php echo htmlspecialchars($project['client_name']); ?></span>
                        </div>
                        <div>
                            <span class="block text-xs text-green-500 uppercase tracking-wider mb-1">Completion</span>
                            <span class="text-lg text-white"><?php echo date('F d, Y', strtotime($project['completion_date'])); ?></span>
                        </div>
                        <div>
                            <span class="block text-xs text-green-500 uppercase tracking-wider mb-2">Tech Ecosystem</span>
                            <div class="flex flex-wrap gap-2">
                                <?php $stack = explode(',', $project['tech_stack']); foreach($stack as $t): ?>
                                <span class="bg-black/50 border border-green-700 text-green-400 px-3 py-1 rounded text-xs uppercase tracking-wide">
                                    <?php echo htmlspecialchars(trim($t)); ?>
                                </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="pt-6 border-t border-gray-700">
                            <a href="projects.php" class="block text-center w-full border border-gray-600 text-gray-300 py-3 rounded-lg hover:bg-green-900/30 hover:text-white hover:border-green-500 transition-all flex items-center justify-center gap-2">
                                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Expeditions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(count($images) > 1): ?>
        <div class="mt-20">
            <h3 class="text-3xl font-cinzel text-white mb-8 border-b border-green-900/50 pb-4">Gallery</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php for($i = 1; $i < count($images); $i++): ?>
                <div class="gallery-wrapper rounded-xl h-64 md:h-80" data-aos="fade-up">
                    <img src="<?php echo htmlspecialchars($images[$i]); ?>" class="gallery-img">
                </div>
                <?php endfor; ?>
            </div>
        </div>
        <?php endif; ?>

    </main>
    <div class="relative z-50"><?php include 'footer.php'; ?></div>

    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
        gsap.registerPlugin(ScrollTrigger);

        const cursorBird = document.getElementById('cursor-bird');
        const cursorGlow = document.getElementById('cursor-glow');
        let mouseX = 0, mouseY = 0, birdX = 0, birdY = 0;
        document.addEventListener('mousemove', (e) => { mouseX=e.clientX; mouseY=e.clientY; gsap.to(cursorGlow, {x:mouseX, y:mouseY, duration:0.1}); });
        gsap.ticker.add(() => {
            const dt = 1.0 - Math.pow(1.0-0.05, gsap.ticker.deltaRatio());
            const dx = mouseX - birdX; const dy = mouseY - birdY;
            if(Math.abs(dx)>0.5 || Math.abs(dy)>0.5) {
                birdX+=dx*dt; birdY+=dy*dt;
                gsap.set(cursorBird, { x:birdX-175, y:birdY-175, scaleX: mouseX<window.innerWidth/2?-1:1, rotation: dy*0.05 });
            }
        });
        gsap.to('.jungle-tree', { yPercent: 20, ease: "none", scrollTrigger: { trigger: "body", start: "top top", end: "bottom bottom", scrub: 1 } });
        
        const canvas=document.getElementById('spore-canvas'), ctx=canvas.getContext('2d');
        let w,h,spores=[];
        const resize=()=>{w=canvas.width=window.innerWidth; h=canvas.height=window.innerHeight;}; window.addEventListener('resize',resize); resize();
        class Spore{constructor(){this.reset()} reset(){this.x=Math.random()*w;this.y=Math.random()*h;this.size=Math.random()*2+1;this.sx=(Math.random()-.5);this.sy=(Math.random()-.5);this.op=0;this.life=0;this.ml=Math.random()*200+100;} update(){this.x+=this.sx;this.y+=this.sy;this.life++;if(this.life<50)this.op+=0.02;else if(this.life>this.ml-50)this.op-=0.02;if(this.life>this.ml)this.reset();} draw(){ctx.fillStyle=`rgba(251,191,36,${this.op})`;ctx.beginPath();ctx.arc(this.x,this.y,this.size,0,Math.PI*2);ctx.fill();}}
        for(let i=0;i<100;i++)spores.push(new Spore());
        function anim(){ctx.clearRect(0,0,w,h);spores.forEach(s=>{s.update();s.draw()});requestAnimationFrame(anim);} anim();
    </script>
</body>
</html>