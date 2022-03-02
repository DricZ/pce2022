var current_island;

// UNTUK ZOOM SAAT PULAU DI-KLIK
function _zoomIn(id_pulau, pulau_besar) {
    var change_height = 0;
    if (pulau_besar == false) {
        document.body.style.overflow = "scroll";
        document.getElementById('svg2').style.padding = "100%";
        document.getElementById('svg2').style.paddingLeft = "100%";
        document.getElementById('svg2').style.transform = "scale(5.0)";
        change_height = 7.5;
    } else {
        document.body.style.overflow = "scroll";
        document.getElementById('svg2').style.padding = "100%";
        document.getElementById('svg2').style.paddingLeft = "100%";
        document.getElementById('svg2').style.transform = "scale(2.5)";
        change_height = 9;
    }

    setTimeout(() => {
        $('html, body').animate({
            scrollTop: $('#' + id_pulau).offset().top - $(this).outerHeight(true) / change_height,
            scrollLeft: $('#' + id_pulau).offset().left - $(this).outerWidth(true) / 2
        }, 750, 'linear');
        if (current_island != undefined) {
            console.log(current_island);
            if (document.getElementById(current_island).classList.contains('current')) {
                document.getElementById(current_island).classList.remove('current');
            }
        }
    }, 750);

    setTimeout(() => {
        current_island = id_pulau;
        document.getElementById(current_island).classList.add("current");
        document.body.style.overflow = "hidden";
    }, 1000);
}
$('.pulau_ku').click(function () {
    _zoomIn(this.id, false);
});
$('.p_besar').click(function () {
    _zoomIn(this.id, true);
});

// UNTUK MENAMPILKAN INFO JEMBATAN SAAT DI-HOVER
var mouse_x = 0;
var mouse_y = 0;
$('.jembatan_ku').hover(function (e) {
    document.body.addEventListener('mousemove', (event) => {
        mouse_x = event.x;
        mouse_y = event.y;
    })
    $('#coba').css({
        // left: e.pageX,
        // top: e.pageY,
        left: mouse_x,
        top: mouse_y,
        'display': 'block',
        'z-index': '5'
    });
}, function () {
    $('#coba').css({
        'display': 'none'
    })
});

// UNTUK ZOOMOUT SAAT BUTTON DI-KLIK
function _zoomOut() {
    document.getElementById('svg2').style.padding = "1%";
    document.getElementById('svg2').style.paddingLeft = "0%";
    document.getElementById('svg2').style.transform = "scale(1.0)";
    setTimeout(() => {
        $('html, body').animate({
            scrollTop: 0
        }, 500, 'linear');
    }, 500);
}


function goBack() {
    document.location.href = "http://localhost/pce2022/2021/bc/rally_games/map.php";
}


// DEMO GET DATA DARI DATABASE LEWAT PHP
var username = document.getElementById('session_username').value;
console.log(username);
$(function () {
    // AMBIL JEMBATAN YG SUDAH DIBANGUN
    $.ajax({
        url: "new_phps/get_jembatan.php",
        method: "GET",
        success: function (data) {
            data.forEach(function (item) {
                console.log(item['username']);
                if (item['username'] == username) {
                    document.getElementById(item['nama_jembatan']).style.opacity = "1";
                    document.getElementById(item['nama_jembatan']).style.fill = "black";
                    $('#coba').append(item['nama_jembatan']);
                }
            });
        }
    });
});
