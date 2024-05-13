// Function to display or hide the scroll-to-top button based on scroll position
window.onscroll = function()
{
  scrollFunction();
};
function scrollFunction()
{
  const scrollToTopBtn = document.getElementById("scrollToTopBtn")
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30)
  {
    scrollToTopBtn.style.display = "block";
  }
  else
  {
    scrollToTopBtn.style.display = "none";
  }
}
// Function to scroll to the top of the page smoothly
function scrollToTop()
{
  window.scrollTo(
  {
    top: 0,
    behavior: 'smooth'
  });
}
