export function getDir(path){
  return path.substring(path.lastIndexOf('/',path.lastIndexOf('/') - 1) + 1,path.lastIndexOf('/'))
}
export function getFile(path){
  return path.substring(path.lastIndexOf('/',path.lastIndexOf('/')) + 1)
}