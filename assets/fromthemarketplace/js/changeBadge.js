import { sendRequestToServer } from './sendRequestToServer.js';

export async function changeBadge(id_badge, nav_form) {
  try {
    const addToCart = document.getElementById('addToCartForm');
    const addCartResponse = await sendRequestToServer(addToCart);

    if (addCartResponse.success) {
      const badge = document.getElementById(id_badge);
      if (badge) {
        const navForm = document.getElementById(nav_form);
        const badgesValue = await sendRequestToServer(navForm);

        if (badgesValue.success) {
          console.log(badgesValue.badge_count);
          badge.innerHTML = badgesValue.badge_count;
        } else {
          console.log("Failed to update badge count");
        }
      }
    } else {
      console.log("Failed to add product to cart");
    }
  } catch (err) {
    console.error("Error occurred:", err);
  }
}
