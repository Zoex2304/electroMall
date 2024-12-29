function makeSureIsNotNull(event, ...ids) {
  let isValid = false;
  let typeInputText = false;

  ids.forEach(id => {
    typeInputText = document.getElementById(id).type === 'text'
    let result = document.getElementById(id).value === '';
    if (result) {
      isValid = false;
    } else {
      isValid = true;
    }
  })

  if (!isValid) {
    event.preventDefault();
    alert(!typeInputText ? 'the numeric input is invalid, please fill with something' : 'please dont leave it blank')
    return false;
  }
  return true;
}