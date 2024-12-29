export async function sendRequestToServer(target, action = null) {
  try {
    const requestAction = action || target.action
    const response = await fetch(requestAction, {
      method: 'POST',
      body: new FormData(target)
    })
    
    if (!response.ok) {
      throw new Error(`failed to send request to server : ${response.status} ${response.statusText}`)
    }
    const data = await response.json()
    if (data.success) {
      console.log(`${data.success} ${data.message})}`)
    } else {
      console.log("failed to update quantity");
    }

    return data
  } catch (err) {
    console.log("error : ", err);
  }
}