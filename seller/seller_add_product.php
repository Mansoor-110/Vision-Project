<?php include('../includes/header.php'); ?> 
<?php include('seller_sidebar.php'); ?>   

<style>
    .form-container {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(128, 0, 32, 0.12);
        border: 2px solid rgba(128, 0, 32, 0.1);
        position: relative;
        overflow: hidden;
        margin-top: 20px;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        font-size: 16px;
        font-weight: 600;
        color: #2c2c2c;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #800020;
        font-size: 18px;
    }

    .form-input,
    .form-select,
    .form-textarea {
        padding: 15px 20px;
        border: 2px solid rgba(128, 0, 32, 0.2);
        border-radius: 12px;
        font-size: 16px;
        font-family: 'Georgia', serif;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        color: #2c2c2c;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #800020;
        box-shadow: 0 0 0 4px rgba(128, 0, 32, 0.1);
        background: #ffffff;
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-select {
        cursor: pointer;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #999;
        font-style: italic;
    }

    .file-upload-area {
        border: 3px dashed rgba(128, 0, 32, 0.3);
        border-radius: 15px;
        padding: 40px;
        text-align: center;
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(160, 0, 42, 0.05) 100%);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .file-upload-area:hover {
        border-color: #800020;
        background: rgba(128, 0, 32, 0.08);
    }

    .file-upload-icon {
        font-size: 48px;
        color: #800020;
        margin-bottom: 15px;
    }

    .file-upload-text {
        font-size: 18px;
        color: #2c2c2c;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .file-upload-subtext {
        font-size: 14px;
        color: #666;
    }

    .file-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .image-preview {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .preview-item {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.1);
    }

    .preview-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .preview-remove {
        position: absolute;
        top: 8px;
        right: 8px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        color: #800020;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .preview-remove:hover {
        background: #800020;
        color: #ffffff;
    }

    .price-input-group {
        display: flex;
        align-items: center;
        position: relative;
    }

    .price-currency {
        position: absolute;
        left: 15px;
        color: #800020;
        font-weight: 600;
        font-size: 16px;
        z-index: 1;
    }

    .price-input {
        padding-left: 45px;
    }

    .form-buttons {
        display: flex;
        gap: 20px;
        justify-content: flex-end;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid rgba(128, 0, 32, 0.1);
    }

    .btn {
        padding: 15px 30px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: 'Georgia', serif;
    }

    .btn-primary {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: #ffffff;
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(128, 0, 32, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
        color: #2c2c2c;
        border: 2px solid rgba(128, 0, 32, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(128, 0, 32, 0.05);
        color: #800020;
        border-color: #800020;
    }

    .required-field::after {
        content: "*";
        color: #d32f2f;
        margin-left: 4px;
    }

    .form-hint {
        font-size: 14px;
        color: #666;
        margin-top: 5px;
        font-style: italic;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 25px 20px;
        }

        .form-buttons {
            flex-direction: column;
        }

        .file-upload-area {
            padding: 30px 20px;
        }
    }

    /* Focus states for accessibility */
    .btn:focus,
    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: 3px solid rgba(128, 0, 32, 0.5);
        outline-offset: 2px;
    }
</style>

<div class="main-content">
    <div class="welcome-header">
        <div class="welcome-text">
            <h1>Add New Product</h1>
            <p>Create a listing for your product and reach more customers</p>
        </div>
        <div class="profile-avatar">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <div class="form-container">
        <form id="addProductForm" action="../admin/product_crud.php" method="POST" enctype="multipart/form-data">
            <div class="form-grid">
              
                <div class="form-group">
                    <label class="form-label required-field">
                        <i class="fas fa-tag"></i>
                        Product Name
                    </label>
                    <input type="text" name="product_name" class="form-input" placeholder="Enter product name" required>
                    <div class="form-hint">Choose a clear, descriptive name for your product</div>
                </div>

                <div class="form-group">
                    <label class="form-label required-field">
                        <i class="fas fa-list"></i>
                        Category
                    </label>
                    <select name="product_category" id="category" class="form-select" onchange="updateSubcategories()" required>
                        <option value="">Select Category</option>
                        <option value="Jewellery">Jewellery</option>
                        <option value="Cosmetics">Cosmetics</option>
                        <option value="Beauty Tools">Beauty Tools</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required-field">
                        <i class="fas fa-sitemap"></i>
                        Sub-Category
                    </label>
                    <select name="product_subcategory" id="subcategory" class="form-select" required>
                        <option value="">Select Subcategory</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required-field">
                        <i class="fas fa-dollar-sign"></i>
                        Price
                    </label>
                    <div class="price-input-group">
                        <span class="price-currency">$</span>
                        <input type="number" name="product_price" class="form-input price-input" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                    <div class="form-hint">Set a competitive price for your product</div>
                </div>
                <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <input type="hidden" name="seller_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <input type="hidden" name="seller_name" value="<?php echo $_SESSION['store_name']?>">



                <div class="form-group full-width">
                    <label class="form-label required-field">
                        <i class="fas fa-align-left"></i>
                        Product Description
                    </label>
                    <textarea name="product_description" class="form-textarea" placeholder="Describe your product in detail. Include key features, benefits, and specifications..." required></textarea>
                    <div class="form-hint">Provide detailed information to help customers make informed decisions</div>
                </div>

                <div class="form-group full-width">
                    <label class="form-label required-field">
                        <i class="fas fa-images"></i>
                        Product Images
                    </label>
                    <div class="file-upload-area" onclick="document.getElementById('product_images').click()">
                        <input type="file" id="product_images" name="product_image" class="file-input" accept="image/*" onchange="previewImages(event)">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">Click to upload product image</div>
                        <div class="file-upload-subtext">Drag and drop files here or click to browse (Max 5MB)</div>
                    </div>
                    <div id="image-preview" class="image-preview"></div>
                    <div class="form-hint">Upload high-quality image of your product</div>
                </div>

                
                
            </div>

            <div class="form-buttons">
                <a href="seller.php" class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>
                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Add Product
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Category-Subcategory functionality from the first page
    function updateSubcategories() {
        const category = document.getElementById("category").value;
        const subcategory = document.getElementById("subcategory");

        const subcategories = {
            "Jewellery": ["Necklaces", "Earrings", "Rings", "Bracelets", "Luxury Collection"],
            "Cosmetics": ["Foundation", "Lipstick", "Eyeshadow", "Skincare", "New Arrivals"],
            "Beauty Tools": ["Brushes", "Mirrors", "Accessories"]
        };

        subcategory.innerHTML = "<option value=''>Select Subcategory</option>";

        if (subcategories[category]) {
            subcategories[category].forEach(function(sub) {
                const option = document.createElement("option");
                option.value = sub;
                option.textContent = sub;
                subcategory.appendChild(option);
            });
        }
    }

    function previewImages(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';

        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                alert('File size should not exceed 5MB');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="preview-remove" onclick="removeImage(this)">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                preview.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImage(button) {
        button.parentElement.remove();
        document.getElementById('product_images').value = '';
    }

    // Form validation
    document.getElementById('addProductForm').addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#d32f2f';
                isValid = false;
            } else {
                field.style.borderColor = 'rgba(128, 0, 32, 0.2)';
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields');
        }
    });

    // Auto-generate SKU based on product name
    document.querySelector('input[name="product_name"]').addEventListener('input', function(e) {
        const skuField = document.querySelector('input[name="sku"]');
        if (!skuField.value) {
            const sku = e.target.value
                .toUpperCase()
                .replace(/[^A-Z0-9]/g, '')
                .substring(0, 8) + 
                Math.floor(Math.random() * 1000);
            skuField.placeholder = `Suggested: ${sku}`;
        }
    });

    // Dynamic file upload area interaction
    const uploadArea = document.querySelector('.file-upload-area');
    
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = '#800020';
        this.style.background = 'rgba(128, 0, 32, 0.08)';
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.style.borderColor = 'rgba(128, 0, 32, 0.3)';
        this.style.background = 'linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(160, 0, 42, 0.05) 100%)';
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.borderColor = 'rgba(128, 0, 32, 0.3)';
        this.style.background = 'linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(160, 0, 42, 0.05) 100%)';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('product_images').files = files;
            previewImages({ target: { files } });
        }
    });
</script>

</div>
<?php include('../includes/footer.php'); ?>