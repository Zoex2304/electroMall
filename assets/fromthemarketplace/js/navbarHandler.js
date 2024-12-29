import { applyComp } from "../../../../controllers/getComp.js";
import { applyNavigate } from "../../../../controllers/navigate.js";
import { sendRequestToServer } from '../../../../controllers/sendRequestToServer.js';
import { updateBadge } from '../../../../controllers/updateBadge.js';

async function initialize() {
  const useNavbar = await applyComp("placeholder-navbar", " /themarketplace/assets/component/navBar.php")

  if (!useNavbar) {
    return
  }
  const logoutButton = document.getElementById('logout');
  logoutButton.addEventListener('click', async () => {
    const form = document.getElementById("logoutForm")
    const response = await sendRequestToServer(form)

    if(response.success){
      window.location.href = '/themarketplace/client/entry/login';
    }
  })

  applyNavigate(
    "/themarketplace/client/main/home/index.php",
    "/themarketplace/client/main/home/index.php",
    "/themarketplace/client/main/cart/index.php",
    "/themarketplace/client/main/profile/index.php",
  )


  const navForm = document.getElementById('nav_form')
  if (navForm) {
    const response = await sendRequestToServer(navForm, "/themarketplace/server/action/navbarBadge/index.php")
    if (response.success) {
      updateBadge(response.badge_count)
    }
  }
}


document.addEventListener('DOMContentLoaded', initialize)


