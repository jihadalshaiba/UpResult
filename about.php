<?php
include('includes/header.php');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body {
        margin-top: 20px;
    }

    .team-list img {
        width: 50%;
    }

    .team-list .content {
        width: 50%;
    }

    .team-list .content .follow {
        position: absolute;
        bottom: 24px;
    }

    .team-list:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
    }

    .team,
    .team-list {
        -webkit-transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s;
    }

    .team .content .title,
    .team-list .content .title {
        font-size: 18px;
    }

    .team .overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        opacity: 0;
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .team .member-position,
    .team .team-social {
        position: absolute;
        bottom: -35px;
        right: 0;
        left: 0;
        margin: auto 10%;
        z-index: 99;
    }

    .team .team-social {
        bottom: 40px;
        opacity: 0;
        -webkit-transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s;
    }

    .team:hover {
        -webkit-transform: translateY(-7px);
        transform: translateY(-7px);
        -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    }

    .team:hover .overlay {
        opacity: 0.6;
    }

    .team:hover .team-social {
        opacity: 1;
    }

    @media (max-width: 768px) {

        .team-list img,
        .team-list .content {
            width: 100%;
            float: none !important;
        }

        .team-list img .follow,
        .team-list .content .follow {
            position: relative;
            bottom: 0;
        }
    }

    .social-icon.social li a {
        color: #adb5bd;
        border-color: #adb5bd;
    }

    .social-icon li a {
        color: #35404e;
        border: 1px solid #35404e;
        display: inline-block;
        height: 32px;
        text-align: center;
        font-size: 15px;
        width: 32px;
        line-height: 30px;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        overflow: hidden;
        position: relative;
    }

    .rounded {
        border-radius: 5px !important;
    }

    .para-desc {
        max-width: 600px;
    }

    .text-muted {
        color: #8492a6 !important;
    }

    .section-title .title {
        letter-spacing: 0.5px;
        font-size: 30px;
    }
</style>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <div class="container bootdey">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">رؤيتنا للموقع</h4>

                </div>
            </div>
        </div>
        <div class="container bootdey">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h1 class="title mb-0">.الجامعة اليمنية الأردنية مهمة جداً لها مكانتها المتميزة بين الجامعات اليمنية وسمعتها العلمية المرموقة ولأنها جامعة تسعى لمتابعة التطورات في شتى المجالات العلمية للمستوى المتميز لكوادرها وباأخص التطورات التقنية والتكنولوجية المعاصرةوحتى تصل أهدافها لأبلغ مما هي علية فيما تقدمه لأبنائها الطلاب ورفد مجتمعها ولفت أنظارهم لمثل هذه التطورات ومتابعتها</h1>

                </div>
            </div>
        </div>
        
           <br>    <br><br><br><br>
           <div class="container bootdey">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">فريق العمل </h4>

                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/b.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" alt>
                    <div class="content mt-3">
                        <h4 class="title mb-0">تهاني علي راشد</h4>


                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/a.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" alt>
                    <div class="content mt-3">
                        <h4 class="title mb-0">اماني محمد الجعدي</h4>


                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/1.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" alt>
                    <div class="content mt-3">
                        <h4 class="title mb-0">حلة مهدي معياد </h4>


                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/e.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" alt>
                    <div class="content mt-3">
                        <h4 class="title mb-0">ندي علي الحبيشي</h4>
                        

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/d.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" alt>
                    <div class="content mt-3">
                        <h4 class="title mb-0">صالح فضل النقيب</h4>


                    </div>
                </div>
            </div>
    </div>
    <br>    <br><br><br><br>
           <div class="container bootdey">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">مشرف فريق العمل </h4>

                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/3.jpg" class="img-fluid avatar avatar-medium shadow rounded-pill" alt>
                    <div class="content mt-3">
                        <h2 class="title mb-4">   البروفيسور/ منير المخلافي </h2>
                        <h3 class="text-muted">كل الشكر والتقدير لمشرف الفريق البروفيسور/منير المخلافي</h3>
                    </div>
                </div>
            </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
    <br><br><br><br>
    <section class="w3l-footer-29-main">
        <div class="footer-29">
            <div class="container">
                <div class="d-grid grid-col-4 footer-top-29">
                    <div class="footer-list-29 footer-1">
                        <h6 class="footer-title-29" style="text-align:right;">للتواصل</h6>
                        <ul>
                            <li dir="rtl">
                                <p style="text-align:right;"><span class="fa fa-map-marker" style="color:#ffffff;text-align:right; direction:rtl;"></span> اليمن - صنعاء - حدة</p>
                            </li>
                            <li dir="rtl" style="text-align:right;"><a href="tel:+7-800-999-800"><span class="fa fa-phone" style="color:#ffffff;"></span> +967 1 432345</a></li>
                            <li dir="rtl" style="text-align:right;"><a href="mailto:info@yju.edu.ye" class="mail"><span class="fa fa-envelope-open-o" style="color:#ffffff;"></span> info@yju.edu.ye</a></li>
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
            window.onscroll = function() {
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
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Template JavaScript -->
    <script src="assetss/js/all.js"></script>
    <!-- Smooth scrolling -->
    <!-- <script src="assetss/js/smoothscroll.js"></script> -->
    <script src="assetss/js/owl.carousel.js"></script>

    <!-- script for -->
    <script>
        $(document).ready(function() {
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