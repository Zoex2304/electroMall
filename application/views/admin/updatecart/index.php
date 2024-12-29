<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Cart</title>
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
          <h2>Update Cart</h2>

          <form action="" class="form" method="post">
            <label for="cart_id">Select Cart Id</label>
            <select id="cart_id" name="cart_id" required onchange="this.form.submit()">
              <option value="">-- Select cart --</option>
             
            </select>
          </form>

          <?php if ($cartSelected ?? ''): ?>
            <form class="form" action="/themarketplace/server/action/admin/updatecart/index.php" method="post" onsubmit="makeSureIsNotNull(event,'addProduct-price','addProduct-stock')">
              <input type="hidden" value="<?= $cart_id; ?>" name="cart_id">
              <input type="hidden" value="<?= $user_role; ?>" name="user_role">
              <label for="user_id">User</label>
              <select id="user_id" name="user_id" required>
                <option value="">-- Select User --</option>
                <?php while ($row = $user->fetch_assoc()): ?>
                  <option value="<?= $row['user_id']; ?>" <?= $cart_id === $cartSelected['cart_id'] ? 'selected' : ''; ?>><?= $row['user_id']; ?> - <?= $row['user_name']; ?></option>
                <?php endwhile ?>
              </select>

              <label for="product_id">Product</label>
              <select id="product_id" name="product_id" required>
                <option value="">-- Select Product --</option>
                <?php while ($row = $product->fetch_assoc()): ?>
                  <option value="<?= $row['product_id']; ?>" <?= $cart_id === $cartSelected['cart_id'] ? 'selected' : ''; ?>><?= $row['product_id']; ?> - <?= $row['product_name']; ?></option>
                <?php endwhile ?>
              </select>

              <label for="addProduct-price">Cart quantity</label>
              <input value="<?= $cartSelected['cart_quantity']; ?>" type="number" id="cartQuantity" name="cart_quantity" placeholder="Enter Cart Quantity" required>

              <div class="action">
                <input type="submit" value="Update">
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