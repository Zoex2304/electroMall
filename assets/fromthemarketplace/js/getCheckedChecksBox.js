export function getChecksBoxCheckedElement(selector){
  const elements = document.querySelectorAll(selector)
  return [...elements].filter(element => element.checked)
}