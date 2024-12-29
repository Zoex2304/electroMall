import { updateTotalPriceCheckOut } from './selectAllCart.js';
import { sendRequestToServer } from './sendRequestToServer.js';

function increment(event, target) {
  event.preventDefault();
  const cartQuantity = target.closest('.cart-quantity');
  const quantity = cartQuantity.querySelector('.quantity');
  let currQuant = parseInt(quantity.value);
  const maxVal = parseInt(quantity.max);
  const basePrice = parseInt(cartQuantity.dataset.price);

  if (currQuant < maxVal) {
    currQuant += 1;
    quantity.value = currQuant;
    
    changePrice(cartQuantity, currQuant); 

    const form = target.closest('.form-card');
    const checkbox = form.querySelector('.select_row');
    if (checkbox.checked) {
      updateTotalPriceCheckOut();
    }
    sendRequestToServer(form);
  }
}

function decrement(event, target) {
  event.preventDefault();
  const cartQuantity = target.closest('.cart-quantity');
  const quantity = cartQuantity.querySelector('.quantity');
  let currQuant = parseInt(quantity.value);
  const minVal = parseInt(quantity.min); 

  if (currQuant > minVal) {
    currQuant -= 1; 
    quantity.value = currQuant;
    changePrice(cartQuantity, currQuant); 

    const form = target.closest('.form-card');
    const checkbox = form.querySelector('.select_row');
    if (checkbox.checked) {
      updateTotalPriceCheckOut()
    }

    sendRequestToServer(form);
  }
}

function reNewPrice(target) {
  const cartQuantity = target.closest('.cart-quantity');
  const quantity = target.value;
  changePrice(cartQuantity, quantity);
}

function formatIDR(target) {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(target);
}

function changePrice(target, quantity) {
  const price = target.querySelector('.cart-price');
  const currPrice = parseInt(target.dataset.price);
  const formattedPrice = formatIDR(currPrice * quantity); 
  price.textContent = formattedPrice;
}

export function changeQuantity() {
  console.log();
  const priceElement = document.querySelectorAll('.cart-price');
  priceElement.forEach(price => {
    price.textContent = formatIDR(parseInt(price.textContent));
  });

  const quantityElement = document.querySelectorAll('.cart-quantity .quantity');
  quantityElement.forEach(quantity => {
    reNewPrice(quantity);
  });

  const incrementButton = document.querySelectorAll('.increment-buttons');
  incrementButton.forEach(button => {
    button.addEventListener('click', function (event) {
      increment(event, this);
    });
  });

  const decrementButton = document.querySelectorAll('.decrement-buttons');
  decrementButton.forEach(button => {
    button.addEventListener('click', function (event) {
      decrement(event, this);
    });
  });
}
