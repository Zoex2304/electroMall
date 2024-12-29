<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Categories</title>
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
          <h2>Delete Categories</h2>

          <form action="/themarketplace/server/action/admin/deletecategories/index.php" class="form" method="post" autocomplete="off">
            <label for="category_id">Category Id</label>
            <select name="category_id" id="category_id">
              <option value="">--- select category ---</option>
             
            </select>

            <div class="form-group">
              <label id="delete-all" for="delete_all">
                <input value="1" type="radio" name="delete_all" id="delete_all">
                <span>Delete All Categories</span>
              </label>
            </div>

            <div class="action"><input type="submit"><input type="reset"></div>
          </form>
        </div>
      </div>
    </div>
  </main>

</body>

</html>