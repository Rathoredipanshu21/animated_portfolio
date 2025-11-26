<?php
// projects.php
include 'config/db.php';

// Fetch projects
$result = $conn->query("SELECT * FROM projects ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Expeditions | Dipanshu Singh</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* Typography override if needed, otherwise handled by birdfly.php */
        h1, h2, h3, .font-cinzel { font-family: 'Cinzel', serif; }

        /* --- PROJECT SPECIFIC STYLES --- */
        /* Note: Colors like --gold-accent are inherited from birdfly.php */
        
        #resume-projects { position: relative; z-index: 10; }

        .forest-card {
            background: rgba(10, 20, 15, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(74, 222, 128, 0.1);
            transition: all 0.4s ease;
            overflow: hidden;
            cursor: pointer; /* Indicates the whole card is clickable */
        }

        .forest-card:hover {
            border-color: var(--gold-accent);
            transform: translateY(-10px);
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        }

        .project-img-wrapper { overflow: hidden; position: relative; }
        .project-img { transition: transform 0.7s ease; width: 100%; height: 100%; object-fit: cover; }
        .forest-card:hover .project-img { transform: scale(1.1); }

        .tech-tag {
            background: rgba(5, 10, 7, 0.8);
            border: 1px solid rgba(74, 222, 128, 0.3);
            color: #4ade80;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    </style>
</head>
<body>


    <main id="resume-projects" class="container mx-auto px-4 pt-32 pb-20">
        
        <div class="text-center mb-20" data-aos="zoom-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 border border-yellow-500/30 rounded-full bg-black/60 text-yellow-400 text-xs tracking-[0.2em] uppercase">
                <i data-lucide="compass" class="w-3 h-3"></i> My Portfolio
            </div>
            <h1 class="font-cinzel text-5xl md:text-7xl text-white mb-6 drop-shadow-2xl">
                Digital <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400">Expeditions</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Exploring the digital wilderness, crafting ecosystems of code and creativity. Here are my selected works grown from the ground up.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): 
                    $images = json_decode($row['project_images'], true);
                    $mainImage = !empty($images) ? $images[0] : 'https://via.placeholder.com/800x600?text=No+Preview';
                ?>
                <article class="forest-card group rounded-2xl" data-aos="fade-up">
                    <a href="project_details.php?id=<?php echo $row['id']; ?>" class="block w-full h-full">
                        
                        <div class="project-img-wrapper h-64 md:h-72">
                            <img src="<?php echo htmlspecialchars($mainImage); ?>" class="project-img">
                            
                            <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                                <div class="px-8 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:shadow-[0_0_20px_rgba(74,222,128,0.4)] flex items-center gap-2">
                                    <i data-lucide="eye" class="w-4 h-4"></i> Explore
                                </div>
                            </div>
                            
                            <?php if($row['client_logo']): ?>
                            <div class="absolute top-4 right-4 w-12 h-12 bg-black/80 border border-green-500/30 rounded-lg flex items-center justify-center p-1">
                                <img src="<?php echo htmlspecialchars($row['client_logo']); ?>" class="w-full h-full object-contain">
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-6 md:p-8">
                            <div class="text-xs text-yellow-400 font-bold mb-2 uppercase tracking-widest flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                <?php echo htmlspecialchars($row['subtitle']); ?>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-white mb-3 group-hover:text-green-400 transition-colors font-cinzel">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </h2>
                            
                            <p class="text-gray-400 text-sm leading-relaxed mb-5 line-clamp-3">
                                <?php echo htmlspecialchars($row['description']); ?>
                            </p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <?php if(!empty($row['tech_stack'])): 
                                    $stack = explode(',', $row['tech_stack']);
                                    foreach(array_slice($stack, 0, 3) as $tech): ?>
                                    <span class="tech-tag px-2 py-1 rounded"><?php echo trim($tech); ?></span>
                                <?php endforeach; endif; ?>
                            </div>

                            <div class="pt-4 border-t border-gray-800">
                                <span class="text-sm text-gray-300 hover:text-yellow-400 transition-colors flex items-center justify-between group-hover:translate-x-1 duration-300">
                                    View Case Study <i data-lucide="arrow-right" class="w-4 h-4 text-green-500"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-20">
                    <h2 class="text-2xl text-gray-500 font-cinzel">No Expeditions Found</h2>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
        AOS.init({ duration: 800, once: true });
        lucide.createIcons();
    </script>
</body>
</html>