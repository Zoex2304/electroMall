import { changeQuantity } from '../../../../controllers/changeQuantityCart.js'
import { checkTheMatched } from '../../../../controllers/checkTheMatched.js'
import { getChecksBoxCheckedElement } from '../../../../controllers/getCheckedChecksBox.js'
import { applyComp } from '../../../../controllers/getComp.js'
import { getDataSetFrom } from '../../../../controllers/getDataSetFrom.js'
import { getProduct } from '../../../../controllers/getProduct.js'
import { getProductFromUrl } from '../../../../controllers/getProductUrl.js'
import { hashThis } from '../../../../controllers/hash.JS'
import { selectAllCart } from '../../../../controllers/selectAllCart.js'


async function initialize() {
  const urlParams = new URLSearchParams(window.location.search)
  const checkOutBar = await applyComp("placeholderCheckOut", " /themarketplace/assets/component/checkout.php")
  if (!checkOutBar) { return }

  if (urlParams.has('product')) {
    const listProductCart = getProduct(".select_row")
    const productIdFromUrl = getProductFromUrl(urlParams)
    const matchedProduct = []

    for (const product of listProductCart) {
      const hashedProduct = await hashThis(product.productid)
      if (hashedProduct === productIdFromUrl) {
        matchedProduct.push(product)
      }
    }
    checkTheMatched(".select_row", matchedProduct[0].productid)
  }

  const checkOutButton = document.getElementById("checkout-button")
  checkOutButton.addEventListener('click', () => {
    const checkedCheckBox = getChecksBoxCheckedElement(".select_row")
    const dataSet = getDataSetFrom(checkedCheckBox)

    const listUpdateData = checkedCheckBox.map(item => {
      const row = item.closest(".row")
      const quantityInput = row.querySelector(".quantity")
      const spanTotalPrice = row.querySelector(".cart-price")
      const quantity = quantityInput ? parseInt(quantityInput.value, 10) || 1 : 1
      const totalPrice = spanTotalPrice ? spanTotalPrice.textContent.trim() : "Rp0"

      return {quantity,totalPrice} 
    })
    
    const updateDataSet = dataSet.map((data, index) => ({ 
      ...data,
      quantity: listUpdateData[index].quantity,
      totalPrice: listUpdateData[index].totalPrice 
    }))

    const queryParams = updateDataSet.map(data => `checkout-item[]=${encodeURIComponent(JSON.stringify(data))}`).join('&')
    window.location.href = `/themarketplace/client/main/checkout/?${queryParams}`
  })

  selectAllCart(".select_row", "select_all")
  changeQuantity()
}



document.addEventListener('DOMContentLoaded', initialize)

