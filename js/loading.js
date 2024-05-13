var body = document.getElementById('body');
var bgImage = document.getElementById('bgImage');
var spinner = document.getElementById('spinner');
body = load();
function load() {
  setTimeout(1000);
  spinner.classList.add('d-none');
  bgImage.classList.remove('visually-hidden');
};