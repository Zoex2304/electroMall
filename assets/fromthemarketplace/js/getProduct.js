
export function getProduct(selector) {
  const product = document.querySelectorAll(selector)
  return [...product].map(product => ({...product.dataset}))
}
