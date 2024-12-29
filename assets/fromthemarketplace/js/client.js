import { changeBadge } from '../../../../controllers/changeBadge.js';
import { applyComp } from "../../../../controllers/getComp.js";
import { applyNavigate } from "../../../../controllers/navigate.js";

async function initializeNav() {
  await applyComp("placeholder-navbar", " /themarketplace/assets/component/navBar.php")
  await changeBadge("navbadge", "nav_form")
  applyNavigate(
    "/themarketplace/client/main/home/index.php",
    "/themarketplace/client/main/home/index.php",
    "/themarketplace/client/main/cart/index.php",
    "/themarketplace/client/main/profile/index.php",
    "/themarketplace/server/action/logout/index.php"
  )
}
document.addEventListener('DOMContentLoaded', initializeNav)


