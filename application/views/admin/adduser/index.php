<main style="position: relative;">
  <?= $sidebar; ?>
  <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
    <div class="container">
      <div class="right-panel">
        <h2>Add new user</h2>
        <form class="form" action="/themarketplace/server/action/admin/addproduct/index.php" method="post" enctype="multipart/form-data" onsubmit="makeSureIsNotNull(event,'addProduct-price','addProduct-stock')">
          <label for="product_name">User Name</label>
          <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>

          <label for="addProduct-price">User password</label>
          <input type="number" id="addProduct-price" name="product_price" placeholder="Enter product price" required>

          <label for="addProduct-stock">User email</label>
          <input type="number" id="addProduct-stock" name="product_stock" placeholder="Enter stock quantity" required>

          <label for="category_id">User phone number</label>
          <select id="category_id" name="category_id" required>
            <option value="">-- Select Category --</option>
          </select>

          <label for="addProduct-width">User Role</label>
          <input type="number" id="addProduct-width" name="product_width" placeholder="Enter Width" required>

          <label for="addProduct-height">User Birth</label>
          <input type="number" id="addProduct-height" name="product_height" placeholder="Enter Height" required>

          <label for="addProduct-width">User Profile pic</label>
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


          <div class="action">
            <input type="submit" value="Add">
            <input type="reset" value="Reset">
          </div>
        </form>
      </div>
    </div>
  </div>
</main>