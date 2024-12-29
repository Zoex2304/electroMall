async function fetchComp(file) {
  try {
    const response = await fetch(file);
    if (!response.ok) {
      throw new Error("failed to fetch file")
    }
    return await response.text()
  } catch (e) {
    console.error("error : ", e.message)
    return false
  }
}

export async function applyComp(placeholder, file) {
  try {
    const component = await fetchComp(file)
    const element = document.getElementById(placeholder)

    if (component) {
      element.innerHTML = component
      element.classList.add("fade-in")
      element.addEventListener("animationend", () => {
        element.classList.remove('fade-in')
      })
      return true
    } else {
      console.log("failed to apply component");
      return false;
    }
  } catch (e) {
    console.log("error in  applycomp : ", e);
    return false
  }
}