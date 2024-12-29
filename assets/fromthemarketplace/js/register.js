import { getFile } from "./getDir.js";
import { validateInput } from "./validate.js";

document.addEventListener('DOMContentLoaded', () => {
  const filePath = window.location.pathname
  if (getFile(filePath) === "index.php") {
    validateInput("/themarketplace/client/entry/register/completeRegister.php")
  } else {
    validateInput()
  }
})

