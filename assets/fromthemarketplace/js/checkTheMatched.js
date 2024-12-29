export function checkTheMatched(selector, matchedId) {
  const elements = [...document.querySelectorAll(selector)]
  elements.forEach(element => {
    if (matchedId.includes(element.dataset.productid)) {
      element.checked = true
    }
  })
}