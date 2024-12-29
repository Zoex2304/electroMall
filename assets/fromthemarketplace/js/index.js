import { applyComp } from "../../../../controllers/getComp.js";
import { applyNavigate } from "../../../../controllers/navigate.js";
import { fileTransfer } from "../../../../controllers/previewImage.js";
import { sidebarAppear } from "../../../../controllers/sidebarAnima.js";

async function initialize() {
  await applyComp("placeholder-sidebar", " /themarketplace/assets/component/sideBar.php")
  applyNavigate(
    "/themarketplace/client/main/admin/dashboard/index.php",
    "/themarketplace/client/main/admin/dashboard/addproduct/index.php",
    "/themarketplace/client/main/admin/dashboard/updateProduct/index.php",
    "/themarketplace/client/main/admin/dashboard/deleteproduct/index.php",
    "/themarketplace/client/main/admin/dashboard/addcategories/index.php",
    "/themarketplace/client/main/admin/dashboard/updatecategories/index.php",
    "/themarketplace/client/main/admin/dashboard/deletecategories/index.php",
    "/themarketplace/client/main/admin/dashboard/addcart/index.php",
    "/themarketplace/client/main/admin/dashboard/updatecart/index.php",
    "/themarketplace/client/main/admin/dashboard/deletecart/index.php",
    "/themarketplace/client/main/admin/dashboard/updateuser/index.php",
    "/themarketplace/client/main/admin/dashboard/deleteuser/index.php",
    "/themarketplace/client/main/admin/dashboard/orderlist/index.php",
    "/themarketplace/client/main/admin/dashboard/cartmonitoring/index.php",
    "/themarketplace/client/main/admin/dashboard/usermanagement/index.php",
  )
  sidebarAppear();
  fileTransfer();
}
document.addEventListener('DOMContentLoaded', initialize)


