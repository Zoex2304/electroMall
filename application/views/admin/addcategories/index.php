<main style="position: relative;">
  <?= $sidebar; ?>
  <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
    <div class="container">
      <div class="right-panel">
        <h2>Add Categories</h2>
        <form class="form" action="/themarketplace/server/action/admin/addcategories/index.php" method="post" onsubmit="makeSureIsNotNull(event,'category_name')">

          <label for="category_name">Category Name</label>
          <input type="text" id="category_name" name="category_name" placeholder="Enter category name" required>

          <label for="category_desc">Category Description</label>
          <textarea id="category_desc" name="category_desc" placeholder="Please fill with stuff related to the categories, separate by commas (e.g., trousers, t-shirt...)"></textarea>

          <div class="action">
            <input type="submit" value="Add">
            <input type="reset" value="Reset">
          </div>
        </form>
      </div>
    </div>
  </div>
</main>