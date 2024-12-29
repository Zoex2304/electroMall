<main style="position: relative;">
  <?= $sidebar; ?>
  <div class="main-view" style="width: 100%; display: flex; justify-content: center;">
    <div class="container">
      <div class="right-panel">
        <h2>Add New Product</h2>
        <form class="form" action="/themarketplace/server/action/admin/addproduct/index.php" method="post" enctype="multipart/form-data" onsubmit="makeSureIsNotNull(event,'addProduct-price','addProduct-stock')">
          <label for="addProduct-height">User id</label>
          <select id="addProduct-unit" name="user_id" required>
            <option value="" disabled selected>Select unit</option>
            <option value="USR0004">azril</option>
            <option value="USR0004">rizal</option>
            <option value="USR0004">sujatmiko</option>
            <option value="USR0004">satrio</option>
            <option value="USR0004">bayu</option>
            <option value="USR0004">abdillah</option>
          </select> 

          <label for="addProduct-price">Order total Price</label>
          <input type="number" id="addProduct-price" name="order_total_price" placeholder="Enter product price" required>

          <label for="addProduct-height">Order status</label>
          <select id="addProduct-unit" name="order_status" required>
            <option value="" disabled selected>Select unit</option>
            <option value="pending">Pending</option>
            <option value="confirmed">confirmed</option>
            <option value="shipped">shipped</option>
            <option value="delivered">delivered</option>
            <option value="canceled">canceled</option>
          </select>

          <div class="action">
            <input type="submit" value="Add">
            <input type="reset" value="Reset">
          </div>
        </form>
      </div>
    </div>
  </div>
</main>