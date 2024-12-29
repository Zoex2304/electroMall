import { applyComp } from '../../../../controllers/getComp.js'
async function initialize() {

  const component = [
    { placeholder: "placeholder-storeVoucer", path: "/themarketplace/assets/component/storeDiscount.php" },
    { placeholder: "placeholder-themarketplaceVoucer", path: "/themarketplace/assets/component/themarketplaceDiscount.php" },
    { placeholder: "placeholder-payment", path: "/themarketplace/assets/component/payment.php" },
    { placeholder: "placeholder-address", path: "/themarketplace/assets/component/address.php" },
    { placeholder: "placeholder-newaddress", path: "/themarketplace/assets/component/addnewaddress.php" },
  ]

  const componentsLoaded = await Promise.all(
    component.map(({ placeholder, path }) => renderComp(placeholder, path))
  )

  if (componentsLoaded.every(loaded => !loaded)) return;

  const modals = [
    { buttonOpener: "store-voucer", buttonCloser: "closeModalStoreVoucer", wrapper: ".custom-voucher-container" },
    { buttonOpener: "openModalAdress", buttonCloser: "closeModalAddress", wrapper: ".custom-address-container" },
    { buttonOpener: "add-address", buttonCloser: "closeAddnewaddress", wrapper: ".new-address-modal" },
    { buttonOpener: "themarketplace-voucer", buttonCloser: "closeModalThemarketplaceVoucer", wrapper: ".custom-voucher-container-themarketplace" },
    { buttonOpener: "change-payment", buttonCloser: "closeModalPayment", wrapper: ".custom-payment-container" },
  ]

  modals.forEach(({ buttonOpener, buttonCloser, wrapper }) => {
    setUpModal(buttonOpener, buttonCloser, wrapper)
  })

  const paymentContainer = document.querySelector(".container-category-payment")
  paymentContainer?.addEventListener("click", handlePaymentCategoryClick)
}

function setUpModal(buttonOpenerId, buttonCloserId, wrapperId) {
  const wrapper = document.querySelector(wrapperId)
  const backdrop = document.querySelector(".backdrop")

  document.getElementById(buttonOpenerId)?.addEventListener("click", () => useSwitcher(wrapper, backdrop, true))
  document.getElementById(buttonCloserId)?.addEventListener("click", () => useSwitcher(wrapper, backdrop, false))
}

function useSwitcher(wrapperElement, backdropElement, isShow) {
  if (wrapperElement && backdropElement) {
    wrapperElement.style.display = isShow ? "block" : "none"
    backdropElement.style.display = isShow ? "block" : "none"
  }
}

async function handlePaymentCategoryClick(event) {
  const clickedElement = event.target.closest(".category-payment")
  if (!clickedElement) return;

  const methodPayment = clickedElement.dataset.methodpayment
  const paymentCategoryText = clickedElement.querySelector("span")
  if (!paymentCategoryText) return;

  document.querySelectorAll(".container-category-payment span").forEach(textContent => {
    textContent.classList.remove("active")
  })

  paymentCategoryText.classList.add("active")

  await renderComp("placeholder-method", `/themarketplace/assets/component/${methodPayment}.php`)
}

async function renderComp(placeholder, pathFile) {
  const componentLoaded = await applyComp(placeholder, pathFile)
  if (!componentLoaded) {
    console.log(`failed to load component at ${pathFile}`);
    return false
  }
  return true
}


document.addEventListener("DOMContentLoaded",initialize)