export function updateBadge (newbadge) {
  const badge = document.getElementById('navbadge')
  if(!badge){return}
  return badge.textContent = newbadge
}