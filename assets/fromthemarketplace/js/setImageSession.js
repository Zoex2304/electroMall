export async function setImageSession(img,fileName) {
  const request = new Request('/themarketplace/tools/endPointSessionImage.php', {
    method: 'POST',
    credentials: 'same-origin',
    mode: 'cors',
    keepalive: false,
    referrer: 'follow',
    cache: 'default',
    integrity: '',
    headers: {
      'content-type': 'application/json'
    },
    body: JSON.stringify({
      imgSrcPrev: img,
      fileNameSess: fileName
    })
  })

  try {
    const response = await fetch(request);

    if (!response.ok) {
      throw new Error(`failed to set image session => status ${response.status} (${response.statusText})`)
    }

    const data = await response.json()
    data.status = "success" ? console.log("succes set image session") : console.log("error while set session")
  } catch (err) {
    console.error("something wrong happened : ",err.message)
  }

}
