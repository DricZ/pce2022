<style>
    .yess {
        color: white;
    }

    .yess:hover {
        color: white;
    }

    .menu,
    .contact {
        text-align: center;
    }

    .tag {
        opacity: 0;
        transform: translate(0, 10vh);
        transition: all 1s;
    }

    .tag.visible {
        opacity: 1;
        transform: translate(0, 0);
    }

    footer {
        z-index: 100;
    }

    #logo {
        transition: 0.5s;
    }

    #logo:hover {
        transform: scale(1.1);
        transition: 0.5s;
    }

    .yess,
    #itdiv {
        transition: 0.2s;
    }

    .yess:hover {
        color: var(--graybrown);
    }
</style>

<script>
    $(document).on("scroll", function() {
        var pageTop = $(document).scrollTop();
        var pageBottom = pageTop + $(window).height();
        var tags = $(".tag");

        for (var i = 0; i < tags.length; i++) {
            var tag = tags[i];

            if ($(tag).position().top < pageBottom) {
                $(tag).addClass("visible");
            } else {
                $(tag).removeClass("visible");
            }
        }
    });
</script>

<footer id="contactus" class="contain py-4 px-5" style="z-index:2000; background-image:url('assets/image/bg_footer.jpg'); background-size:cover;">
    <div class="row row-cols-md-3 row-cols-1">
        <div class="col text-center mt-4">
            <a href="https://www.instagram.com/petracivilexpo/" target="_blank"><img src="assets\pce_logo monochrome.png" alt="PCE" style="width: 30%; position:relative;" id="logo"></a>
            <a href="http://himasitra.petra.ac.id/HIMA/" target="_blank"><img src="assets\HIMA_LOGONW1.png" alt="HIMASITRA" style="width: 25%; position:relative; padding-left: 10px;" id="logo"></a>
            <p class="mt-2" style="color:white; text-align: center; font-size: 12pt;">
                <b>Petra Civil Expo</b> is the biggest competition event held by the Petra Christian University Civil Engineering Student Association. <b>Petra Civil Expo</b> is home to <b>three national competitions</b> which are usually held every year, namely <b>Bridge Competition</b>, <b>Earthquake Resistant Design Competition</b>, and <b>Concrete Pressing Strength Competition</b>. For <b>Petra Civil Expo 2021</b>, apart from hosting the three competitions, there will also be an <b>International Webinar</b>.<br><br><a href="https://www.petra.ac.id/" target="_blank"><img src="assets\logo_light.png" alt="UK PETRA" style="width: 35%; position:relative;" id="logo"></a>&nbsp;<a href="https://www.petra.ac.id/" target="_blank"><img src="assets\60ukp.png" alt="60" style="width: 17%; position:relative;" id="logo"></a><br><br><a target="_blank" style="text-decoration: none; color: white;" href="itdivision.php" id="itdiv">&copy; IT Division Petra Civil Expo 2022</a>
            </p>
        </div>

        <div class="col mt-4">
            <h5 class="text-center" style="color:white;">CONTACT US</h5>
            <div class="contact row justify-content-center">
                <div class="col-12 mt-3"><a class="yess" target="_blank" href="https://line.me/R/ti/p/@tou8951r" style="text-decoration: none;"><i class="fab fa-line fa-2x pr-1" style="color:white; font-size: 13pt;"></i>@tou8951r</a>
                </div>
                <div class="col-12 mt-3"><a class="yess" target="_blank" href="https://www.instagram.com/petracivilexpo/" style="text-decoration: none;"><i class="fab fa-instagram fa-2x pr-1" style="color: white; font-size: 13pt;"></i>petracivilexpo</a></div>
                <div class="col-12 mt-3"><a class="yess" target="_blank" href="https://www.tiktok.com/@petracivilexpo?lang=en" style="text-decoration: none;"><i class="fab fa-tiktok pr-1" style="color: white; font-size: 13pt;"></i>petracivilexpo</a></div>
                <!-- <div class="col-12 mt-3"><a class="yess" target="_blank" href="https://www.instagram.com/petracivilexpo/" style="text-decoration: none;"><i class="fab fa-facebook-f pr-1" style="color: white; font-size: 13pt;"></i>Petra Civil Expo</a></div> -->
                <!-- <div class="col-12 mt-3"><a class="yess" target="_blank" href="https://www.instagram.com/petracivilexpo/" style="text-decoration: none;"><i class="fab fa-twitter pr-1" style="color: white; font-size: 13pt;"></i>@petracivilexpo</a></div> -->
                <div class="col-12 mt-3 mb-3"><a class="yess" target="_blank" href="mailto:petracivilexpo2021@gmail.com" style="text-decoration: none;"><i class="fas fa-envelope fa-2x pr-1" style="color: white; font-size: 13pt;"></i>petracivilexpo2021@gmail.com</a></div>
            </div>
        </div>
        <div class="col mt-4 mb-5">
            <h5 class="text-center" style="color:white;">NAVIGATION</h5>
            <div class="menu row">
                <div class="col-12 mt-3"><a class="yess" href="index.php" style="text-decoration: none;">Home</a></div>
                <div class="col-12 mt-3"><a class="yess" href="index.php#about" style="text-decoration: none;">About</a></div>
                <div class="col-12 mt-3"><a class="yess" href="cap.php" style="text-decoration: none;">Civil Analysis & Photography</a></div>
                <!-- <div class="col-12 mt-3"><a class="yess" href="./erdc/info_checking.php" style="text-decoration: none;">Earthquake Resistant Design Competition</a></div> -->
                
                <!-- <div class="col-12 mt-3"><a class="yess" href="bc/" style="text-decoration: none;" target="_blank">Bridge Competition</a></div> -->
                <!-- <div class="col-12 mt-3"><a class="yess" href="webinar_register.php" style="text-decoration: none;">International Webinar</a></div> -->
                <!-- <div class="col-12 mt-3"><a class="yess" href="#contactus" style="text-decoration: none;">Contact Us</a></div> -->
                <!-- <div class="col-12 mt-3 mb-3"><a class="yess" href="form_daftar.php" style="text-decoration: none;">Register Here</a></div> -->
            </div>
        </div>
    </div>
</footer>