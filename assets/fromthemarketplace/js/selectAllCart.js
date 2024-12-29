export function selectAllCart(other, target) {
  const selectAll = document.getElementById(target);
  const cartCheckBoxs = document.querySelectorAll(other);

  const updateCart = () => updateSelectedItems(cartCheckBoxs);

  selectAll.addEventListener('click', () => {
    const isChecked = selectAll.checked;
    cartCheckBoxs.forEach(cart => {
      cart.checked = isChecked;
    });
    updateCart();
  });

  cartCheckBoxs.forEach(cart => {
    cart.addEventListener('click', () => {
      updateCart();
    });
  });

  updateCart();
}

export function updateSelectedItems(cartCheckBoxs) {
  const selectedItems = [...cartCheckBoxs].filter(cart => cart.checked);
  const productAndPrice = defineProductAndPrice(selectedItems);
  applyChanges(() => calculateTotal(productAndPrice));
}

export function applyChanges(callback) {
  const totalElement = document.getElementById('total-select-cart');
  if (totalElement) {
    totalElement.innerHTML = `Total ${callback() || 0}`;
  }
}

export function calculateTotal(target) {
  const total = [...target].reduce((currentVal, product) => {
    const quantity = parseInt(product.quantity);
    const productPrice = parseFloat(product.product_price);
    return currentVal + (quantity * productPrice);
  }, 0);
  
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
  }).format(total.toFixed(2));
}

export function defineProductAndPrice(target) {
  const value = [...target].map(item => ({
    product_id: item.getAttribute('data-productid'),
    product_price: parseFloat(item.getAttribute('data-price') || 0),
    quantity: item.closest('.form-card').querySelector('.quantity').value || 0,  
    user_id: item.getAttribute('data-name'),
  }));
  return value;
}

export function updateTotalPriceCheckOut(){
  const checkBoxes = document.querySelectorAll('.select_row:checked')

  const selectedItems = [...checkBoxes].map(checkbox => {
    const quantity = parseInt(checkbox.closest('.row').querySelector('.quantity').value) || 0
    const price = parseFloat(checkbox.dataset.price || 0)
    return {
      product_price: price,
      quantity: quantity
    }
  })

  applyChanges(() => calculateTotal(selectedItems))
}