<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete User</title>
  <link rel="stylesheet" href="/themarketplace/styles/index.css">
  <script src="/themarketplace/assets/js/admin.js" type="module" defer></script>
</head>

<body>
  <main style="position: relative;">
    <div id="placeholder-sidebar" class="sidebar-expanded"></div>
    <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
      <div class="container">
        <div class="right-panel">
          <h2>Delete User</h2>
          <p>Are you sure you want to delete the following users?</p>

          <form class="form" action="/themarketplace/server/action/admin/deleteuser/index.php" method="post">
            <div class="form-group">
              <label for="user_id">Select User to Delete:</label>
              <select name="user_id" id="user_id">
                <option value="">-- Choose a User --</option>
               
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