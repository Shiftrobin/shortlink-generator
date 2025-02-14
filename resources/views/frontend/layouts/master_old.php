<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Onestop</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/w3.css">
      <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/frontend')}}/images/apple-icon.html">
      <link rel="icon" type="image/png" href="{{asset('public/frontend')}}/images/favicon.html">
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet"  href="{{asset('public/frontend')}}/css/bootstrap.min.css" rel="stylesheet">
      <!-- bootsnav Stylesheets -->
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/bootsnav.css" type="text/css">
      <!-- Template Main Stylesheets -->
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/milusoft.css" type="text/css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/milusoft-responsive.css" type="text/css">
      <!-- Custom styles for this template -->
      <link href="{{asset('public/frontend')}}/css/style.css" rel="stylesheet">
      <link href="{{asset('public/frontend')}}/css/mobile.css" rel="stylesheet">
      <!-- Font Icons -->
      <link href="{{asset('public/frontend')}}/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="{{asset('public/frontend')}}/css/icofont.css" rel="stylesheet" type="text/css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/owl.carousel.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/owl.theme.css">
      <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/bootstrap-side-modals.css">
      <link rel="preconnect" href="https://fonts.gstatic.com/">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&amp;display=swap" rel="stylesheet">
      <!-- jQuery Library -->
      <script src="{{asset('public/frontend')}}/js/jquery-3.4.1.min.js"></script>
      <!-- Popper js -->
      <script src="{{asset('public/frontend')}}/js/popper.min.js"></script>
      <!-- Bootstrap4 Js -->
      <script src="{{asset('public/frontend')}}/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/style.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/css/searchBar.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <style>
         body {
         font-family: Kollektif;
         }
         .thumb-wrapper{
         box-shadow: 0px 4px 10px rgb(0 0 0 / 30%);
         }
         .h2 {
         color: #000;
         font-size: 26px;
         font-weight: 300;
         text-align: center;
         text-transform: uppercase;
         position: relative;
         margin: 30px 0 80px;
         }
         .h2 b {
         color: #ffc000;
         }
         .h2::after {
         content: "";
         width: 100px;
         position: absolute;
         margin: 0 auto;
         height: 4px;
         background: rgba(0, 0, 0, 0.2);
         left: 0;
         right: 0;
         bottom: -20px;
         }
         carousel {
         margin: 50px auto;
         padding: 0 70px;
         }
         carousel .carousel-item {
         min-height: 330px;
         text-align: center;
         overflow: hidden;
         }
         carousel .carousel-item .img-box {
         height: 160px;
         width: 100%;
         position: relative;
         }
         carousel .carousel-item img {
         max-width: 100%;
         max-height: 100%;
         display: inline-block;
         position: absolute;
         bottom: 0;
         margin: 0 auto;
         left: 0;
         right: 0;
         }
         .carousel .carousel-item h4 {
         font-size: 16px;
         margin: 10px 0;
         }
         .carousel .carousel-item .btn {
         color: #333;
         border-radius: 0;
         font-size: 11px;
         text-transform: uppercase;
         font-weight: bold;
         background: none;
         border: 1px solid #ccc;
         padding: 5px 10px;
         margin-top: 5px;
         line-height: 16px;
         margin-bottom: 10px;
         }
         .carousel .carousel-item .btn:hover, .carousel .carousel-item .btn:focus {
         color: #fff;
         background: #000;
         border-color: #000;
         box-shadow: none;
         }
         .carousel .carousel-item .btn i {
         font-size: 14px;
         font-weight: bold;
         margin-left: 5px;
         }
         .carousel .thumb-wrapper {
         text-align: center;
         }
         .carousel .thumb-content {
         padding: 7px;
         }
         .carousel .item-price {
         font-size: 13px;
         padding: 2px 0;
         }
         .carousel .item-price strike {
         color: #999;
         margin-right: 5px;
         }
         .carousel .item-price span {
         color: #86bd57;
         font-size: 110%;
         }
         carousel .carousel-indicators {
         bottom: -50px;
         }
         .carousel-indicators li, .carousel-indicators li.active {
         width: 10px;
         height: 10px;
         margin: 4px;
         border-radius: 50%;
         border-color: transparent;
         border: none;
         }
         .carousel-indicators li {
         background: rgba(0, 0, 0, 0.6);
         }
         .carousel-indicators li.active {
         background:#FDAD0E;
         }
         .star-rating li {
         padding: 0;
         }
         .star-rating i {
         font-size: 14px;
         color: #ffc000;
         }
         .star-rating{
            margin-top: -20px;
         }
         .delevery_fee{
          margin-top: -20px;
         }
         .custom_card_body{
          margin-top: -20px;
         }
         .notifyjs-corner{
         z-index: 10000 !important;
         }
         /*Mobile Format*/
         @media  only screen and (min-width:320px) and (max-width:768px) {
          .product_mobile_format {
            width: 50%;
          }
          .footer_image{
            width: 50% !important;
            height: 50% !important;
          }
         }
      </style>
      <style type="text/css">
        .badge-info{
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            margin: auto;
            background: #fea913;
            padding: 8px 12px;
            line-height: 1em;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            box-shadow: -8px 7px 7px rgb(0 0 0 / 30%);
        }
        .bestofferbox, .bestsellerbox{
            height:auto;
            background:white;
            padding-bottom:10px;
            font-family:Kollektif
        }
      </style>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
   </head>
   <body>
      <!--pop up modal-->
      <!--end pop up modal-->
      <!--delivery sign up-->
      <div class="row">
         <div class="col-sm-12 text-center">
            <!--pc delivery-->
            <div class="delivery">
               <h5 style="padding:10px;background:#FEA900;width:100%;height:auto;color:white;font-size: 1rem;">
                  Start selling at onestop today!
                  <a href="{{route('vendor.signup')}}">
                  <button style="background:#282828;color:white;margin-left:10px;border:1px solid white;" class="btn btn-dark-gray btn-sm">Sign up</button>
                  </a>
                  <span style="color:white;margin-right:20px;margin-bottom:25px" class="close4">&times;</span>
               </h5>
            </div>
            <!--end pc delivery-->
            <!--mobile delivery-->
            <div class="mobile-delivery">
               <h5 style="padding:10px;background:#FEA900;width:100%;height:50px;color:white;border-radius:px;">
                  <p style="font-size:17px;float:left;padding:8px 0px;">Start selling at onestop today!</p>
                  <a href="{{route('vendor.signup')}}">
                  <button style="background:#282828;color:white;margin-left:px;border:1px solid white;" class="btn btn-dark-gray btn-sm">Sign up</button>
                  </a>
                  <span style="color:white;margin-right:10px;margin-bottom:px" class="close4">&times;</span>
               </h5>
            </div>
            <!--end mobile delivery-->
         </div>
      </div>
      <!-- end delivery sign up-->
      @include('frontend.layouts.header')
      @yield('content')
      @include('frontend.layouts.footer')
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script>
          function calculateDistance(lat1, lon1, lat2, lon2)
          {
              var R = 6371; // km
              var dLat = toRad(lat2-lat1);
              var dLon = toRad(lon2-lon1);
              var lat1 = toRad(lat1);
              var lat2 = toRad(lat2);

              var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                  Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
              var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
              var d = R * c;
              return Math.ceil(d * 0.6);
          }

          // Converts numeric degrees to radians
          function toRad(Value)
          {
              return Value * Math.PI / 180;
          }

          $(document).ready(function (){
              showPosition();
              showDeliveryTime();
              checkoutDeliveryTime();
              $(".order_timer").each(function(i, obj) {
                  var totalTime = $(this).data('time');
                  CountDown(totalTime*60, this);
              });
          });
          function CountDown(duration, display) {
              if (!isNaN(duration)) {
                  var timer = duration, minutes, seconds;

                  var interVal = setInterval(function () {
                      minutes = parseInt(timer / 60, 10);
                      seconds = parseInt(timer % 60, 10);

                      minutes = minutes < 10 ? "0" + minutes : minutes;
                      seconds = seconds < 10 ? "0" + seconds : seconds;

                      $(display).text(minutes + "m : " + seconds + "s");
                      if (--timer < 0) {
                          $(display).text("Rider is near by");
                          // timer = duration;
                          // SubmitFunction();
                          // $(display).empty();
                          // clearInterval(interVal)
                      }
                  }, 1000);
              }
          }

          function showPosition() {
              if(navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                      var lattitude = position.coords.latitude;
                      var longtitude = position.coords.longitude;

                      $('.badge-info').each(function(i, obj) {
                          var vendorLat = $(this).data('lat');
                          var vendorLng = $(this).data('lng');
                          $(this).text(calculateDistance(lattitude,longtitude,vendorLat,vendorLng)+' mins');
                      });
                      $('.deliveryCost').each(function(i, obj) {
                          var vendorLat = $(this).data('lat');
                          var vendorLng = $(this).data('lng');
                          $(this).text('TK '+ calculateDistance(lattitude,longtitude,vendorLat,vendorLng)*2);
                      });

                  });
              } else {
                  alert("Sorry, your browser does not support geolocation.");
              }
          }

          $("#customerDeliveryAddress").on('focusout', function (){
              var vendorLat = $("#checkoutDeliveryTime").data('lat');
              var vendorLng = $("#checkoutDeliveryTime").data('lng');

              var address = $("#customerDeliveryAddress").val();
              if(address){
                  address = address.replace(/,/g, ' ');
                  address = encodeURI(address);

                  var webUrl = 'https://api.opencagedata.com/geocode/v1/json?key=6f35973172764d7a9f03ee0ae9f1c66b&q='+address+'&key=03c48dae07364cabb7f121d8c1519492&no_annotations=1&language=en';
                  $.ajax({
                      url: webUrl,
                      success: function(data){
                          var lattitude = data['results'][0]['geometry']['lat'];
                          var longtitude = data['results'][0]['geometry']['lng'];
                          var time = calculateDistance(lattitude,longtitude,vendorLat,vendorLng);
                          alert(time);
                          $("#checkoutDeliveryTime").val(time);
                      }
                  });
              }
          });

          function checkoutDeliveryTime() {
              var vendorLat = $("#checkoutDeliveryTime").data('lat');
              var vendorLng = $("#checkoutDeliveryTime").data('lng');

              var address = $("#customerDeliveryAddress").val();

              if(address){
                  address = address.replace(/,/g, ' ');
                  address = encodeURI(address);

                  var webUrl = 'https://api.opencagedata.com/geocode/v1/json?key=6f35973172764d7a9f03ee0ae9f1c66b&q='+address+'&key=03c48dae07364cabb7f121d8c1519492&no_annotations=1&language=en';
                  $.ajax({
                      url: webUrl,
                      success: function(data){
                          var lattitude = data['results'][0]['geometry']['lat'];
                          var longtitude = data['results'][0]['geometry']['lng'];
                          var time = calculateDistance(lattitude,longtitude,vendorLat,vendorLng);
                          alert(time);
                          $("#checkoutDeliveryTime").val(time);
                      }
                  });
              }
          }



          function calculateDeliveryDistance(lat1, lon1, lat2, lon2)
          {
              var R = 6371; // km
              var dLat = toRadian(lat2-lat1);
              var dLon = toRadian(lon2-lon1);
              var lat1 = toRadian(lat1);
              var lat2 = toRadian(lat2);

              var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                  Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
              var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
              var d = R * c;
              return Math.ceil(d * 0.6);
          }

          // Converts numeric degrees to radians
          function toRadian(Value)
          {
              return Value * Math.PI / 180;
          }

          function showDeliveryTime() {
              if(navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                      var lattitude = position.coords.latitude;
                      var longtitude = position.coords.longitude;

                      var vendorLat = $("#deliveryTime").data('lat');
                      var vendorLng = $("#deliveryTime").data('lng');
                      var delMin = calculateDeliveryDistance(lattitude,longtitude,vendorLat,vendorLng);
                      $("#deliveryTime").text(delMin+' mins');
                      $("#deliveryCost").text(delMin*2+' TK');

                  });
              } else {
                  alert("Sorry, your browser does not support geolocation.");
              }
          }


         function openSearch() {
           document.getElementById("myOverlay").style.display = "block";
         }

         function closeSearch() {
           document.getElementById("myOverlay").style.display = "none";
         }
      </script>
      <script>
         function openSearchm() {
           document.getElementById("myOverlaym").style.display = "block";
         }

         function closeSearchm() {
           document.getElementById("myOverlaym").style.display = "none";
         }
      </script>
      <script>
         //Get the button
         var mybutton = document.getElementById("myBtn");

         // When the user scrolls down 20px from the top of the document, show the button
         window.onscroll = function() {scrollFunction()};

         function scrollFunction() {
           if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
             mybutton.style.display = "block";
           } else {
             mybutton.style.display = "none";
           }
         }

         // When the user clicks on the button, scroll to the top of the document
         function topFunction() {
           document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
         }
      </script>
      <script type="text/javascript">
         $(window).scroll(function (event) {
           var scroll = $(window).scrollTop();
           if(scroll> 1){
             $('#milumax-sticky').addClass("sticky");
           }else{
             $('#milumax-sticky').removeClass("sticky");
           }
         });
      </script>
      <!-- Modernizr Js -->
      <script src="{{asset('public/frontend')}}/js/modernizr.js"></script>
      <!-- bootsnav Js -->
      <script src="{{asset('public/frontend')}}/js/bootsnav.js"></script>
      <!-- Template main Js -->
      <script src="{{asset('public/frontend')}}/js/milusoft.js"></script>
      <!-- Custom js -->
      <script src="{{asset('public/frontend')}}/js/custom.js"></script>
      <!-- Select2 -->
      <link href="{{asset('public/frontend')}}/css/select2.min.css" rel="stylesheet" />
      <script src="{{asset('public/frontend')}}/js/select2.min.js"></script>
      <!-- Owl Carousel -->
      <script src="{{asset('public/frontend')}}/js/owl.carousel.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <!-- jquery-validation -->
      <script src="public/backend/plugins/jquery-validation/jquery.validate.min.js"></script>
      <script src="public/backend/plugins/jquery-validation/additional-methods.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
             //FANCYBOX
             //https://github.com/fancyapps/fancyBox
             $(".fancybox").fancybox({
                 openEffect: "none",
                 closeEffect: "none"
             });
         });
      </script>
      <script>
         function w3_open() {
           document.getElementById("mySidebar").style.display = "block";
           document.getElementById("myOverlay1").style.display = "block";
         }

         function w3_close() {
           document.getElementById("mySidebar").style.display = "none";
           document.getElementById("myOverlay1").style.display = "none";
         }
      </script>
      <!--mobile dropdown menu-->
      <script>
         function myFunction() {
           var x = document.getElementById("myLinks");
           if (x.style.display === "block") {
             x.style.display = "none";
           } else {
             x.style.display = "block";
           }
         }
      </script>
      <!--mobile sidebar-->
      <script>
         function w3_open2() {
           document.getElementById("mySidebar2").style.display = "block";
         }

         function w3_close2() {
           document.getElementById("mySidebar2").style.display = "none";
         }
      </script>
      <!--animation-->
      <script>
         $(function() {
         var $blocks = $('.animBlock.notViewed');
         var $window = $(window);

         $window.on('scroll', function(e){
         $blocks.each(function(i,elem){
           if($(this).hasClass('viewed'))
             return;

           isScrolledIntoView($(this));
         });
         });
         });

         function isScrolledIntoView(elem) {
         var docViewTop = $(window).scrollTop();
         var docViewBottom = docViewTop + $(window).height();
         var elemOffset = 0;

         if(elem.data('offset') != undefined) {
         elemOffset = elem.data('offset');
         }
         var elemTop = $(elem).offset().top;
         var elemBottom = elemTop + $(elem).height();

         if(elemOffset != 0) { // custom offset is updated based on scrolling direction
         if(docViewTop - elemTop >= 0) {
           // scrolling up from bottom
           elemTop = $(elem).offset().top + elemOffset;
         } else {
           // scrolling down from top
           elemBottom = elemTop + $(elem).height() - elemOffset
         }
         }

         if((elemBottom <= docViewBottom) && (elemTop >= docViewTop)) {
         // once an element is visible exchange the classes
         $(elem).removeClass('notViewed').addClass('viewed');

         var animElemsLeft = $('.animBlock.notViewed').length;
         if(animElemsLeft == 0){
           // with no animated elements left debind the scroll event
           $(window).off('scroll');
         }
         }
         }
      </script>
      <!--delivery team sign up js-->
      <script>
         var closebtnss = document.getElementsByClassName("close4");
         var i;

         for (i = 0; i < closebtnss.length; i++) {
           closebtnss[i].addEventListener("click", function() {
             this.parentElement.style.display = 'none';
           });
         }
      </script>
      <!--pop up modal js-->
      <script type="text/javascript">
         $(document).ready(function(){
           $('#image').change(function(e){
             var reader = new FileReader();
             reader.onload = function(e){
               $('#showImage').attr('src',e.target.result);
             }
             reader.readAsDataURL(e.target.files['0']);
           });
         });
      </script>
      <!--bottom menu js-->
      <script>
         var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
         navItems.forEach(function(e, i) {
         e.addEventListener("click", function(e) {
           navItems.forEach(function(e2, i2) {
             e2.classList.remove("mobile-bottom-nav__item--active");
           })
           this.classList.add("mobile-bottom-nav__item--active");
         });
         });
      </script>

      @if(session()->has('success'))
          <script type="text/javascript">
            $(function(){
              $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'});
            });
          </script>
      @endif
      @if(session()->has('error'))
          <script type="text/javascript">
            $(function(){
              $.notify("{{session()->get('error')}}",{globalPosition:'top right',className:'error'});
            });
          </script>
      @endif
   </body>
</html>
