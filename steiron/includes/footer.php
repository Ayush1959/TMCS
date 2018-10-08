
<footer class="col-md-12 footer_main">

    <div class="container">
        <div class="row">

            <div class="col-md-3 footer-nav" data-aos="fade-in" data-aos-duration="1000">


                    <h3 class="position-relative mb-3 toggle"> Quick links <span class="float-right plus d-lg-none"></span></h3>
                    <div>
                    <a href="index.php" class="d-block mb-1"> Home </a>
                    <a href="about.php" class="d-block mb-1"> About Steiron </a>
                    <a href="products.php" class="d-block mb-1">Products </a>
                    <a href="contact.php" class="d-block mb-1">  Contact us</a>
                </div>
            </div>



            <div class="col-md-3 footer-nav pl-md-5" data-aos="fade-in" data-aos-duration="1600">

                    <h3 class="position-relative mb-3 toggle">Divisions <span class="float-right plus d-lg-none"></span></h3>
                    <div>
                        <p class="mb-1"><a href="#">Iron &amp; Steel</a></p>
                        <p class="mb-1"><a href="#">Building Meterials</a></p>
                        <p class="mb-1"><a href="#">Oil &amp; Gas</a></p>
                        <p class="mb-1"><a href="#">Chemicals</a></p>
                        <p class="mb-1"><a href="#">Commodities</a></p>
                        <p class="mb-1"><a href="#">Service &amp; Maintenance</a></p>
                        <p class="mb-1"><a href="#">Consultancy</a></p>

                    </div>


            </div>

            <div class="col-md-4 footer-nav" data-aos="fade-in" data-aos-duration="1300">

                    <h3 class="position-relative mb-3 toggle">Corporate Office <span class="float-right plus d-lg-none"></span></h3>
                    <div>
                    <p class="mb-1">391B Orchard Road</p>
                    <p class="mb-1">#23-01, Ngee Ann City Tower B</p>
                    <p class="mb-1">Singapore 238874</p>
                    <p class="mb-1">Tel: +65 6240 6950</p>
                    <p class="mb-1">Fax: +65 6832 8018 | 6491 5866</p>
                    <p class="mb-1">Reach us: steiron@steiron.com</p>
                </div>
            </div>

            <div class="col-md-2 footer-nav pl-md-0 pr-md-0" data-aos="fade-in" data-aos-duration="1900">

                    <h3 class="position-relative mb-4"> Get Connected With Us</h3>

                   <a target="_blank" class="mr-2" href="https://www.facebook.com/pages/category/Company/Steiron-PTE-LTD-404248019632856/">
                       <img src="images/fb.svg" class="d-inline socail-media-icon" width="42" />
                   </a>
                   <a target="_blank" href="">
                       <img src="images/tw.svg" class="d-inline socail-media-icon" width="42" />
                   </a>

            </div>


        </div>
    </div>

</footer>
<div class="col-md-12 ftr-btm">

    <div class="container">

        All right reserved by www.steiron.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Created by <span><a href="#"> TMCS </a></span>

    </div>

</div>



<!--      --------------Popup---------------->



<div class="form-popup">
    <div class="container form-wrapper col-11 col-md-9 col-lg-7 col-xl-6">
        <button class="btn close-form">Close</button>
        <form name="my-form" id="my-form" novalidate="novalidate">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="form-title">Enquiry form</h1>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name1_id" name="name">
                </div>
                <div class="form-group col-sm-6">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email1_id" name="email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="something">Enquiry</label>
                    <textarea name="something" class="form-control" id="comments1_id"></textarea>
                </div>
            </div>




           <div id="error_message" class="alert alert-danger"></div>
            <div id="success_message" class="alert alert-success">Message Sent</div>

            <button type="submit" class="btn send-form"> <span class="float-left">Send</span>
                <span id="loader" class="loader float-right"></span>
            </button>

        </form>
    </div>
</div>
<div class="success-message">
    <h1>You success reset this form</h1>
</div>


<!--      --------------Popup---------------->




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')
</script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="js/holder.min.js"></script>




<script>
    $(document).ready(function() {

        $('.open-form').click(function() {
            $('.form-popup').show();
        });
        $('.close-form').click(function() {
            $('.form-popup').hide();
        });

        $('.reset-form').click(function() {
            $('.success-message').show();
            $('#my-form').trigger('reset');

            setTimeout(function() {
                $('.success-message').hide()
            }, 1500);
        });

        $(document).mouseup(function(e) {
            var container = $(".form-wrapper");
            var form = $(".form-popup");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                form.hide();
            }
        });


    });
</script>


<script>
    $(function() {
        function init() {
            $('[data-behaviour="toggle-menu-icon"]').on('click', toggleMenuIcon);
            $('[data-behaviour="toggle-link-icon"]').on('click', toggleSubMenu);
        };

        function toggleMenuIcon() {
            $(this).toggleClass('menu-icon--open');
            $('[data-element="toggle-nav"]').toggleClass('nav--active');
        };

        function toggleSubMenu() {
            $(this).toggleClass('nav__link--plus nav__link--minus');
            $('[data-behaviour="toggle-sub-menu"]').slideToggle('nav__sub-list--active');
        };

        init()
    });
</script>

<script src="js/aos.js"></script>
<script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });

      setInterval(addItem, 300);

      var itemsCounter = 1;
      var container = document.getElementById('aos-demo');

      function addItem () {
        if (itemsCounter > 0) return;
        var item = document.createElement('div');
        item.classList.add('aos-item');
        item.setAttribute('data-aos', 'fade-up');
        item.innerHTML = '<div class="aos-item__inner"><h3>' + itemsCounter + '</h3></div>';
        container.appendChild(item);
        itemsCounter++;
      }
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js">
</script>
<script src="enquiry-form-post.js">
</script>
<script>
    jQuery(".toggle").click(function(){

		if(jQuery(window).width() < 991){

  		jQuery(".toggle").next().slideUp("fast");



  		jQuery(".toggle").find("span").removeClass("minus").addClass("plus");



  		if(jQuery(this).next().css('display') == 'none'){



			jQuery(this).next().slideDown("fast");

				jQuery(this).find("span").removeClass("plus").addClass("minus");



  }else{

    jQuery(this).next().slideUp("fast");

    	jQuery(this).find("span").removeClass("minus").addClass("plus");



  }}



	});

    // menu active

    $(function(){
        var index = window.location.pathname.split('/')[2]; //change to 1 on production
        $('#navbar ul li').removeClass('activen');
        $('#navbar ul li a[href*="'+ index + '"]').parent().addClass('activen');
    });
</script>


</body>

</html>
