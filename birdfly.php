<style>
    /* --- GLOBAL THEME & FOREST PALETTE --- */
    :root {
        --deep-jungle: #050a07; /* Very Dark Green/Black */
        --moss-green: #1a422a;
        --leaf-light: #4ade80;
        --gold-accent: #fbbf24;
        --text-primary: #f1f5f9;
        --text-secondary: #94a3b8;
    }

    body {
        background-color: var(--deep-jungle);
        color: var(--text-primary);
        font-family: 'Montserrat', sans-serif;
        overflow-x: hidden;
        cursor: none; /* Hides default cursor to show the bird */
    }

    /* --- CUSTOM CURSOR ELEMENTS --- */
    #cursor-glow {
        position: fixed;
        top: 0; left: 0;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(74, 222, 128, 0.1) 0%, rgba(0, 0, 0, 0) 60%);
        transform: translate(-50%, -50%);
        pointer-events: none;
        z-index: 9998;
        mix-blend-mode: screen;
        transition: width 0.3s, height 0.3s;
    }

    #cursor-bird {
        position: fixed;
        top: 0; left: 0;
        width: 350px; /* Large Bird */
        height: auto;
        pointer-events: none;
        z-index: 9999;
        will-change: transform;
        filter: drop-shadow(0 20px 30px rgba(0,0,0,0.5));
        transform-origin: center center;
    }

    /* --- PARALLAX BACKGROUND LAYERS --- */
    .parallax-bg-layer {
        position: fixed;
        top: 0; left: 0; 
        width: 100%; height: 100vh;
        pointer-events: none;
        z-index: 0; /* Strictly BEHIND content */
        overflow: hidden;
    }

    .jungle-tree {
        position: absolute;
        top: 0;
        height: 100vh;
        width: 500px;
        background-image: url('Assets/left3.png');
        background-size: contain;
        background-repeat: no-repeat;
        opacity: 1; 
        filter: brightness(0.6); 
    }

    .tree-left {
        left: -50px;
        background-position: left center;
    }

    .tree-right {
        right: -50px;
        transform: scaleX(-1); /* Mirror */
        background-position: left center;
    }

    #spore-canvas {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        z-index: 1; /* Behind trees and content */
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .jungle-tree { width: 150px; opacity: 0.4; }
        #cursor-bird, #cursor-glow { display: none; }
        body { cursor: auto; }
    }
</style>

<div id="cursor-glow"></div>
<img id="cursor-bird" src="Assets/flyingbird.gif" alt="Flying Bird">
<canvas id="spore-canvas"></canvas>

<div class="parallax-bg-layer">
    <div class="jungle-tree tree-left"></div>
    <div class="jungle-tree tree-right"></div>
</div>

<script>
    // Ensure GSAP is loaded before running this, or wait for window load
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof gsap !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Cursor & Bird Logic
            const cursorBird = document.getElementById('cursor-bird');
            const cursorGlow = document.getElementById('cursor-glow');
            let mouseX = 0, mouseY = 0;
            let birdX = 0, birdY = 0;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                gsap.to(cursorGlow, { x: mouseX, y: mouseY, duration: 0.1, overwrite: true });
            });

            gsap.ticker.add(() => {
                const dt = 1.0 - Math.pow(1.0 - 0.05, gsap.ticker.deltaRatio()); 
                const dx = mouseX - birdX;
                const dy = mouseY - birdY;
                
                if (Math.abs(dx) > 0.5 || Math.abs(dy) > 0.5) {
                    birdX += dx * dt;
                    birdY += dy * dt;
                    
                    let scaleDirection = 1; 
                    const screenMiddle = window.innerWidth / 2;
                    if (mouseX < screenMiddle) scaleDirection = -1; 
                    else scaleDirection = 1;

                    gsap.set(cursorBird, {
                        x: birdX - 175, 
                        y: birdY - 175,
                        scaleX: scaleDirection, 
                        rotation: dy * 0.05
                    });
                }
            });

            // 2. Parallax Background Trees
            gsap.to('.jungle-tree', {
                yPercent: 20, 
                ease: "none",
                scrollTrigger: {
                    trigger: "body",
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 1
                }
            });
        }
    });

    // 3. Background Spores (Canvas)
    (function() {
        const canvas = document.getElementById('spore-canvas');
        if(!canvas) return;
        const ctx = canvas.getContext('2d');
        let width, height;
        let spores = [];

        function resize() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        class Spore {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.size = Math.random() * 2 + 1; 
                this.speedY = Math.random() * 0.8 - 0.4;
                this.speedX = Math.random() * 0.8 - 0.4;
                this.life = 0;
                this.maxLife = Math.random() * 300 + 100;
                this.opacity = 0;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                this.life++;
                if (this.life < 50) this.opacity += 0.01;
                else if (this.life > this.maxLife - 50) this.opacity -= 0.01;
                if (this.life > this.maxLife || this.opacity < 0) this.reset();
            }
            draw() {
                ctx.fillStyle = `rgba(251, 191, 36, ${this.opacity * 0.8})`; 
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }
        
        for(let i=0; i<120; i++) spores.push(new Spore());
        function animateSpores() {
            ctx.clearRect(0, 0, width, height);
            spores.forEach(s => { s.update(); s.draw(); });
            requestAnimationFrame(animateSpores);
        }
        animateSpores();
    })();
</script>