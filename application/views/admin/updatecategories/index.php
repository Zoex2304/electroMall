<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Categories</title>
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
          <h2>Update Categories</h2>
          <form class="form" method="post">
            <label for="select-category-id">Select Category</label>
            <select name="category_id" id="select-category-id" onchange="this.form.submit()">
              <option value="">--- select category ---</option>
             
            </select>
          </form>

          <?php if ($categorySelected ?? ''): ?>
            <form class="form" action="/themarketplace/server/action/admin/updatecategories/index.php" method="post" onsubmit="makeSureIsNotNull(event,'category_name')">
              <input type="hidden" name="category_id" value="<?= $category_id ?>">
              <label for="category_name">Category Name</label>
              <input type="text" id="category_name" name="category_name" value="<?= $categorySelected['category_name']; ?>" required>

              <label for="category_desc">Category Description</label>
              <textarea id="category_desc" name="category_desc" placeholder="Please fill with stuff related to the categories, separate by commas (e.g., trousers, t-shirt...)"><?= $categorySelected['category_desc']; ?></textarea>

              <div class="action">
                <input type="submit" value="Add">
                <input type="reset" value="Reset">
              </div>
            </form>
          <?php endif ?>

        </div>
      </div>
    </div>
  </main>
</body>

</html>