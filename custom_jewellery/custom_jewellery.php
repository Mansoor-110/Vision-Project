<?php include('../includes/header.php')?>

<style>
    body {
      background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 50%, #ffffff 100%);
      color: #2c2c2c;
      font-family: 'Georgia', serif;
      line-height: 1.6;
    }

    .customizer-wrapper {
      display: flex;
      gap: 30px;
      max-width: 1400px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .sidebar {
      width: 150px;
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      height: fit-content;
      position: sticky;
      top: 20px;
    }

    .sidebar h3 {
      margin-bottom: 20px;
      color: #2d3748;
      font-size: 18px;
      font-weight: 600;
      text-align: center;
      border-bottom: 2px solid #e2e8f0;
      padding-bottom: 12px;
    }

    .gem-option {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      padding: 15px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      transition: all 0.3s ease;
      cursor: grab;
    }

    .gem-option:hover {
      border-color: #667eea;
      background: #f8f9ff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .gem-option:active {
      cursor: grabbing;
    }

    .sidebar img {
      border-radius: 8px;
      transition: all 0.2s ease;
      margin-right: 15px;
    }

    .gem-option:hover img {
      transform: scale(1.1);
    }

    .gem-info {
      flex: 1;
    }

    .gem-name {
      font-weight: 600;
      color: #2d3748;
      font-size: 14px;
      margin-bottom: 3px;
    }

    .gem-desc {
      color: #666;
      font-size: 12px;
    }

    .preview {
      flex: 1;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
    }

    .preview-header {
      margin-bottom: 25px;
      text-align: center;
      padding-bottom: 15px;
      border-bottom: 2px solid #e2e8f0;
    }

    .preview-header h2 {
      color: #2d3748;
      font-size: 22px;
      font-weight: 600;
      margin: 0;
    }

    .main-preview {
      display: flex;
      justify-content: center;
      align-items: center;
      border: 2px dashed #d1d5db;
      height: 450px;
      margin-bottom: 25px;
      position: relative;
      border-radius: 12px;
      background: #fafafa;
      transition: all 0.3s ease;
    }

    .main-preview:hover {
      border-color: #667eea;
      background: #f8f9ff;
    }

    .main-preview.drag-over {
      border-color: #667eea;
      background: #f0f4ff;
      transform: scale(1.02);
    }

    .main-preview img {
      max-height: 100%;
      max-width: 100%;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .drop-hint {
      position: absolute;
      text-align: center;
      color: #9ca3af;
      font-size: 16px;
      pointer-events: none;
    }

    .drop-hint i {
      font-size: 48px;
      margin-bottom: 10px;
      display: block;
    }

    .thumbs {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
      padding: 20px;
      background: #f9f9f9;
      border-radius: 8px;
      border: 1px solid #e5e7eb;
      margin-bottom: 25px;
    }

    .thumbs img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid transparent;
      border-radius: 6px;
      transition: all 0.2s ease;
    }

    .thumbs img:hover {
      border-color: #667eea;
      transform: scale(1.1);
    }

    .thumbs img.active {
      border-color: #667eea;
    }

    /* Action Buttons */
    .action-buttons {
      display: flex;
      gap: 20px;
      justify-content: center;
      align-items: center;
      padding: 25px 0;
      border-top: 2px solid #e2e8f0;
    }

    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      min-width: 150px;
      justify-content: center;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
      color: white;
      text-decoration: none;
    }

    .btn-secondary {
      background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 10px;
      min-width: 150px;
      justify-content: center;
    }

    .btn-secondary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(72, 187, 120, 0.4);
    }

    .btn-primary:disabled,
    .btn-secondary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }

    .draggable {
      cursor: grab;
    }

    .draggable:active {
      cursor: grabbing;
    }

    /* Loading spinner */
    .spinner {
      border: 2px solid #f3f3f3;
      border-top: 2px solid #667eea;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Success/Error messages */
    .message {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 15px 20px;
      border-radius: 8px;
      color: white;
      font-weight: 600;
      z-index: 1000;
      transform: translateX(400px);
      transition: transform 0.3s ease;
    }

    .message.show {
      transform: translateX(0);
    }

    .message.success {
      background: #48bb78;
    }

    .message.error {
      background: #f56565;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .customizer-wrapper {
        flex-direction: column;
        gap: 20px;
        margin: 20px auto;
      }
      
      .sidebar {
        width: 100%;
        position: static;
      }
      
      .main-preview {
        height: 350px;
      }

      .action-buttons {
        flex-direction: column;
        gap: 15px;
      }

      .btn-primary,
      .btn-secondary {
        width: 100%;
        max-width: 300px;
      }
    }
</style>

<div class="container-fluid">
  <div class="customizer-wrapper">
    
    <?php
      include('../includes/connection.php');

      $body_id = $_GET['body_id'] ?? null;
      $gem = $_GET['gem'] ?? null;
      $images = [];
      $mainImage = ''; // Initialize main image variable
      $product_name = 'Customized Jewellery';
      
      // Create detailed product name based on selection
      if (!empty($gem) && !empty($body_id)) {
          $product_name = "Custom Jewellery - Body ID: $body_id - Gem: $gem";
      } elseif (!empty($body_id)) {
          $product_name = "Custom Jewellery - Body ID: $body_id - No Gem";
      }
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <h3>Pick Gem</h3>
      
      <div class="gem-option">
        <img src="../admin/custom_jewellery_admin/gems/none.png" width="40" class="draggable" draggable="true" data-gem="" alt="No Gemstone">
      </div>
      
      <div class="gem-option">
        <img src="../admin/custom_jewellery_admin/gems/diamond-thumb.avif" width="50" class="draggable" draggable="true" data-gem="diamond" alt="Diamond">
      </div>
      
      <div class="gem-option">
        <img src="../admin/custom_jewellery_admin/gems/ruby-thumb.avif" width="50" class="draggable" draggable="true" data-gem="ruby" alt="Ruby">
      </div>
      
      <div class="gem-option">
        <img src="../admin/custom_jewellery_admin/gems/emerald-thumb.avif" width="50" class="draggable" draggable="true" data-gem="emerald" alt="Emerald">
      </div>
    </div>

    <!-- Preview Section -->
    <div class="preview">
      <div class="preview-header">
        <h2>Jewellery Preview</h2>
        <p class="text-danger">Drop Here ↓</p>
      </div>
      
      <div class="main-preview" id="dropArea">
        <?php
          if (!empty($gem) && !empty($body_id)) {
            // jewellery_variants table se gem+body combination ki images
            $query = "SELECT * FROM jewellery_variants WHERE gem='$gem' AND body_id='$body_id' ORDER BY position ASC";
            $sql = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($sql)) {
              $images[] = "../admin/" . $data['images'];
            }
            
            if (!empty($images)) {
              $position = $_GET['position'] ?? 0;
              $mainImage = $images[$position] ?? $images[0];
              echo '<img id="mainImage" src="' . $mainImage . '" alt="Jewelry View">';
            } else {
              echo '<div class="drop-hint">
                      <i class="fas fa-gem"></i>
                      No images found for this gem combination
                    </div>';
            }
            
          } elseif (!empty($body_id)) {
            // jewellery_bodies table se sirf body image (no gem)
            $query = "SELECT * FROM jewellery_bodies WHERE id='$body_id'";
            $sql = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($sql);
            if ($data) {
                $mainImage = "../admin/" . $data['body_image'];
                echo '<img id="mainImage" src="' . $mainImage . '" alt="Jewelry Body View">';
            }
            
          } else {
            echo '<div class="drop-hint">
                    <i class="fas fa-hand-holding-heart"></i>
                    Drag & drop a gemstone here to customize
                  </div>';
          }
        ?>
      </div>

      <div class="thumbs">
        <?php
          if (!empty($images)) {
            foreach ($images as $index => $img) {
              $activeClass = ($index == 0) ? 'active' : '';
              echo '<img src="' . $img . '" class="' . $activeClass . '" onclick="setPreview(this.src, this)">';
            }
          } else {
            echo '<div style="text-align: center; color: #999; padding: 20px;">No additional views available</div>';
          }
        ?>
      </div>

      <!-- Action Buttons -->
      <div class="action-buttons">
        <button id="downloadBtn" class="btn-secondary" onclick="downloadImage()" <?php echo (empty($body_id)) ? 'disabled' : ''; ?>>
          <i class="fas fa-download"></i>
          <span>Download</span>
        </button>
        
        <?php if (!empty($body_id)): ?>
        <form  action="../cart/cartcrud.php" method="POST" style="margin: 0;">
          <input type="hidden" id="currentImage" name="product_image" value="">
          <input type="hidden" name="product_name" value="Customized jewellery">
          <input type="hidden" name="product_price" value="1500">
          <input type="hidden" name="quantity" value="1">
          
          <input type="submit" class="btn-primary" name="submit" value="Add To Cart">
 </form>
        <?php else: ?>
        <button class="btn-primary" disabled>
          <i class="fas fa-shopping-cart"></i>
          <span>Add to Cart</span>
        </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Message container for notifications -->
<div id="messageContainer"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script>
  const dropArea = document.getElementById("dropArea");
  const draggables = document.querySelectorAll(".draggable");
  let draggedGem = "";

  // Get current parameters
  function getCurrentParams() {
    const urlParams = new URLSearchParams(window.location.search);
    return {
      bodyId: urlParams.get("body_id"),
      gem: urlParams.get("gem") || '',
      position: urlParams.get("position") || 0
    };
  }

  // Show message notification
  function showMessage(text, type = 'success') {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.textContent = text;
    
    document.getElementById('messageContainer').appendChild(messageDiv);
    
    setTimeout(() => messageDiv.classList.add('show'), 100);
    
    setTimeout(() => {
      messageDiv.classList.remove('show');
      setTimeout(() => messageDiv.remove(), 300);
    }, 3000);
  }

  // Update form with current selection data
  function updateCartData() {
    const params = getCurrentParams();
    const mainImage = document.getElementById('mainImage');
    
    // Update hidden inputs with current values
    document.getElementById('currentImage').value = mainImage ? mainImage.src : '';
    document.getElementById('currentGem').value = params.gem;
    document.getElementById('currentPosition').value = params.position;
    
    // Update product name to include current selection
    const productNameInput = document.querySelector('input[name="product_name"]');
    if (productNameInput) {
      const gemText = params.gem ? ` - Gem: ${params.gem}` : ' - No Gem';
      const newProductName = `Custom Jewellery - Body ID: ${params.bodyId}${gemText} - Position: ${params.position}`;
      productNameInput.value = newProductName;
    }
  }

  // Download functionality
  function downloadImage() {
    const params = getCurrentParams();
    
    if (!params.bodyId) {
      showMessage('Please select a jewelry design first', 'error');
      return;
    }

    const mainImage = document.getElementById('mainImage');
    if (!mainImage || !mainImage.src) {
      showMessage('No image to download', 'error');
      return;
    }

    const downloadBtn = document.getElementById('downloadBtn');
    const originalContent = downloadBtn.innerHTML;
    
    // Show loading state
    downloadBtn.innerHTML = '<div class="spinner"></div><span>Downloading...</span>';
    downloadBtn.disabled = true;

    // Create a temporary link to download the image
    const link = document.createElement('a');
    link.href = mainImage.src;
    
    // Generate filename
    const gemName = params.gem ? params.gem : 'no-gem';
    const filename = `jewelry-${params.bodyId}-${gemName}-position-${params.position}.jpg`;
    link.download = filename;
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);

    // Reset button
    setTimeout(() => {
      downloadBtn.innerHTML = originalContent;
      downloadBtn.disabled = false;
      showMessage('Image downloaded successfully!', 'success');
    }, 1000);
  }

  // Update form image value when preview changes
  function updateFormImage(imageSrc) {
    // This function is no longer needed as we handle it differently
    // Keeping for backward compatibility
  }

  // Existing drag and drop functionality
  draggables.forEach(img => {
    img.addEventListener("dragstart", (e) => {
      draggedGem = e.target.dataset.gem;
      e.target.closest('.gem-option').style.opacity = "0.5";
    });

    img.addEventListener("dragend", (e) => {
      e.target.closest('.gem-option').style.opacity = "1";
    });
  });

  dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("drag-over");
  });

  dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("drag-over");
  });

  dropArea.addEventListener("drop", () => {
    dropArea.classList.remove("drag-over");
    const params = getCurrentParams();

    if (params.bodyId && draggedGem !== undefined) {
      // When gem is changed, position resets to 0
      window.location.href = `custom_jewellery.php?body_id=${params.bodyId}&gem=${draggedGem}&position=0`;
    }
  });

  function setPreview(src, clickedThumb) {
    document.getElementById('mainImage').src = src;

    document.querySelectorAll('.thumbs img').forEach((img, index) => {
      img.classList.remove('active');
      if (img.src === src) {
        img.classList.add('active');
        const params = new URLSearchParams(window.location.search);
        params.set('position', index);
        window.history.replaceState({}, '', `${location.pathname}?${params}`);
        
        // Update form data when preview changes
        updateFormDataOnPreviewChange(src, index);
      }
    });
  }

  // Update form data when user changes preview
  function updateFormDataOnPreviewChange(imageSrc, position) {
    const params = getCurrentParams();
    
    // Update hidden form fields
    document.getElementById('currentImage').value = imageSrc;
    document.getElementById('currentPosition').value = position;
    
    // Update product name
    const productNameInput = document.querySelector('input[name="product_name"]');
    if (productNameInput) {
      const gemText = params.gem ? ` - Gem: ${params.gem}` : ' - No Gem';
      const newProductName = `Custom Jewellery - Body ID: ${params.bodyId}${gemText} - Position: ${position}`;
      productNameInput.value = newProductName;
    }
  }

  // Update button states when page loads
  window.addEventListener('DOMContentLoaded', () => {
    const params = getCurrentParams();
    const position = parseInt(params.position) || 0;
    const thumbs = document.querySelectorAll('.thumbs img');

    if (thumbs[position]) {
      thumbs.forEach(img => img.classList.remove('active'));
      thumbs[position].classList.add('active');
      const mainImage = document.getElementById('mainImage');
      if (mainImage) {
        mainImage.src = thumbs[position].src;
      }
    }

    // Initialize form with current data
    const mainImage = document.getElementById('mainImage');
    if (mainImage && mainImage.src) {
      document.getElementById('currentImage').value = mainImage.src;
      document.getElementById('currentGem').value = params.gem;
      document.getElementById('currentPosition').value = params.position;
      
      // Set initial product name
      const productNameInput = document.querySelector('input[name="product_name"]');
      if (productNameInput && params.bodyId) {
        const gemText = params.gem ? ` - Gem: ${params.gem}` : ' - No Gem';
        const newProductName = `Custom Jewellery - Body ID: ${params.bodyId}${gemText} - Position: ${params.position}`;
        productNameInput.value = newProductName;
      }
    }

    // Enable/disable buttons based on whether we have a design selected
    const hasDesign = params.bodyId;
    const downloadBtn = document.getElementById('downloadBtn');
    
    downloadBtn.disabled = !hasDesign;
  });
</script>

<?php include('../includes/footer.php')?>