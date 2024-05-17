// Function to get the current date in the format YYYY-MM-DD
function getCurrentDate()
{
  var today = new Date();
  var year = today.getFullYear();
  var month = String(today.getMonth() + 1).padStart(2, '0');
  var day = String(today.getDate()).padStart(2, '0');
  var date = year + '-' + month + '-' + day;
  document.getElementById('Reservation_Date').value = date;
  document.getElementById('Reservation_Date').removeAttribute('onclick');
}
// Function to get the current time in the format HH:MM
function getCurrentTime()
{
  var today = new Date();
  var hours = String(today.getHours() + 1).padStart(2, '0');
  var minutes = String(today.getMinutes()).padStart(2, '0');
  var time = hours + ':' + minutes;
  document.getElementById('Reservation_Time').value = time;
  document.getElementById('Reservation_Time').removeAttribute('onclick');
}
