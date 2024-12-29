
export function getDataSetFrom(elements){
  return elements.map(element => ({...element.dataset}))
}