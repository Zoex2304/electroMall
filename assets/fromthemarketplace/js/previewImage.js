import { setImageSession } from './setImageSession.js';

function fillFileUpload(files, element) {
  element.fileUpload.files = files;
  element.textContext.textContent = files[0].name;
  setPlaceholder(files[0]);
}
function draggTransfer(element) {
  const areaEvents = {
    dragover: function (e) {
      e.preventDefault();
      this.classList.add('drag-over');
    },
    dragleave: function (e) {
      e.preventDefault();
      this.classList.remove('drag-over')
    },
    drop: function (e) {
      e.preventDefault();
      fillFileUpload(e.dataTransfer.files, element);
      this.classList.remove('drag-over');
    }
  };
  Object.keys(areaEvents).forEach(eventType => { element.area.addEventListener(eventType, areaEvents[eventType]) })
}
function getElement() {
  const area = document.getElementById('file-upload-container');
  const button = document.querySelector('.browse-button');
  const fileUpload = document.getElementById('addProduct-look');
  const textContext = document.querySelector('.file-upload-text');

  return { area, button, fileUpload, textContext };
}
function browseFeatures(element) {
  const button = element.button;
  const fileUpload = getElement().fileUpload;

  button.onclick = () => {
    fileUpload.click();
  }
  fileUpload.onchange = (e) => {
    fillFileUpload(e.target.files, element);
  }
}
function setPlaceholder(file) {
  const reader = new FileReader();

  reader.onload = (e) => {
    const target = e.target.result;
    const placeholder = document.getElementById('product-image-preview');
    placeholder.src = target;
    setImageSession(target,file.name);
  }
  if (file) {
    reader.readAsDataURL(file)
  }
}
export function fileTransfer() {
  const element = getElement();
  console.log(element);
  draggTransfer(element);
  browseFeatures(element);
}
