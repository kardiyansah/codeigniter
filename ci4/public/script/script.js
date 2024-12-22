function previewImage() {
  const inputCover = document.querySelector('#cover');
  const imgCover = document.querySelector('.img-preview');
  
  const fileCover = new FileReader();
  fileCover.readAsDataURL(inputCover.files[0]);
  
  fileCover.onload = function(e) {
    imgCover.src = e.target.result;
  }
}