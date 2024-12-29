<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="/themarketplace/styles/index.css">
  <script src="/themarketplace/assets/js/admin.js" type="module" defer></script>
  <script src="/themarketplace/controllers/checkValue.js" defer></script>
</head>



<body>
  <main style="position: relative;">
    <div id="placeholder-sidebar" class="sidebar-expanded"></div>
    <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
      <div class="container">
        <div class="right-panel">
          <h2>Add New Product</h2>
          <form class="form" action="/themarketplace/server/action/admin/addproduct/index.php" method="post" enctype="multipart/form-data" onsubmit="makeSureIsNotNull(event,'addProduct-price','addProduct-stock')">
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>

            <label for="addProduct-price">Product Price (Rp)</label>
            <input type="number" id="addProduct-price" name="product_price" placeholder="Enter product price" required>

            <label for="addProduct-stock">Product Stock</label>
            <input type="number" id="addProduct-stock" name="product_stock" placeholder="Enter stock quantity" required>

            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
              <option value="">-- Select Category --</option>
             
            </select>

            <label for="addProduct-look">Product Look</label>
            <div id="file-upload-container" class="file-upload-container">
              <img id="product-image-preview" style="margin-left: auto; width: 300px;"
                alt="Current Product Image"
                src=""
                style="max-width: 100px; max-height: 100px; display: block; margin-bottom: 10px;">
              <div class="file-upload-icon">⬆️</div>
              <p class="file-upload-text"></p>
              <p class="file-upload-formats">JPEG, PNG, PDF, and MP4 formats, up to 50 MB.</p>
              <input type="file" id="addProduct-look" name="product_image" style="display: none;">
              <button type="button" class="browse-button">Browse File</button>
            </div>

            <label for="addProduct-width">Product width</label>
            <input type="number" id="addProduct-width" name="product_width" placeholder="Enter Width" required>

            <label for="addProduct-height">Product Height</label>
            <input type="number" id="addProduct-height" name="product_height" placeholder="Enter Height" required>

            <label for="addProduct-height">Product Unit</label>
            <select id="addProduct-unit" name="product_unit" required>
              <option value="" disabled selected>Select unit</option>
              <option value="kg">Kilogram</option>
              <option value="g">Gram</option>
              <option value="ltr">Liter</option>
              <option value="ml">Milliliter</option>
              <option value="pcs">Pieces</option>
              <option value="m">Meter</option>
              <option value="cm">Centimeter</option>
              <option value="mm">Millimeter</option>
              <option value="ft">Feet</option>
              <option value="in">Inches</option>
              <option value="oz">Ounce</option>
              <option value="lb">Pound</option>
              <option value="yd">Yard</option>

            </select>


            <label for="addProduct-desc">Product Description</label>
            <textarea id="addProduct-desc" name="product_desc" placeholder="Enter product description"></textarea>

            <div class="action">
              <input type="submit" value="Add">
              <input type="reset" value="Reset">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>