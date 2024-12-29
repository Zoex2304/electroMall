import { redirect } from "./validate.js"

export function applyNavigate(...file) {
  const nodeCardsList = document.querySelectorAll('.anchor')
  console.log(nodeCardsList);
  
  nodeCardsList.forEach((card, index) => {
    card.addEventListener('click', function (e) {
      const target = file[index]
      redirect(target)
    })
  })

} 



