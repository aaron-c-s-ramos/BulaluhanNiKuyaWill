// Function to download error message as screenshot
function downloadError(id)
{
  // Get the element with the provided ID
  var id = document.getElementById(id);

  // Use html2canvas to capture the screenshot of the element
  html2canvas(id).then(function(canvas)
  {
    // Convert the canvas to a data URL representing a PNG image
    var screenshotImage = canvas.toDataURL("image/png");

    // Create a new anchor link for downloading
    var downloadLink = document.createElement('a');

    // Set the href of the download link to the screenshot data URL
    downloadLink.href = screenshotImage;

    // Generate timestamp for the filename
    var now = new Date();
    var timestamp = now.getFullYear() + '-' + (now.getMonth()+1) + '-' + now.getDate() + '_' + now.getHours() + '-' + now.getMinutes() + '-' + now.getSeconds();
    
    // Set filename with timestamp
    downloadLink.download = 'Error_' + timestamp + '.png';

    // Append the download link to the body temporarily
    document.body.appendChild(downloadLink);

    // Trigger the click event on the download link to start the download
    downloadLink.click();

    // Remove the download link from the body after the download starts
    document.body.removeChild(downloadLink);
  });
}