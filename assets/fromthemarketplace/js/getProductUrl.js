export function getProductFromUrl(urlParams) {
  const product = urlParams.get("product")
  return product
}