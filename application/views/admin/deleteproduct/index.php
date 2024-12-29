<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Product</title>
  <link rel="stylesheet" href="/themarketplace/styles/index.css">
  <script src="/themarketplace/assets/js/admin.js" type="module" defer></script>
</head>



<body>
  <main style="position: relative;">
    <div id="placeholder-sidebar" class="sidebar-expanded"></div>
    <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
      <div class="container">
        <div class="right-panel">
          <h2>Delete Product</h2>
          <p>Are you sure you want to delete the following product?</p>

          <form class="form" action="/themarketplace/server/action/admin/deleteproduct/index.php" method="post">
            <div class="form-group">
              <label for="product_id">Select Product to Delete:</label>
              <select name="product_id" id="product_id">
                <option value="">-- Choose a product --</option>
                
              </select>
            </div>

            <div class="form-group">
              <label for="delete_all">
                <input type="radio" name="delete_all" id="delete_all" value="1"> Delete All Categories
              </label>
            </div>


            <div class="action">
              <input type="submit" value="Delete">
              <input type="reset" value="Reset">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>