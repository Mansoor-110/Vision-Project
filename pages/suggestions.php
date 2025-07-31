<?php
include "../includes/header.php";
include('../includes/connection.php');

// Initialize variables
$products = null;
$uploaded_image = null;
$category = null;
$error = null;

// Check if form is submitted
if ($_POST) {
    $category = $_POST['category'];
    
    // Check if file is uploaded properly
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $file = $_FILES['photo'];
        
        // Check file size (max 5MB)
        if ($file['size'] > 5 * 1024 * 1024) {
            $error = "File size must be less than 5MB.";
        }
        // Check file type
        else if (!in_array($file['type'], ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
            $error = "Please upload a valid image file (JPEG, PNG, or GIF).";
        }
        else {
            // Create upload folder if it doesn't exist
            $upload_dir = '../uploads/beauty_suggestions/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            // Generate unique filename and upload
            $file_name = uniqid('beauty_') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $upload_path = $upload_dir . $file_name;
            
            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                $uploaded_image = $upload_path;
                
                // Map category names
                $categories = [
                    'jewellery' => 'Jewellery',
                    'beauty' => 'Beauty Tools',
                    'cosmetics' => 'Cosmetics'
                ];
                
                $db_category = $categories[$category];
                
                // Use prepared statement for security
                $stmt = $conn->prepare("SELECT * FROM add_product WHERE product_category = ? ORDER BY RAND() LIMIT 3");
                $stmt->bind_param("s", $db_category);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result && $result->num_rows > 0) {
                    $products = $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    $products = [];
                }
                $stmt->close();
            } else {
                $error = "Failed to upload image. Please try again.";
            }
        }
    } else {
        $error = "Please upload a valid image file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/face-api.js"></script>
    <title>Beauty Suggestions - Lumina</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
            color: #333333;
            overflow-x: hidden;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            position: relative;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #800020;
            margin-bottom: 50px;
            margin-top: 50px;
            font-size: 2.8rem;
            font-weight: 300;
            letter-spacing: 2px;
            position: relative;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #800020, transparent);
        }

        .form-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .form-group {
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: 500;
            color: #800020;
            font-size: 1.1rem;
            letter-spacing: 1px;
        }

        .file-input-wrapper {
            position: relative;
            display: block;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .file-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            background: transparent;
            color: #800020;
            border: 2px solid #800020;
            border-radius: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s ease;
            font-size: 1.1rem;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .file-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #800020;
            transition: left 0.4s ease;
            z-index: -1;
        }

        .file-button:hover::before {
            left: 0;
        }

        .file-button:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(128, 0, 32, 0.3);
        }

        .file-selected {
            background: rgba(128, 0, 32, 0.1);
            border-color: #800020;
        }

        .file-button i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        select {
            width: 100%;
            padding: 25px;
            border: 2px solid #800020;
            border-radius: 12px;
            font-size: 1.1rem;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-family: 'Georgia', serif;
            transition: all 0.4s ease;
            font-weight: 500;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        select:focus {
            outline: none;
            border-color: #800020;
            box-shadow: 0 0 20px rgba(128, 0, 32, 0.2);
        }

        /* Enhanced Loading Overlay with Analysis Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .loading-overlay.show {
            display: flex;
            opacity: 1;
        }

        .loading-content {
            text-align: center;
            color: #800020;
            font-family: 'Georgia', serif;
            max-width: 500px;
        }

        /* Face Analysis Animation */
        .face-analysis {
            width: 200px;
            height: 200px;
            margin: 0 auto 40px;
            position: relative;
            border: 3px solid #800020;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(128, 0, 32, 0.05);
        }

        .face-icon {
            font-size: 80px;
            color: #800020;
            animation: face-pulse 2s ease-in-out infinite;
        }

        .scanning-line {
            position: absolute;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #800020, transparent);
            top: 50%;
            left: 0;
            animation: scan-vertical 3s linear infinite;
        }

        .scanning-dots {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #800020;
            border-radius: 50%;
            animation: scan-rotate 4s linear infinite;
        }

        .scanning-dots:nth-child(2) {
            animation-delay: 1s;
            background: #a0002a;
        }

        .scanning-dots:nth-child(3) {
            animation-delay: 2s;
            background: #c0003a;
        }

        @keyframes face-pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes scan-vertical {
            0% { top: 10%; opacity: 0; }
            50% { opacity: 1; }
            100% { top: 90%; opacity: 0; }
        }

        @keyframes scan-rotate {
            0% { 
                transform: rotate(0deg) translateX(80px) rotate(0deg);
                opacity: 1;
            }
            100% { 
                transform: rotate(360deg) translateX(80px) rotate(-360deg);
                opacity: 0.3;
            }
        }

        .analysis-steps {
            margin-bottom: 30px;
        }

        .step {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 15px;
            padding: 15px;
            background: rgba(128, 0, 32, 0.05);
            border-radius: 10px;
            border-left: 4px solid transparent;
            transition: all 0.5s ease;
            opacity: 0.3;
        }

        .step.active {
            opacity: 1;
            border-left-color: #800020;
            background: rgba(128, 0, 32, 0.1);
            transform: translateX(10px);
        }

        .step-icon {
            margin-right: 15px;
            font-size: 1.2rem;
            width: 30px;
            text-align: center;
        }

        .step-text {
            font-size: 1.1rem;
            letter-spacing: 1px;
        }

        .loading-text {
            font-size: 1.6rem;
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 15px;
            animation: loading-pulse 2s ease-in-out infinite;
        }

        .loading-subtext {
            font-size: 1rem;
            color: rgba(128, 0, 32, 0.7);
            letter-spacing: 1px;
            animation: loading-fade 3s ease-in-out infinite;
        }

        @keyframes loading-pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.05); }
        }

        @keyframes loading-fade {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .analyze-btn {
            background: transparent;
            color: #800020;
            padding: 20px 50px;
            border: 2px solid #800020;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: all 0.4s ease;
            letter-spacing: 1px;
            font-family: 'Georgia', serif;
            position: relative;
            overflow: hidden;
        }

        .analyze-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #800020;
            transition: left 0.4s ease;
            z-index: -1;
        }

        .analyze-btn:hover::before {
            left: 0;
        }

        .analyze-btn:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(128, 0, 32, 0.4);
        }

        .analyze-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Image Preview Section */
        .preview-section {
            margin: 30px 0;
            text-align: center;
        }

        .preview-image {
            max-width: 300px;
            max-height: 300px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(128, 0, 32, 0.2);
            border: 3px solid rgba(128, 0, 32, 0.1);
            display: none;
        }

        .results {
            margin-top: 60px;
        }

        .image-preview {
            text-align: center;
            margin-bottom: 40px;
        }

        .uploaded-image {
            max-width: 400px;
            max-height: 400px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(128, 0, 32, 0.3);
            border: 4px solid rgba(128, 0, 32, 0.2);
            display: block;
            margin: 0 auto;
        }

        .suggestions {
            background: rgba(248, 248, 248, 0.8);
            padding: 40px;
            border-radius: 15px;
            border: 1px solid rgba(128, 0, 32, 0.1);
            backdrop-filter: blur(5px);
        }

        .suggestions h3 {
            color: #800020;
            margin-bottom: 40px;
            font-size: 2rem;
            font-weight: 300;
            letter-spacing: 1px;
            text-align: center;
        }

        /* Product Grid - Shows exactly 3 cards */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(128, 0, 32, 0.1);
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(128, 0, 32, 0.2);
            border-color: #800020;
        }

        .card-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #800020;
        }

        .card-content {
            padding: 25px;
        }

        .card-title {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #333;
            font-weight: 400;
        }

        .card-description {
            color: rgba(51, 51, 51, 0.7);
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .card-price {
            font-size: 1.3rem;
            color: #800020;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .card-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-btn {
            display: inline-block;
            padding: 10px 25px;
            background: transparent;
            border: 1px solid rgba(128, 0, 32, 0.5);
            color: #800020;
            text-decoration: none;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 5px;
        }

        .view-btn:hover {
            background: #800020;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(128, 0, 32, 0.3);
        }

        .wishlist-icon i {
            color: #800020;
            font-size: 24px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .wishlist-icon i:hover {
            transform: scale(1.15);
            color: #a0002a;
        }

        .no-results, .error {
            text-align: center;
            padding: 60px 20px;
            font-size: 1.2rem;
            letter-spacing: 1px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .error {
            background: rgba(220, 38, 38, 0.1);
            color: #dc2626;
            border: 1px solid rgba(220, 38, 38, 0.2);
        }

        .no-results {
            color: #800020;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .container {
                margin: 20px 10px;
                padding: 40px 30px;
            }
            
            h1 {
                font-size: 2.2rem;
            }

            .form-section {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .face-analysis {
                width: 150px;
                height: 150px;
            }

            .face-icon {
                font-size: 60px;
            }
        }

        @media (max-width: 992px) and (min-width: 769px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay with Analysis Animation -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="face-analysis">
                <i class="fas fa-user face-icon"></i>
                <div class="scanning-line"></div>
                <div class="scanning-dots"></div>
                <div class="scanning-dots"></div>
                <div class="scanning-dots"></div>
            </div>
            
            <div class="analysis-steps">
                <div class="step" id="step1">
                    <div class="step-icon"><i class="fas fa-upload"></i></div>
                    <div class="step-text">Processing your image...</div>
                </div>
                <div class="step" id="step2">
                    <div class="step-icon"><i class="fas fa-eye"></i></div>
                    <div class="step-text">Analyzing facial features...</div>
                </div>
                <div class="step" id="step3">
                    <div class="step-icon"><i class="fas fa-palette"></i></div>
                    <div class="step-text">Detecting skin tone & color preferences...</div>
                </div>
                <div class="step" id="step4">
                    <div class="step-icon"><i class="fas fa-magic"></i></div>
                    <div class="step-text">Finding perfect matches...</div>
                </div>
                <div class="step" id="step5">
                    <div class="step-icon"><i class="fas fa-heart"></i></div>
                    <div class="step-text">Curating personalized suggestions...</div>
                </div>
            </div>
            
            <div class="loading-text">Analyzing Your Beauty Profile</div>
            <div class="loading-subtext">Creating personalized recommendations just for you</div>
        </div>
    </div>

    <div class="container">
        <h1>Beauty Suggestions</h1>
        
        <!-- Upload Form -->
        <form method="POST" enctype="multipart/form-data" id="analysisForm">
            <div class="form-section">
                <div class="form-group">
                    <label>Upload Your Photo</label>
                    <div class="file-input-wrapper">
                        <input type="file" name="photo" id="imageUpload" class="file-input" accept="image/*" required>
                        <div class="file-button" id="fileButton">
                            <i class="fas fa-camera"></i>
                            Choose Photo
                        </div>
                    </div>
                    <div class="preview-section">
                        <img id="previewImage" class="preview-image" alt="Preview">
                    </div>
                </div>

                <div class="form-group">
                    <label for="categorySelect">Select Category</label>
                    <select name="category" id="categorySelect" required>
                        <option value="">Choose Category</option>
                        <option value="jewellery" <?= ($category == 'jewellery') ? 'selected' : '' ?>>Jewellery</option>
                        <option value="beauty" <?= ($category == 'beauty') ? 'selected' : '' ?>>Beauty Tools</option>
                        <option value="cosmetics" <?= ($category == 'cosmetics') ? 'selected' : '' ?>>Cosmetics</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="analyze-btn" id="analyzeBtn">
                <i class="fas fa-magic"></i> GetSuggestions
            </button>
        </form>

        <!-- Show Error Message -->
        <?php if ($error): ?>
        <div class="results">
            <div class="error">
                <i class="fas fa-exclamation-triangle"></i> 
                <?= htmlspecialchars($error) ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Show Results -->
        <?php if ($products && count($products) > 0): ?>
        <div class="results">
            <div class="image-preview">
                <img src="<?= htmlspecialchars($uploaded_image) ?>" class="uploaded-image" alt="Your uploaded photo">
            </div>
            
            <div class="suggestions">
                <h3>Recommended <?= ucfirst($category == 'beauty' ? 'Beauty Tools' : $category) ?> for You</h3>
                
                <div class="product-grid">
                    <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="card-image" style="background-image: url('<?= htmlspecialchars($product['product_image']) ?>');">
                            <?php if (empty($product['product_image'])): ?>
                                <i class="fas fa-image"></i>
                            <?php endif; ?>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h3>
                            <p class="card-description"><?= htmlspecialchars($product['product_description']) ?></p>
                            <div class="card-price">Rs.<?= number_format($product['product_price']) ?></div>
                            <div class="card-actions">
                                <a href="../products/product_detail.php?id=<?= $product['product_id'] ?>" class="view-btn">VIEW DETAILS</a>
                                <a href="../wishlist/add_wishlist.php?id=<?= $product['product_id'] ?>" class="wishlist-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php elseif ($_POST && $products !== null && count($products) === 0): ?>
        <div class="results">
            <div class="no-results">
                <i class="fas fa-search"></i><br>
                No products found in this category. Please try another category.
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script>
        // Analysis animation steps
        const steps = ['step1', 'step2', 'step3', 'step4', 'step5'];
        let currentStep = 0;

        function animateSteps() {
            if (currentStep < steps.length) {
                document.getElementById(steps[currentStep]).classList.add('active');
                currentStep++;
                setTimeout(animateSteps, 1000); // 1 second between each step
            }
        }

        // Handle file selection with preview
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            const fileButton = document.getElementById('fileButton');
            const previewImage = document.getElementById('previewImage');
            const file = e.target.files[0];
            
            if (file) {
                // Check file size (5MB limit)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB');
                    e.target.value = '';
                    fileButton.innerHTML = `<i class="fas fa-camera"></i> Choose Photo`;
                    fileButton.classList.remove('file-selected');
                    previewImage.style.display = 'none';
                    return;
                }
                
                // Show file name
                fileButton.innerHTML = `<i class="fas fa-check"></i> ${file.name}`;
                fileButton.classList.add('file-selected');
                
                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                fileButton.innerHTML = `<i class="fas fa-camera"></i> Choose Photo`;
                fileButton.classList.remove('file-selected');
                previewImage.style.display = 'none';
            }
        });

        // Click handler for file button
        document.getElementById('fileButton').addEventListener('click', function() {
            document.getElementById('imageUpload').click();
        });

        // Handle form submission with loading animation
        document.getElementById('analysisForm').addEventListener('submit', function(e) {
            const loadingOverlay = document.getElementById('loadingOverlay');
            const analyzeBtn = document.getElementById('analyzeBtn');
            
            // Validate form before showing loading
            const photoInput = document.getElementById('imageUpload');
            const categorySelect = document.getElementById('categorySelect');
            
            if (!photoInput.files[0] || !categorySelect.value) {
                return; // Let browser show validation errors
            }
            
            // Reset animation
            currentStep = 0;
            steps.forEach(stepId => {
                document.getElementById(stepId).classList.remove('active');
            });
            
            // Show loading overlay and start animation
            loadingOverlay.classList.add('show');
            animateSteps();
            
            // Add loading state to button
            analyzeBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Analyzing...';
            analyzeBtn.disabled = true;
        });

        // Add a "New Analysis" button after results are shown
        <?php if ($products !== null && !$error): ?>
        window.addEventListener('load', function() {
            // Add a "Start New Analysis" button
            const resultsSection = document.querySelector('.results');
            if (resultsSection) {
                const newAnalysisBtn = document.createElement('div');
                newAnalysisBtn.innerHTML = `
                    <div style="text-align: center; margin-top: 40px; margin-bottom: 20px;">
                        <button type="button" id="newAnalysisBtn" class="analyze-btn" style="max-width: 400px;">
                            <i class="fas fa-refresh"></i> Start New Analysis
                        </button>
                    </div>
                `;
                resultsSection.appendChild(newAnalysisBtn);
                
                // Handle new analysis button click
                document.getElementById('newAnalysisBtn').addEventListener('click', function() {
                    // Hide results section
                    resultsSection.style.display = 'none';
                    
                    // Clear and reset form
                    document.getElementById('imageUpload').value = '';
                    document.getElementById('fileButton').innerHTML = '<i class="fas fa-camera"></i> Choose Photo';
                    document.getElementById('fileButton').classList.remove('file-selected');
                    document.getElementById('previewImage').style.display = 'none';
                    document.getElementById('categorySelect').value = '';
                    
                    // Reset analyze button
                    document.getElementById('analyzeBtn').innerHTML = '<i class="fas fa-magic"></i> Get Smart Suggestions';
                    document.getElementById('analyzeBtn').disabled = false;
                    
                    // Scroll to top of form
                    document.querySelector('.container h1').scrollIntoView({ behavior: 'smooth' });
                });
            }
        });
        <?php endif; ?>

        // Alternative: Auto-redirect approach (uncomment if you prefer this)
        // <?php if ($products !== null && !$error): ?>
        // setTimeout(function() {
        //     if (confirm('Analysis complete! Would you like to start a new analysis?')) {
        //         window.location.href = window.location.pathname;
        //     }
        // }, 3000);
        // <?php endif; ?>

        // Initialize Face-API.js (for future enhancement)
        async function initializeFaceAPI() {
            try {
                // Load models for future use
                await faceapi.nets.tinyFaceDetector.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models');
                await faceapi.nets.faceLandmark68Net.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models');
                await faceapi.nets.faceRecognitionNet.loadFromUri('https://cdn.jsdelivr.net/npm/face-api.js/models');
                console.log('Face-API.js models loaded successfully');
            } catch (error) {
                console.log('Face-API.js models not available, using fallback analysis');
            }
        }

        // Initialize face detection when page loads
        window.addEventListener('load', initializeFaceAPI);
    </script>

    <?php include "../includes/footer.php"; ?>
</body>
</html>