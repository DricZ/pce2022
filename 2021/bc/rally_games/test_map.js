var username = document.getElementById('session_username').value;
var current_island;
var clicked_island;
var output_modal;

$(function () {
    // AMBIL JEMBATAN YG SUDAH DIBANGUN
    $.ajax({
        url: "new_phps/get_jembatan.php",
        method: "GET",
        success: function (data) {
            data.forEach(function (item) {
                if (item['username'] == username) {
                    document.getElementById(item['nama_jembatan']).style.opacity = "1";
                    document.getElementById(item['nama_jembatan']).style.fill = "black";
                    $('#coba').append(item['nama_jembatan']);
                }
            });
        }
    });

    // AMBIL LOKASI SAAT INI
    $.ajax({
        url: "new_phps/get_lokasi.php",
        method: "GET",
        success: function (data) {
            data.forEach(function (item) {
                if (item['username'] == username) {
                    current_island = item['id_pulau_ku'];
                    if (!document.getElementById(item['id_pulau_ku']).classList.contains('current')) {
                        document.getElementById(item['id_pulau_ku']).classList.add('current');
                    }
                }
            });
        }
    });
});

// UNTUK ZOOM SAAT PULAU DI-KLIK
function _zoomIn(id_pulau, pulau_besar) {
    var change_height = 0;
    
    $(".awan").fadeOut(400);

    setTimeout(() => {
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
    }, 500);

    setTimeout(() => {
        $('html, body').animate({
            scrollTop: $('#' + id_pulau).offset().top - $(this).outerHeight(true) / change_height,
            scrollLeft: $('#' + id_pulau).offset().left - $(this).outerWidth(true) / 2
        }, 750, 'linear');
        if (current_island != undefined) {
            if (document.getElementById(current_island).classList.contains('current')) {
                document.getElementById(current_island).classList.remove('current');
            }
        }
    }, 1250);

    setTimeout(() => {
        current_island = id_pulau;
        document.getElementById(current_island).classList.add("current");
        document.body.style.overflow = "hidden";
    }, 1500);
}
$('.pulau_ku').click(function () {
    // JIKA LOKASI SAAT INI
    clicked_island = this.id;
    if (this.id == current_island) {
        document.getElementById('modal_saat_ini').style.display = "block";
    } else {
        // console.log("Halo");
        $.ajax({
            url: "new_phps/check_lokasi.php",
            method: "POST",
            data: {
                pulau_tujuan: clicked_island,
                pulau_skrg: current_island
            },
            success: function (data) {
                if (data[0] == "jembatan") {
                    var jembatan = document.getElementsByClassName('modal_saat_jembatan');
                    jembatan[0].style.display = "block";
                    jembatan[1].style.display = "block";
                    jembatan[0].innerHTML = "Pergi melalui <b>jembatan " + data[1] + "</b>.";
                    document.getElementById('gambar_jembatan').src = "assets/image/" + data[2];
                }
            }
        });
    }
    $('#modal_pulau').modal();
});
$('.p_besar').click(function () {
    _zoomIn(this.id, true);
});

// MODAL YA/TIDAK
$('#ya').click(function () {
    if (document.getElementById(clicked_island).classList.contains('p_besar')) {
        _zoomIn(clicked_island, true);
    } else {
        _zoomIn(clicked_island, false);
    }
    $('#modal_pulau').modal("hide");
});
$('#tidak').click(function () {
    clicked_island = null;
    document.getElementById('modal_saat_ini').style.display = "none";
    document.getElementsByClassName('modal_saat_jembatan')[0].style.display = "none";
    document.getElementsByClassName('modal_saat_jembatan')[1].style.display = "none";
    document.getElementsByClassName('modal_saat_tiket')[0].style.display = "none";
    document.getElementsByClassName('modal_saat_tiket')[1].style.display = "none";
    $('#modal_pulau').modal("hide");
})

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

// BUTTONS
function _zoomOut() {
    document.getElementById('svg2').style.padding = "1%";
    document.getElementById('svg2').style.paddingLeft = "0%";
    document.getElementById('svg2').style.transform = "scale(1.0)";
    setTimeout(() => {
        $('html, body').animate({
            scrollTop: 0
        }, 500, 'linear');
    }, 500);

    $(".awan").fadeIn(1000);
}
function goBack() {
    document.location.href = "http://localhost/pce2022/2021/bc/rally_games/map.php";
}

// $.ajax({
        //     url: "new_phps/update_lokasi.php",
        //     method: "POST",
        //     data: {
        //         pulau_tujuan: clicked_island
        //     },
        //     success: function (data) {
        //         console.log(data['output_modal']);
        //         if (data["output_modal"] == "jembatan") {
        //             document.getElementsByClassName('modal_saat_jembatan')[0].style.display = "block";
        //             document.getElementsByClassName('modal_saat_jembatan')[1].style.display = "block";
        //         }
        //     }
        // });
