
const $img = document.getElementById('image');
const $imgPreview = document.getElementById('imgPreview');

$img.addEventListener('change', () => {

  const files = $img.files;
  
  if (!files || !files.length) {
    $imgPreview.src = "";
    return;
  }

  $imgPreview.src = URL.createObjectURL(files[0]);
});