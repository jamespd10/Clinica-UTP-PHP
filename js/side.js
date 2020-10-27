/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("navSidebar").style.width = "250px";
      $("#prev").hide();
      $("#next").hide();
  }
  
  /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("navSidebar").style.width = "0";
    $("#prev").show();
    $("#next").show();
  }