<main style="position: relative;">
  <?= $sidebar; ?>
  <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
    <div class="container">
      <div class="right-panel">
        <h2>Add New Cart</h2>
        <form class="form" action="/themarketplace/server/action/admin/addcart/index.php" method="post" onsubmit="makeSureIsNotNull(event,'addProduct-price','addProduct-stock')">

          <label for="user_id">User</label>
          <select id="user_id" name="user_id" required>
            <option value="">-- Select User --</option>

          </select>

          <label for="product_id">Product</label>
          <select id="product_id" name="product_id" required>
            <option value="">-- Select Product --</option>

          </select>

          <label for="addProduct-price">Cart quantity</label>
          <input type="number" id="cartQuantity" name="cart_quantity" placeholder="Enter Cart Quantity" required>

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