import { applyComp } from "../../../../controllers/getComp.js"

async function initialize(){
  applyComp("forbidden","/themarketplace/assets/component/forbidden.php")
}

document.addEventListener('DOMContentLoaded',initialize)

