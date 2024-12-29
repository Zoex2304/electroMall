
export function validateInput(target = null) {
  const form = document.querySelectorAll('form')
  const inputTypePassword = document.querySelectorAll('input[type="password"]')
  form.forEach(form => {
    form.addEventListener('submit', function (event) {

      const allInputsValid = [...this.elements].every(input => input.type !== "submit" ? input.value.trim() !== "" : true)
      if (!allInputsValid) {
        alert("all inputs must be filled first")
        event.preventDefault();
        return
      }

      if (inputTypePassword.length > 1) {
        const isSamePassword = isSame(inputTypePassword);
        if (!isSamePassword) {
          alert("passwords do not match")
          event.preventDefault();
          return
        }
      }

      if (target) {
        redirect(target)
      }
    })
  })
}

function isSame(target) {
  const values = [...target].map(data => data.value.trim())
  return values[0] === values[1]
}

export function redirect(target) {
  window.location.href = target
}


