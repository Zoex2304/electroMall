<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>
  <link rel="stylesheet" href="/themarketplace/styles/index.css">
  <script src="/themarketplace/assets/js/admin.js" type="module" defer></script>
  <script src="/themarketplace/controllers/checkValue.js" defer></script>

</head>


<body class="admin">
  <main>
    <div id="placeholder-sidebar" class="sidebar-expanded"></div>
    <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
      <div class="container">
        <div class="right-panel">
          <h2>Update Product</h2>
          <form class="form" action="" method="post">
            <label for="select-product-id">Select Product</label>
            <select name="product_id" id="select-product-id" onchange="this.form.submit()">
              <option value="">--select id---</option>
              
            </select>
          </form>

          <?php if ($product ?? ''): ?>
            <form class="form" action="/themarketplace/server/action/admin/updateproduct/index.php" method="post" enctype="multipart/form-data" onsubmit="makeSureIsNotNull(event, 'updateProduct-price', 'updateProduct-stock')">
              <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">

              <label for="product_name">Product Name</label>
              <input type="text" name="product_name" id="product_name" required value="<?= $product['product_name']; ?>">

              <label for="updateProduct-price">Product Price</label>
              <input type="number" name="product_price" id="updateProduct-price" required value="<?= $product['product_price']; ?>">

              <label for="updateProduct_stock">Product Stock</label>
              <input type="number" name="product_stock" id="updateProduct_stock" required value="<?= $product['product_stock']; ?>">

              <label for="category_id">Category</label>
              <select name="category_id" id="category_id" required>
                
              </select>

              <div id="file-upload-container" class="file-upload-container">
               
                <div class="file-upload-icon">⬆️</div>
                <p class="file-upload-text">Choose a file or drag & drop it here.</p>
                <p class="file-upload-formats">JPEG, PNG, PDF, and MP4 formats, up to 50 MB.</p>
                <input type="file" id="addProduct-look" name="product_image" style="display: none;">
                <button type="button" class="browse-button">Browse File</button>
              </div>

              <label for="product_width">Product Width</label>
              <input type="number" name="product_width" id="product_width" required value="<?= $product['product_width']; ?>">

              <label for="product_height">Product Height</label>
              <input type="number" name="product_height" id="product_height" required value="<?= $product['product_height']; ?>">

              <label for="product_unit">Product Unit</label>
              <select name="product_unit" id="product_unit" required>
                <option value="" disabled>select unit</option>
                <option value="kg" <?= $product['product_unit'] == 'kg' ? 'selected' : ''; ?>>Kilogram</option>
                <option value="g" <?= $product['product_unit'] == 'g' ? 'selected' : ''; ?>>Gram</option>
                <option value="ltr" <?= $product['product_unit'] == 'ltr' ? 'selected' : ''; ?>>Liter</option>
                <option value="ml" <?= $product['product_unit'] == 'ml' ? 'selected' : ''; ?>>Milliliter</option>
                <option value="pcs" <?= $product['product_unit'] == 'pcs' ? 'selected' : ''; ?>>Pieces</option>
                <option value="m" <?= $product['product_unit'] == 'm' ? 'selected' : ''; ?>>Meter</option>
                <option value="cm" <?= $product['product_unit'] == 'cm' ? 'selected' : ''; ?>>Centimeter</option>
                <option value="mm" <?= $product['product_unit'] == 'mm' ? 'selected' : ''; ?>>Millimeter</option>
                <option value="ft" <?= $product['product_unit'] == 'ft' ? 'selected' : ''; ?>>Feet</option>
                <option value="in" <?= $product['product_unit'] == 'in' ? 'selected' : ''; ?>>Inches</option>
                <option value="oz" <?= $product['product_unit'] == 'oz' ? 'selected' : ''; ?>>Ounce</option>
                <option value="lb" <?= $product['product_unit'] == 'lb' ? 'selected' : ''; ?>>Pound</option>
                <option value="yd" <?= $product['product_unit'] == 'yd' ? 'selected' : ''; ?>>Yard</option>
              </select>

              <label for="product_desc">Product Description</label>
              <textarea name="product_desc" id="product_desc" required><?= htmlspecialchars($product['product_desc']); ?></textarea>

              <div class="action">
                <input type="submit" value="Update">
                <input type="reset" value="Reset">
              </div>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>

</body>

</html>