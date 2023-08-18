<?php
include('includes/header.php'); //كود جلب ملف راس الصفحة 
?>
<section class="w3l-main-slider" id="home">
  <!-- اكواد السلايد المتحرك في الصفحة الرئيسية -->
  <div class="companies20-content">
   
    <div class="owl-one owl-carousel owl-theme">
      <div class="item">
        <li>
          <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>نتميز لنصبح الخيار الأول</h5>
                 
                </div>
                
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info  banner-view banner-top1 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  
                  <h5>نوفير احدث التقنيات التعليمية</h5>
                  
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top2 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  
                  <h5>نعطي الطالب كامل اهتمامنا</h5>
                 
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      
    </div>
  </div>

</div>

<script src="assets/js/owl.carousel.js"></script>
  <!-- سكربت تحريك الصور  -->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>

  <!-- //script -->
  <!-- /main-slider -->
</section>




<!-- -->
<section class="w3l-feature-3" id="features">
	<div class="grid top-bottom mb-lg-5 pb-lg-5">
		<div class="container">
			
			<div class="middle-section grid-column text-center">
				<div class="three-grids-columns" style="background-color: #2a606ea1;" >
					<span class="fa fa-laptop"></span>
					<h4>احصل على نتائجك</h4>
					
					<a href="find-result.php" class="btn btn-secondary btn-theme3 mt-4" style="color:#ffee11">ابداء</a>
				</div>
				<div class="three-grids-columns" style="background-color:  #2a606eae;">
					<span class="fa fa-print"></span>
					<h4>طباعة نتيجتك </h4>
					
					<a href="find-result.php" class="btn btn-secondary btn-theme3 mt-4" style="color:#ffee11">ابداء </a>
				</div>
				<div class="three-grids-columns" style="background-color:  rgba(42, 96, 110, 0.667);;">
					<span class="fa fa-book"></span>
					<h4>تقديم التظلمات</h4>
					<!--<p>Auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>-->
					<a href="find-result.php" class="btn btn-secondary btn-theme3 mt-4" style="color:#ffee11">ابداء </a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- features-4 block -->
<section class="w3l-index1" id="about">
	<div class="calltoaction-20  py-5 editContent">
		<div class="container py-md-3">
		
			<div class="calltoaction-20-content row" style="direction:rtl;text-align:right;" >
				<div class="column center-align-self col-lg-6 pr-lg-5" >
					<h5 class="editContent" dir="rtl">ماذا عن الجامعة</h5>
					<p class="more-gap editContent" style="direction:rtl;text-align:right;" >أنشئت الجامعة بناءاً على مذكرة التفاهم الموقعة بين حكومتي الجمهورية اليمنية، والمملكة الأردنية الهاشمية، واستناداً إلى موافقة مجلس الوزراء رقم ( 65) لسنة 2005م ، وموافقة المجلس الأعلى للجامعات، والمجلس الأعلى لتخطيط التعليم في اجتماعهما المشترك بتاريخ 16/2/2006م، و قرار وزير التعليم العالي والبحث العلمي، رقم (0790) لسنة 2008م بإنشاء الجامعة.</p>
						<p class="more-gap editContent"> </p>
							<a class="btn btn-secondary btn-theme2 mt-2" href="" style="color:#FFFFFF;"> المزيد</a>
				</div>
				<div class="column ccont-left col-lg-6">
					<img src="assetss/images/g1.jpg" class="img-responsive" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- features-4 block -->
<section class="services-12" id="course" dir="rtl">
	<div class="form-12-content">
		<div class="container">
			<div class="grid grid-column-2 ">
				
				<div class="column1">
					<div class="heading">
						<h3 class="head text-white text-right">عزيزي الطالب</h3>
						
						<p class="my-3 text-white text-right"> إذا لم تجد ضالتك في هذا الدليل أو لائحة شؤون الطلاب المعمول بها في الجامعة، ولم تحصل على إجابات شافية لأسئلة تدور في ذهنك، فإن دائرة شؤون الطلاب على استعداد دائم للإجابة على استفساراتك،  فلا تتردد في طلب المساعدة ، وكن على ثقة بأن الجميع قريبون منك، وستجد منهم كل الدعم والمساندة.</p>
					  </div>
					</div>
					<div class="column2">
						<a class="btn btn-secondary btn-theme2 mt-3" href="files/student_guide.pdf" style="color:#FFFFFF"> دليل الطالب</a>
					</div>
			</div>
		</div>
	</div>
</section>

<!--  form-12 -->
<section class="w3l-form-12">
		<div class="form-12-content py-5" id="services">
			<div class="container py-md-3">
				<div class="grid grid-column-1 py-md-5" dir="rtl">
						
					
						<div class="column2">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-6">
								<a href=""><div class="courses-item">
									<span class="fa fa-graduation-cap"></span>
									<p>7869 طالب</p>
								</div></a>
							</div>
							<div class="col-md-3 col-sm-6 col-6">
								<a href="services.html"><div class="courses-item">
									<span class="fa fa-users"></span>
									<p>اكثر من 1000 طالب وافد</p>
								</div></a>
							</div>
							<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-4">
								<a href=""><div class="courses-item">
									<span class="fa fa-building"></span>
									<p>5 كليات</p>
								</div></a>
							</div>
							<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-4">
								<a href=""><div class="courses-item">
									<span class="fa fa-users"></span>
									<p>210 عضو هيئة تدريس</p>
								</div></a>
							</div>
							
						</div>
						</div>
				</div>
			</div>
		</div>
	</section>
<!-- // form-12 -->

<section class="w3l-form-12">
		<div class="form-12-content py-5" id="services">
			<div class="container py-md-3">
				<div class="grid grid-column-1 py-md-5" dir="rtl">
						
					
						<div class="column2">
						<div class="row">
							
							لتسديد الرسوم عبر حساب الكريمي
              3069298752
						</div>
						</div>
				</div>
			</div>
		</div>
	</section>
<!-- // form-12 -->

 
<!-- customers4 block -->

<!-- grids block 5 -->
<section class="w3l-footer-29-main">
  <div class="footer-29" >
      <div class="container" >
          <div class="d-grid grid-col-4 footer-top-29">
              <div class="footer-list-29 footer-1">
                  <h6 class="footer-title-29" style="text-align:right;">للتواصل</h6>
                  <ul>
                      <li dir="rtl"><p style="text-align:right;"><span class="fa fa-map-marker" style="color:#ffffff;text-align:right; direction:rtl;"></span> اليمن - صنعاء - حدة</p></li>
                      <li dir="rtl" style="text-align:right;"><a  href="tel:+7-800-999-800"><span class="fa fa-phone" style="color:#ffffff;"></span> +967 1 432345</a></li>
                      <li dir="rtl" style="text-align:right;"><a  href="mailto:info@yju.edu.ye" class="mail"><span class="fa fa-envelope-open-o" style="color:#ffffff;"></span> info@yju.edu.ye</a></li>
                  </ul>
                  <div class="main-social-footer-29" style="text-align:right;">
                      <a href="#https://www.facebook.com/yju20082009/" class="facebook"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="twitter"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="instagram"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="google-plus"><span class="fa fa-google-plus"></span></a>
                      <a href="#" class="linkedin"><span class="fa fa-linkedin"></span></a>
                  </div>
              </div>
              <div class="footer-list-29 footer-2">
                  <ul>
                      <h6 class="footer-title-29">Featured Links</h6>
                      <li><a href="#">Graduation</a></li>
                      <li><a href="#">Admissions</a></li>
                      <li><a href="#">Book Store</a></li>
                      <li><a href="#">International</a></li>
                      <li><a href="#">Courses</a></li>
                  </ul>
              </div>
              <div class="footer-list-29 footer-3" dir="rtl">

                  <h6 class="footer-title-29" dir="rtl" style="text-align:right;">للاشتراك في اخبارنا </h6>
          <form action="#" class="subscribe" method="post">
            <input type="email" name="email" placeholder="البريد الالكتروني" required="">
            <button><span class="fa fa-envelope-o"></span></button>
          </form>
          
        
              </div>
              <div class="footer-list-29 footer-4">
                  <ul>
                      <h6 class="footer-title-29">الروابط</h6>
                      <li><a href="index.php">الرئيسية</a></li>
                      <li><a href="find-result.php">الاستعلام عن الدرجات</a></li>
                      <li><a href="admin-login.php">مدير النظام</a></li>
                  </ul>
              </div>
          </div>
          <div class="d-grid grid-col-2 bottom-copies">
              <p class="copy-footer-29">© 2023 جميع الحقوق محفوظة لدى الجامعة اليمنية الاردنية </p>
               <ul class="list-btm-29">
                     
                      
                  </ul>
          </div>
      </div>
  </div>
  <!-- move top -->
  <button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fa fa-angle-up"></span>
  </button>
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- /move top -->
</section>
<script src="assetss/js/jquery-3.3.1.min.js"></script>
<!-- //footer-28 block -->
</section>
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<!-- Template JavaScript -->
<script src="assetss/js/all.js"></script>
<!-- Smooth scrolling -->
<!-- <script src="assetss/js/smoothscroll.js"></script> -->
<script src="assetss/js/owl.carousel.js"></script>

<!-- script for -->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      responsiveClass: true,
      autoplay: false,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        480: {
          items: 1,
          nav: false
        },
        667: {
          items: 1,
          nav: true
        },
        1000: {
          items: 1,
          nav: true
        }
      }
    })
  })
</script>
<!-- //script -->

</body>

</html>
<!-- // grids block 5 -->