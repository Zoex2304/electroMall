import { changeBadge } from '../../../../controllers/changeBadge.js';
import { hashThis } from '../../../../controllers/hash.JS';
import { sendRequestToServer } from '../../../../controllers/sendRequestToServer.js';

function initialize() {
  const buyNow = document.getElementById("buy-now");
  const cartButtons = document.getElementById('addToCart');

  buyNow.addEventListener('click', async (e) => {
    e.preventDefault();
    try {
      const form = document.getElementById("preOrderCart");
      const response = await sendRequestToServer(form, "/themarketplace/server/action/cart/index.php");

      if (response.success) {
        const product = form.dataset.product;
        const hashedProduct = await hashThis(product)
        window.location.href = `/themarketplace/client/main/cart/index.php?product=${hashedProduct}`;
      }
    } catch (err) {
      console.error("An error occurred:", err);
    }
  });

  cartButtons.addEventListener('click', async (e) => {
    e.preventDefault();
    await changeBadge("navbadge", "nav_form");
  });
}


document.addEventListener('DOMContentLoaded', initialize);
