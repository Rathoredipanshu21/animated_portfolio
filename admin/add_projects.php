<?php
// admin/add_projects.php
include '../config/db.php';

$message = "";

// --- Handle Form Submission ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']);
    $client = $conn->real_escape_string($_POST['client_name']);
    $date = $conn->real_escape_string($_POST['completion_date']);
    $desc = $conn->real_escape_string($_POST['description']);
    $tech = $conn->real_escape_string($_POST['tech_stack']);
    $features = $conn->real_escape_string($_POST['features']);
    $link = $conn->real_escape_string($_POST['domain_link']);
    
    // --- FIX: Ensure Directories Exist ---
    $baseUploadDir = '../uploads/';
    $projectUploadDir = '../uploads/projects/';

    if (!is_dir($baseUploadDir)) {
        mkdir($baseUploadDir, 0777, true);
    }
    if (!is_dir($projectUploadDir)) {
        mkdir($projectUploadDir, 0777, true);
    }

    // 1. Handle Client Logo Upload
    $logoPath = '';
    if (!empty($_FILES['client_logo']['name'])) {
        $logoName = time() . '_' . basename($_FILES['client_logo']['name']);
        $targetLogo = $baseUploadDir . $logoName;
        if (move_uploaded_file($_FILES['client_logo']['tmp_name'], $targetLogo)) {
            $logoPath = 'uploads/' . $logoName; // Path for DB
        }
    }

    // 2. Handle Project Images
    $imagePaths = [];
    if (!empty($_FILES['project_images']['name'][0])) {
        foreach ($_FILES['project_images']['name'] as $key => $name) {
            if ($_FILES['project_images']['error'][$key] === 0) {
                $imgName = time() . '_' . $key . '_' . basename($name);
                $targetImg = $projectUploadDir . $imgName;
                
                if (move_uploaded_file($_FILES['project_images']['tmp_name'][$key], $targetImg)) {
                    $imagePaths[] = 'uploads/projects/' . $imgName; // Path for DB
                }
            }
        }
    }
    $jsonImages = json_encode($imagePaths);

    // 3. Insert into Database
    $sql = "INSERT INTO projects (title, subtitle, client_name, completion_date, description, tech_stack, features, domain_link, client_logo, project_images) 
            VALUES ('$title', '$subtitle', '$client', '$date', '$desc', '$tech', '$features', '$link', '$logoPath', '$jsonImages')";

    if ($conn->query($sql)) {
        $message = "<div class='bg-green-600 text-white p-4 rounded-lg mb-6 shadow-lg flex items-center gap-2'><i class='fas fa-check-circle'></i> Project Added Successfully!</div>";
    } else {
        $message = "<div class='bg-red-600 text-white p-4 rounded-lg mb-6 shadow-lg'>Error: " . $conn->error . "</div>";
    }
}

// --- Fetch Existing Projects ---
$projects = $conn->query("SELECT * FROM projects ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #0f0f0f; color: #e0e0e0; font-family: 'Inter', sans-serif; }
        .glass-panel { background: rgba(30, 30, 30, 0.6); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.1); }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a1a; }
        ::-webkit-scrollbar-thumb { background: #444; border-radius: 4px; }
    </style>
</head>
<body class="min-h-screen relative">

    <nav class="w-full bg-black/90 border-b border-gray-800 p-4 flex justify-between items-center sticky top-0 z-30">
        <h1 class="text-2xl font-bold text-white tracking-tighter"><span class="text-blue-500">SYSTA</span>IO Admin</h1>
        <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-full transition-all shadow-[0_0_15px_rgba(37,99,235,0.5)] flex items-center gap-2">
            <i class="fas fa-plus"></i> Add Project
        </button>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <?php echo $message; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if ($projects && $projects->num_rows > 0): ?>
                <?php while ($row = $projects->fetch_assoc()): 
                    $imgs = json_decode($row['project_images'], true);
                    $thumb = !empty($imgs) ? '../' . $imgs[0] : 'https://via.placeholder.com/400x250?text=No+Image';
                ?>
                <div class="bg-[#1a1a1a] border border-gray-800 rounded-xl overflow-hidden hover:border-blue-500/50 transition-all group">
                    <div class="h-48 overflow-hidden relative">
                        <img src="<?php echo htmlspecialchars($thumb); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black to-transparent p-2">
                             <span class="text-xs bg-blue-600 text-white px-2 py-1 rounded"><?php echo htmlspecialchars($row['client_name']); ?></span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-1"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="text-gray-500 text-xs mb-3 uppercase tracking-wide"><?php echo htmlspecialchars($row['subtitle']); ?></p>
                        <div class="flex flex-wrap gap-1 mb-4">
                            <?php 
                                $stack = explode(',', $row['tech_stack']);
                                foreach(array_slice($stack, 0, 3) as $tech): 
                            ?>
                                <span class="text-[10px] border border-gray-700 text-gray-400 px-2 py-1 rounded-full"><?php echo trim($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?php echo htmlspecialchars($row['domain_link']); ?>" target="_blank" class="text-blue-400 hover:text-white text-sm flex items-center gap-2 transition-colors">
                            Visit Link <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-20 text-gray-500">
                    <p>No projects found. Click "Add Project" to create one.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div id="projectModal" class="fixed inset-0 bg-black/90 z-50 hidden flex items-center justify-center overflow-y-auto py-10">
        <div class="bg-[#121212] w-full max-w-4xl rounded-2xl border border-gray-700 shadow-2xl relative my-auto">
            <div class="p-6 border-b border-gray-800 flex justify-between items-center sticky top-0 bg-[#121212] z-10 rounded-t-2xl">
                <h2 class="text-2xl font-bold text-white">Add Software Project</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>

            <div class="p-6 max-h-[80vh] overflow-y-auto">
                <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Project Title</label>
                            <input type="text" name="title" required class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none" placeholder="e.g. Inventory System">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Subtitle / Type</label>
                            <input type="text" name="subtitle" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none" placeholder="e.g. SaaS Platform">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Client Name</label>
                            <input type="text" name="client_name" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none" placeholder="e.g. Global Corp">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Completion Date</label>
                            <input type="date" name="completion_date" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Tech Stack (Comma Separated)</label>
                            <input type="text" name="tech_stack" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none" placeholder="e.g. PHP, Laravel, React, MySQL">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Domain Link</label>
                            <input type="url" name="domain_link" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none" placeholder="https://...">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Short Description</label>
                            <textarea name="description" rows="5" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2 text-sm">Key Features (One per line)</label>
                            <textarea name="features" rows="5" class="w-full bg-[#1a1a1a] border border-gray-700 rounded-lg p-3 text-white focus:border-blue-500 focus:outline-none" placeholder="- Admin Dashboard&#10;- Payment Gateway&#10;- User Roles"></textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border-2 border-dashed border-gray-700 rounded-lg p-6 text-center">
                            <p class="text-gray-400 mb-2">Client Logo</p>
                            <input type="file" name="client_logo" accept="image/*" class="text-sm text-gray-500">
                        </div>
                        <div class="border-2 border-dashed border-gray-700 rounded-lg p-6 text-center">
                            <p class="text-gray-400 mb-2">Project Screens (Select Multiple)</p>
                            <input type="file" name="project_images[]" multiple accept="image/*" class="text-sm text-gray-500">
                        </div>
                    </div>

                    <button type="submit" name="add_project" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-lg mt-4">
                        Save Project
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('projectModal');
        function openModal() { modal.classList.remove('hidden'); }
        function closeModal() { modal.classList.add('hidden'); }
        window.onclick = function(event) { if (event.target == modal) closeModal(); }
    </script>
</body>
</html>