export async function hashThis(data) {
  const encoder = new TextEncoder()
  const raw = encoder.encode(data)
  const hashBuffer = await crypto.subtle.digest("SHA-256", raw)
  const hashArr = Array.from(new Uint8Array(hashBuffer))
  return hashArr.map(item => item.toString(16).padStart(2, '0')).join('')
}
