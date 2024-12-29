import { applyNavigate } from "/electroMall/assets/fromthemarketplace/js/navigate.js";
// import { fileTransfer } from "/electroMall/assets/fromthemarketplace/js/controllers/previewImage.js";
import { sidebarAppear } from "/electroMall/assets/fromthemarketplace/js/sidebarAnima.js";

async function initialize() {
 

  applyNavigate(
    "/electroMall/client/main/admin/dashboard/index.php",
    "/electroMall/client/main/admin/dashboard/addproduct/index.php",
    "/electroMall/client/main/admin/dashboard/updateProduct/index.php",
    "/electroMall/client/main/admin/dashboard/deleteproduct/index.php",
    "/electroMall/client/main/admin/dashboard/addcategories/index.php",
    "/electroMall/client/main/admin/dashboard/updatecategories/index.php",
    "/electroMall/client/main/admin/dashboard/deletecategories/index.php",
    "/electroMall/client/main/admin/dashboard/addcart/index.php",
    "/electroMall/client/main/admin/dashboard/updatecart/index.php",
    "/electroMall/client/main/admin/dashboard/deletecart/index.php",
    "/electroMall/client/main/admin/dashboard/updateuser/index.php",
    "/electroMall/client/main/admin/dashboard/deleteuser/index.php",
    "/electroMall/client/main/admin/dashboard/orderlist/index.php",
    "/electroMall/client/main/admin/dashboard/cartmonitoring/index.php",
    "/electroMall/client/main/admin/dashboard/usermanagement/index.php",
  );

  sidebarAppear();
  // fileTransfer();
}

document.addEventListener('DOMContentLoaded', initialize);
