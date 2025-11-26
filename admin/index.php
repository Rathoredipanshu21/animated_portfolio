<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYSTAIO | Admin Portal</title>
        <link rel="icon" href="../Assets/icon.png" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <style>
        :root {
            --bg-dark: #000000;       
            --sidebar-bg: #0a0a0a;    
            --accent-blue: #3b82f6;   
            --text-main: #ffffff;
            --text-muted: #9ca3af;
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            overflow: hidden; 
            cursor: none; 
        }
        
        /* --- Cursor Glow Effect --- */
        #cursor-glow {
            position: fixed;
            width: 600px; 
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle at center, rgba(59, 130, 246, 0.15), transparent 70%); 
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.1); 
            z-index: 9999; 
            pointer-events: none;
            will-change: transform; 
        }

        /* --- Sidebar Styling --- */
        .sidebar {
            background: var(--sidebar-bg);
            border-right: 1px solid var(--glass-border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 50;
            position: relative; 
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin: 6px 12px;
            border-radius: 12px;
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .sidebar-link:hover {
            background: rgba(59, 130, 246, 0.1);
            color: white;
            transform: translateX(5px);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.1);
        }

        .sidebar-link i {
            width: 24px;
            text-align: center;
            margin-right: 12px;
            transition: transform 0.3s ease;
        }
        
        .sidebar-link:hover i {
            transform: scale(1.2);
            color: var(--accent-blue);
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2) 0%, transparent 100%);
            color: var(--accent-blue);
            border-left: 3px solid var(--accent-blue);
            font-weight: 600;
        }

        .sidebar-nav {
            overflow-y: auto;
            flex: 1;
        }
        .sidebar-nav::-webkit-scrollbar { width: 4px; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: #333; border-radius: 2px; }

        #main-content-wrapper {
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--bg-dark);
            position: relative;
            z-index: 10; 
        }
        
        .top-header {
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
        }

        #content-frame-container {
            flex: 1;
            overflow: hidden;
            border-radius: 16px 0 0 0;
            background: #0f0f0f; 
            border-top: 1px solid var(--glass-border);
            border-left: 1px solid var(--glass-border);
            margin-top: 10px;
            box-shadow: -5px -5px 20px rgba(0,0,0,0.5);
            position: relative; 
        }

        .sidebar.collapsed { width: 80px; min-width: 80px; }
        .sidebar.collapsed .logo-text, 
        .sidebar.collapsed .link-text,
        .sidebar.collapsed .section-title { display: none; }
        .sidebar.collapsed .sidebar-link { justify-content: center; padding: 12px 0; margin: 6px 10px; }
        .sidebar.collapsed .sidebar-link i { margin-right: 0; }
        
        @media (max-width: 768px) {
            .sidebar { position: fixed; left: -100%; height: 100%; width: 260px; }
            .sidebar.active { left: 0; }
            #cursor-glow { display: none; } 
            body { cursor: auto; }
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <div id="cursor-glow"></div>

    <aside id="sidebar" class="sidebar w-72 min-w-[18rem] flex-shrink-0">
        
       <div class="h-20 flex items-center justify-center border-b border-white/5 px-6">
    <a href="#" class="flex items-center gap-3 group">
        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-[0_0_15px_rgba(59,130,246,0.5)] group-hover:scale-110 transition-transform overflow-hidden">
            <img src="../Assets/icon.png" alt="Systaio Logo" class="w-full h-full object-cover">
        </div>
        <span class="logo-text font-['Space_Grotesk'] font-bold text-xl tracking-wide text-white group-hover:text-blue-400 transition-colors">
            SYSTAIO
        </span>
    </a>
</div>

        <nav class="sidebar-nav py-6">
            <div class="px-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-widest section-title">Analytics</div>
            <a href="dashboard.php" class="sidebar-link active" target="content-frame">
                <i class="fas fa-gauge-high"></i><span class="link-text">Dashboard</span>
            </a>

            <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-widest section-title">Content Manager</div>
            
            <a href="hero_banner.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-panorama"></i><span class="link-text">Website Banners</span>
            </a>
            
            <a href="add_services.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-cubes"></i><span class="link-text">Service Offerings</span>
            </a>
            
            <a href="add_projects.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-diagram-project"></i><span class="link-text">Project Portfolio</span>
            </a>
            
            <a href="add_team.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-people-group"></i><span class="link-text">Team Directory</span>
            </a>

            <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-widest section-title">Relations & HR</div>
            
            <a href="reviews.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-star"></i><span class="link-text">Client Testimonials</span>
            </a>
            
            <a href="add_career.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-bullhorn"></i><span class="link-text">Job Postings</span>
            </a>
            
            <a href="contact_enquiries.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-envelope-open-text"></i><span class="link-text">Inquiries & Leads</span>
            </a>
            
            <a href="job_applications.php" class="sidebar-link" target="content-frame">
                <i class="fas fa-file-signature"></i><span class="link-text">Candidate Applications</span>
            </a>
<!-- Client Requirements Link -->
<a href="view_requirements.php" class="sidebar-link" target="content-frame">
    <i class="fas fa-clipboard-list"></i>
    <span class="link-text">Client Briefs</span>
</a>

<!-- Finance/Orders Link -->
<a href="finance_dashboard.php" class="sidebar-link" target="content-frame">
    <i class="fas fa-file-invoice-dollar"></i>
    <span class="link-text">Finance & Billing</span>
</a>
        </nav>

        <div class="p-4 border-t border-white/5">
            <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all group">
                <i class="fas fa-power-off group-hover:rotate-90 transition-transform duration-300"></i>
                <span class="link-text font-medium">Sign Out</span>
            </a>
        </div>
    </aside>

    <div id="main-content-wrapper" class="flex-1 relative z-10">
        <header class="top-header h-20 px-6 flex items-center justify-between z-20">
            <div class="flex items-center gap-4">
                <button id="menu-toggle" class="w-10 h-10 rounded-lg border border-white/10 text-gray-400 hover:text-white hover:bg-white/5 hover:border-blue-500/50 transition-all flex items-center justify-center cursor-pointer">
                    <i class="fas fa-bars"></i>
                </button>
                <h2 id="page-title" class="text-lg font-semibold text-white hidden md:block">Dashboard Overview</h2>
            </div>
            <div class="flex items-center gap-4">
                <a href="index.php" target="_blank" class="hidden md:flex items-center gap-2 text-sm text-gray-400 hover:text-blue-400 transition-colors cursor-pointer">
                    <i class="fas fa-globe"></i> View Live Site
                </a>
                <div class="flex items-center gap-3 pl-6 border-l border-white/10">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-white">
                            <?php echo htmlspecialchars($_SESSION['admin']); ?>
                        </p>
                        <p class="text-xs text-blue-400">Super Admin</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 p-[2px]">
                        <div class="w-full h-full rounded-full bg-black flex items-center justify-center overflow-hidden">
                             <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content-frame-container" class="relative">
            <div id="loader" class="absolute inset-0 flex items-center justify-center bg-black z-0">
                <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
            </div>
            <iframe id="content-frame" name="content-frame" src="dashboard.php" class="w-full h-full border-0 relative z-10 opacity-0 transition-opacity duration-300"></iframe>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const links = document.querySelectorAll('.sidebar-link');
        const iframe = document.getElementById('content-frame');
        const pageTitle = document.getElementById('page-title');
        const loader = document.getElementById('loader');
        const spotlight = document.getElementById('cursor-glow');
        
        if (window.innerWidth > 768) {
            gsap.set(spotlight, { xPercent: -50, yPercent: -50, scale: 0.1, opacity: 0 });
            document.addEventListener('mousemove', (e) => {
                gsap.to(spotlight, { x: e.clientX, y: e.clientY, duration: 0.6, ease: "power3.out", overwrite: true });
            });
            document.addEventListener('mouseenter', () => gsap.to(spotlight, { opacity: 1, scale: 1, duration: 1 }));
            document.addEventListener('mouseleave', () => gsap.to(spotlight, { opacity: 0, scale: 0.1, duration: 0.5 }));
        }

        menuToggle.addEventListener('click', () => {
            if (window.innerWidth > 768) { sidebar.classList.toggle('collapsed'); } 
            else { sidebar.classList.toggle('active'); }
        });

        links.forEach(link => {
            link.addEventListener('click', function() {
                if (this.getAttribute('href') === 'logout.php') return;
                links.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                pageTitle.innerText = this.querySelector('.link-text').innerText;
                iframe.style.opacity = '0';
                loader.style.display = 'flex';
            });
        });

        iframe.addEventListener('load', () => {
            iframe.style.opacity = '1';
            setTimeout(() => { loader.style.display = 'none'; }, 300);
        });
    </script>
</body>
</html>