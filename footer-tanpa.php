
        <!--================= Footer Section End Here =================-->
        
        <!--================= Scroll to Top Start =================-->
        
        <!--================= Scroll to Top End =================-->

        <!--================= Jquery latest version =================-->
        <script src="assets/js/jquery.min.js"></script>
        <!--================= Modernizr js =================-->
        <script src="assets/js/modernizr-2.8.3.min.js"></script>
        <!--================= Bootstrap js =================-->
        <script src="assets/js/bootstrap.min.js"></script>
        <!--================= Owl Carousel js =================-->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!--================= Magnific Popup =================-->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!--================= Counter up js =================-->
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <!--================= Wow js =================-->
        <script src="assets/js/wow.min.js"></script>                
        <!--================= menus js =================-->
        <script src="assets/js/menus.js"></script>
        <!--================= Plugins js =================-->
        <script src="assets/js/plugins.js"></script> 
        <script src="script.js"></script>       
		<!--================= Main js =================-->
        <script src="assets/js/main.js"></script>
        <script src="https://kit.fontawesome.com/11dd8dbdc4.js" crossorigin="anonymous"></script>
        
        <script>
            function openCity(evt, cityName) {
              var i, x, tablinks;
              x = document.getElementsByClassName("city");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablink");
              for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " w3-red";
            }

            // get the height of the viewport
            var viewportHeight = window.innerHeight;

            // calculate the percentage of the desktop you want to trigger the change
            var scrollPercentage = 70;

            // calculate the scroll position at which the trigger percentage is reached
            var triggerScroll = (viewportHeight / 100) * scrollPercentage;

            // add a scroll event listener to the window object
            window.addEventListener("scroll", function() {
            // check if the current scroll position is greater than or equal to the trigger position
            if (window.pageYOffset >= triggerScroll) {
                // add a class to the .fixed-button element
                document.querySelector(".fixed-button").classList.add("scrolled");
            } else {
                // remove the class from the .fixed-button element
                document.querySelector(".fixed-button").classList.remove("scrolled");
            }
            });

            </script>
    </body>
</html>