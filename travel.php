<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Diaries | Dipanshu Singh</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold-accent: #fbbf24;
            --green-accent: #22c55e;
        }

        body {
            background-color: #050505;
            background-image: radial-gradient(circle at 50% 50%, #0a1f13 0%, #000000 100%);
            color: #e5e7eb;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        /* Glassmorphism Card Style matching Hero.php */
        .glass-card {
            background: rgba(20, 30, 25, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            border-color: var(--gold-accent);
            background: rgba(20, 30, 25, 0.7);
            transform: translateY(-8px);
            box-shadow: 0 10px 40px -10px rgba(251, 191, 36, 0.15);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #000;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-accent);
        }

        /* Gradient Text */
        .text-gradient-gold {
            background: linear-gradient(to right, #4ade80, #fbbf24, #4ade80);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: shine 5s linear infinite;
        }

        @keyframes shine {
            to { background-position: 200% center; }
        }

        /* Image Hover Effect */
        .img-zoom-container {
            overflow: hidden;
        }
        .img-zoom-container img {
            transition: transform 0.7s ease;
        }
        .glass-card:hover .img-zoom-container img {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="selection:bg-yellow-500 selection:text-black">

    <!-- Includes -->
    <?php include 'birdfly.php'; ?>
    <?php include 'navbar.php'; ?>

    <!-- PHP Data -->
    <?php
    $travelPlaces = [
        [
            "title" => "Taj-Mahal Agra",
            "images" => ["Assets2/taj_01.jpg", "Assets2/taj_02.jpg", "Assets2/taj_03.jpg", "Assets2/taj_04.jpg"],
            "description" => "I visited the Taj Mahal in Agra on August 30, 2021. Known as the symbol of love, the atmosphere was peaceful and enchanting. The breathtaking beauty and intricate craftsmanship of this iconic monument made it an unforgettable experience."
        ],
        [
            "title" => "Haridwar & Rishikesh",
            "images" => ["Assets2/har_01.jpg", "Assets2/har_02.jpg", "Assets2/rish_01.jpg", "Assets2/rish_02.jpg"],
            "description" => "I visited Haridwar and Rishikesh for the first time on September 6, 2021. In Haridwar, I was mesmerized by the beauty of the holy Ganges River. Rishikesh, known as the 'Queen of Hills,' offered stunning views."
        ],
        [
            "title" => "Vaishno Devi, Jammu",
            "images" => ["Assets2/vai_01.jpg", "Assets2/vai_02.jpg", "Assets2/vai_03.jpg", "Assets2/vai_04.jpg"],
            "description" => "I visited Mata Vaishno Devi on November 26, 2021. The journey was filled with new experiences, meeting people from all walks of life. The scenic beauty and vibrant energy of the place made it spiritually uplifting."
        ],
        [
            "title" => "Mandarmani Beach",
            "images" => ["Assets2/dig_01.jpg", "Assets2/dig_02.jpg", "Assets2/mand4.jpg", "Assets2/dig_04.jpg"],
            "description" => "I visited Digha Sea Beach, West Bengal, on New Year 2022, experiencing the sea for the first time. The salty water, vibrant atmosphere, and the sight of various fish species made it unforgettable."
        ],
        [
            "title" => "Delhi, India",
            "images" => ["Assets2/dl_01.jpg", "Assets2/dl_02.jpg", "Assets2/dl_03.jpg", "Assets2/dl_04.jpg"],
            "description" => "I have visited Delhi multiple times, exploring iconic landmarks like India Gate, the Lotus Temple, and the Red Fort. From the stunning architecture to the bustling markets, Delhi never fails to captivate me."
        ],
        [
            "title" => "Kedarnath, Uttarakhand",
            "images" => ["Assets2/ked_01.jpg", "Assets2/ked_02.jpg", "Assets2/ked_03.jpg", "Assets2/ked_04.jpg"],
            "description" => "I visited Kedarnath on June 10, 2022. This sacred site offers a breathtaking atmosphere where clouds seem to touch your face. The Himalayan beauty is enchanting with snow-capped mountains."
        ],
        [
            "title" => "Golden Temple, Amritsar",
            "images" => ["Assets2/gol_01.jpg", "Assets2/gol_02.jpg", "Assets2/gol_03.jpg", "Assets2/gol_04.jpg"],
            "description" => "I visited the Golden Temple in Amritsar on October 20, 2022. It's famous for its stunning architecture and serene ambiance. I also visited Jallianwala Bagh, a memorial site for the tragic 1919 massacre."
        ],
        [
            "title" => "Varanasi, UP",
            "images" => ["Assets2/var_01.jpg", "Assets2/var_02.jpg", "Assets2/var_03.jpg", "Assets2/var_04.jpg"],
            "description" => "Visited Varanasi thrice, first on December 30, 2022. This holy city captivated me with its spiritual ambiance. Witnessing the mesmerizing Ganga Aarti and visiting Kashi Vishwanath Mandir was memorable."
        ],
        [
            "title" => "Vrindavan, Mathura",
            "images" => ["Assets2/mat_01.jpg", "Assets2/mat_02.jpg", "Assets2/mat_03.jpg", "Assets2/mat_04.jpg"],
            "description" => "Visited Vrindavan on July 2, 2023. Exploring the stories of Krishna was magical. I visited Nidhivan, ISKCON, and Prem Mandir, all of which preserved the divine atmosphere of this sacred land."
        ],
        [
            "title" => "Puri, Odisha",
            "images" => ["Assets2/pur1.jpg", "Assets2/pur2.jpg", "Assets2/pur3.jpg", "Assets2/pur4.jpg"],
            "description" => "On December 19, 2023, I visited Puri and Bhubaneswar. I explored the famous Jagannath Temple and Lingaraj Temple. The highlight was Golden Beach in Puri, where I enjoyed the serene waves."
        ],
        [
            "title" => "Manali, Himachal",
            "images" => ["Assets2/man_01.jpg", "Assets2/man_02.jpg", "Assets2/man_03.jpg", "Assets2/man_04.jpg"],
            "description" => "I visited Manali on New Year's 2024. Famous for its snow-covered landscapes, the temperature dipped to -7°C. I explored Atal Tunnel, Sissu, and Kasol, creating unforgettable memories."
        ],
        [
            "title" => "Darjeeling, West Bengal",
            "images" => ["Assets2/dar_01.jpg", "Assets2/dar_02.jpg", "Assets2/dar_03.jpg", "Assets2/dar_04.jpg"],
            "description" => "Visited Darjeeling on August 29, 2024. The tea gardens were breathtaking, and watching the sunrise from Tiger Hill was a memorable experience. A truly remarkable place to explore."
        ],
        [
            "title" => "Gangtok, Sikkim",
            "images" => ["Assets2/gan_01.jpg", "Assets2/gan_02.jpg", "Assets2/gan_03.jpg", "Assets2/gan_04.jpg"],
            "description" => "Visited Gangtok on Sept 2, 2024. Exploring Nathula Pass at 14,000 feet, I witnessed breathtaking views of Kanchenjunga. The vibrant atmosphere of MG Road made it an unforgettable adventure."
        ],
        [
            "title" => "Digha Sea Beach",
            "images" => ["Assets2/dig1.jpg", "Assets2/dig2.jpg", "Assets2/dig4.jpg", "Assets2/dig3.jpg"],
            "description" => "On January 3, 2025, I visited Digha Sea Beach with friends. The highlight was the thrilling banana ride. We also enjoyed boating and had endless fun, making it my best adventure memory yet!"
        ]
    ];
    ?>

    <main class="relative z-10 w-full overflow-hidden pt-24">
        
        <!-- Decoration Background Blobs -->
        <div class="fixed top-20 left-0 w-96 h-96 bg-green-600/20 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="fixed bottom-0 right-0 w-96 h-96 bg-yellow-600/10 rounded-full blur-[100px] pointer-events-none"></div>

        <!-- HERO SECTION -->
        <section class="relative px-6 py-20 md:py-32 text-center max-w-7xl mx-auto">
            <div data-aos="fade-down" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 px-4 py-1 mb-6 border border-yellow-500/30 rounded-full bg-black/40 backdrop-blur-md text-yellow-400 text-xs font-bold tracking-widest uppercase shadow-lg">
                    <i data-lucide="compass" class="w-4 h-4"></i> Travel Diaries
                </div>
                
                <h1 class="text-4xl md:text-7xl font-bold text-white mb-6 leading-tight drop-shadow-2xl">
                    EXPLORE STUNNING <br>
                    <span class="text-gradient-gold">DESTINATIONS</span>
                </h1>
                
                <div class="glass-card p-6 md:p-8 rounded-2xl max-w-4xl mx-auto mt-10 text-gray-300 leading-relaxed text-sm md:text-lg border-l-4 border-yellow-500">
                    <p>
                        "Travel is an essential aspect of human life. Each journey presents a chance to step outside one’s comfort zone, fostering personal development. Through travel, one can learn humility and appreciation for nature’s beauty, helping individuals shed their ego and embrace change."
                    </p>
                </div>
            </div>
        </section>

        <!-- TRAVEL GRID -->
        <section class="px-4 pb-32">
            <div class="container mx-auto max-w-7xl">
                <!-- UPDATED GRID: grid-cols-1 on mobile, grid-cols-2 on tablet, grid-cols-3 on large screens -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <?php foreach ($travelPlaces as $index => $place): ?>
                        <!-- Card Item -->
                        <article class="glass-card rounded-3xl overflow-hidden flex flex-col h-full" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
                            
                            <!-- Image Grid (2x2) -->
                            <div class="grid grid-cols-2 gap-1 p-2 h-60 bg-black/20">
                                <?php foreach ($place['images'] as $key => $imgSrc): ?>
                                    <div class="relative overflow-hidden rounded-lg img-zoom-container h-full w-full">
                                        <img src="<?php echo htmlspecialchars($imgSrc); ?>" 
                                             alt="<?php echo htmlspecialchars($place['title']); ?>" 
                                             class="w-full h-full object-cover"
                                             loading="lazy">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Content -->
                            <div class="p-6 flex flex-col flex-grow relative">
                                <!-- Location Icon Overlay -->
                                <div class="absolute -top-6 right-6 w-10 h-10 bg-black border border-yellow-500/50 rounded-full flex items-center justify-center text-yellow-400 shadow-xl z-20">
                                    <i data-lucide="map-pin" class="w-4 h-4"></i>
                                </div>

                                <h2 class="text-xl font-cinzel font-bold text-white mb-3 flex items-center gap-2">
                                    <?php echo htmlspecialchars($place['title']); ?>
                                </h2>
                                
                                <p class="text-gray-400 text-xs leading-relaxed mb-4 flex-grow line-clamp-4">
                                    <?php echo htmlspecialchars($place['description']); ?>
                                </p>
                                
                                <div class="pt-4 border-t border-gray-700/50 flex items-center justify-between group cursor-pointer">
                                    <span class="text-[10px] font-bold tracking-widest text-green-400 uppercase">View Gallery</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 text-yellow-400 transform group-hover:translate-x-2 transition-transform"></i>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>
    <?php include 'whatsapp.php'; ?>

    <script>
        // Initialize Libraries
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50
        });
        
        lucide.createIcons();
    </script>
</body>
</html>