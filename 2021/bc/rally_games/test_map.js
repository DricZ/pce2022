var username = document.getElementById('session_username').value;
var current_island, clicked_island, transportasi;
var treasure_island, id_tipe, path_jembatan;
var state, currentSkill;
var banned_island = [];

// AMBIL LOKASI SAAT INI
function get_lokasi() {
    $.ajax({
        url: "new_phps/get_lokasi.php",
        method: "GET",
        success: function (data) {
            data.forEach(function (item) {
                if (item['username'] == username) {
                    if (current_island != undefined) {
                        document.getElementById(current_island).classList.remove('current');
                    }
                    current_island = item['id_pulau_ku'];
                    if (!document.getElementById(item['id_pulau_ku']).classList.contains('current')) {
                        document.getElementById(item['id_pulau_ku']).classList.add('current');
                    }
                }
            });
        }
    });
}

// HILANGKAN PULAU YG KENA BOM & BAN
function load_map() {
    $.ajax({
        url: "new_phps/load_map.php",
        method: "GET",
        success: function (data) {
            // HILANGKAN PULAU
            for (let i = 0; i < data[0].length; i++) {
                document.getElementById(data[0][i]["path"]).style.display = "none";
            }

            // HILANGKAN JEMBATAN
            for (let i = 0; i < data[1].length; i++) {
                document.getElementById(data[1][i]["nama"]).style.display = "none";
            }

            // BAN PULAU
            for (let i = 0; i < data[2].length; i++) {
                banned_island[i] = data[2][i]["path"];
            }
        },
        error: function ($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    })
}

// AMBIL JEMBATAN YG SUDAH DIBANGUN
function get_jembatan() {
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
                else {
                    document.getElementById(item['nama_jembatan']).style.opacity = "1";
                    document.getElementById(item['nama_jembatan']).style.fill = "red";
                    $('#coba').append(item['nama_jembatan']);
                }
            });
        }
    });
}

// AMBIL NAMA TEAM DI PULAU TERTENTU
function get_team(di_pulau) {
    $.ajax({
        url: "new_phps/get_team.php",
        method: "POST",
        data: {
            pulau_tujuan: di_pulau
        },
        success: function (data) {
            console.log(data);
            var str = "<h3>Tim yang juga berada di pulau ini:</h3>";
            for (let i = 0; i < data.length; i++) {
                str += `<p><b>• ` + data[i]['team_name'] + `</b>`;
            }
            document.getElementById("team_here").innerHTML = str;
        },
        error: function ($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    });
}

// UNTUK ZOOM PULAU
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

// CEK HARTA KARUN
function cek_harta(id_pulau, cek) {
    $.ajax({
        url: "new_phps/check_treasure.php",
        method: "POST",
        data: {
            pulau_harta: id_pulau,
            pengecekkan: cek
        },
        success: function (data) {
            if (data == "ada" && cek == "harta") { // munculkan clue & hilangkan harta
                $('#modal_treasure').modal();
                document.getElementById("harta_karun").style.display = "none";
            } else if (data == "ada") { // munculkan icon harta karun
                $("#harta_karun").fadeIn("slow");
            }
        },
        error: function ($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    });
}
// CEK LAGI...
$('#harta_karun').click(function () {
    cek_harta(treasure_island, "harta");
});

// MODAL PULAU YA/TIDAK
$('#ya').click(function () {
    if (document.getElementById('modal_saat_ini').style.display == "block") {
        get_lokasi();

        // CEK APAKAH PULAU BESAR YG DIKLIK
        if (document.getElementById(clicked_island).classList.contains('p_besar')) {
            _zoomIn(clicked_island, true);
        } else {
            _zoomIn(clicked_island, false);
        }

        // CEK APAKAH DI PULAU ADA HARTA KARUN
        if (document.getElementById(clicked_island).classList.contains('cek_harta')) {
            cek_harta(clicked_island, "pulau");
            treasure_island = clicked_island;
        }
    } else {
        $.ajax({
            url: "new_phps/update_lokasi.php",
            method: "POST",
            data: {
                pulau_tujuan: clicked_island,
                transportasi: transportasi
            },
            success: function (data) {
                if (data == "kurang") {
                    $("#modal_tdk_bisa").modal();
                } else {
                    console.log(data);
                    get_lokasi();
                    disableIsland("pulau");

                    // CEK APAKAH PULAU BESAR YG DIKLIK
                    if (document.getElementById(clicked_island).classList.contains('p_besar')) {
                        _zoomIn(clicked_island, true);
                    } else {
                        _zoomIn(clicked_island, false);
                    }

                    // CEK APAKAH DI PULAU ADA HARTA KARUN
                    if (document.getElementById(clicked_island).classList.contains('cek_harta')) {
                        cek_harta(clicked_island, "pulau");
                        treasure_island = clicked_island;
                    }
                }
            }
        });
    }

    if (treasure_island != null) {
        treasure_island = null;
    }

    setTimeout(() => {
        document.getElementById('modal_saat_ini').style.display = "none";
        document.getElementById('modal_saat_jembatan').style.display = "none";
        document.getElementById('modal_saat_tiket').style.display = "none";
    }, 500);

    $('#modal_pulau').modal("hide");
});
$('.tidak').click(function () {
    clicked_island = null;
    setTimeout(() => {
        document.getElementById('modal_saat_ini').style.display = "none";
        document.getElementById('modal_saat_jembatan').style.display = "none";
        document.getElementById('modal_saat_tiket').style.display = "none";
    }, 500);
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

function show() {
    $.ajax({
        url: "new_phps/refresh_skill.php",
        type: "get",
        dataType: "json",
        success: function (result) {
            var data = result;
            var str = "";
            if (data.length == 0) {
                str += `
                    <div id="no-content-msg-skill" style="text-align: center;">
                        <img src="assets/image/nothing-to-say.svg" width="35%">
                        <h3>You have nothing in your inventory...</h3>
                    </div>
                    `;
            } else {
                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    str += `
                    <div class="col-12 col-md-4 mySkill" style="margin-top: 50px;">
                        <div style="text-align: center;">
                            <i class="mr-5">
                                <img src="assets/image/` + d.gambar + `" class="icons" >
                            </i>
                            <div style="font-size: xx-large; display: inline;">
                                x` + d.count + `
                            </div>
                        </div>
                        <div style="text-align: center; font-size: large;">
                            <p class="resource-name">` + d.nama + `</p>
                            <button type="button" class="btn btn-success" onclick="use('`+ d.nama + `','none')">USE</button>
                        </div>
                    </div>
                `;
                }
            }

            $(".content").html(str);
        },
        error: function () {
            alert("ERROR!");
        },
    });
}

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

    var pulau = document.getElementsByClassName("pulau_ku");
    for (let i = 0; i < pulau.length; i++) {
        pulau[i].style.pointerEvents = "auto";
    }

    $(".awan").fadeIn(1000);
}
function goBack() {
    document.location.href = "http://localhost/pce2022/2021/bc/rally_games/map.php";
}
function showSkill() {
    show();
    $('#modal_skill').modal();
}
function _cancelSkill() {
    document.getElementById("nav-cancel").style.display = "none";
    document.getElementById("msg-choose").style.display = "none";
    document.getElementById("choose-small").style.display = "none";
    document.getElementById("choose-all").style.display = "none";
    document.getElementById("nav-zoom-out").style.display = "block";
    document.getElementById("nav-back").style.display = "block";
    document.getElementById("nav-skill").style.display = "block";
    document.body.style.cursor = "auto";

    var pulau = document.getElementsByClassName("pulau_ku");
    for (let i = 0; i < pulau.length; i++) {
        pulau[i].style.pointerEvents = "auto";
    }

    var jembatan = document.getElementsByClassName("jembatan_ku");
    for (let i = 0; i < jembatan.length; i++) {
        jembatan[i].style.pointerEvents = "auto";
    }
}

// UNTUK MUNCULKAN MODAL PULAU
$('.pulau_ku').click(function () {
    if (state == "choosing") {
        use(currentSkill, this.id);
        state = "none";
    } else {
        get_team(this.id);

        // JIKA PULAU DI-BAN
        if (banned_island.length != 0) {
            for (let i = 0; i < banned_island.length; i++) {
                if (banned_island[i] == this.id) {
                    $('#modal_tdk_bisa').modal();
                    return;
                }
            }
        }

        // JIKA LOKASI SAAT INI
        clicked_island = this.id;
        if (this.id == current_island) {
            document.getElementById('modal_saat_ini').style.display = "block";
            $('#modal_pulau').modal();
        } else {
            if (current_island == undefined) {
                document.getElementById('modal_saat_tiket').style.display = "block";
                $('#modal_pulau').modal();
            } else {
                $.ajax({
                    url: "new_phps/check_lokasi.php",
                    method: "POST",
                    data: {
                        pulau_tujuan: clicked_island,
                        pulau_skrg: current_island
                    },
                    success: function (data) {
                        console.log(data);
                        if (data[0] == "jembatan") { // JIKA PINDAH PULAU PAKAI JEMBATAN
                            document.getElementById('modal_saat_jembatan').style.display = "block";
                            document.getElementById('modal_saat_jembatan').innerHTML = "<h3>Pergi dengan melalui <b>jembatan " + data[1] + "</b>.</h3><img id='gambar_jembatan' src='assets/image/" + data[2] + "' alt='' width='100%'></img>";
                            $('#modal_pulau').modal();
                        } else { // JIKA PINDAH PULAU PAKAI TIKET
                            document.getElementById('modal_saat_tiket').style.display = "block";
                            $('#modal_pulau').modal();
                        }
                        transportasi = data[0];
                    },
                    error: function ($xhr, errorThrown) {
                        console.log(errorThrown);
                        console.warn($xhr.responseText);
                    }
                });
            }
        }
    }
});

function disableIsland(when) {
    var bridge = document.getElementsByClassName("jembatan_ku");
    for (let i = 0; i < bridge.length; i++) {
        bridge[i].style.pointerEvents = "none";
    }

    if (when != "start") {
        $.ajax({
            url: "new_phps/disable_pulau.php",
            method: "POST",
            data: {
                skill: when,
                pulau: clicked_island
            },
            success: function (data) {
                var island = document.getElementsByClassName("pulau_ku");
                for (let i = 0; i < island.length; i++) {
                    island[i].style.pointerEvents = "none";
                }
                console.log(data);

                data.forEach(function (item) {
                    console.log(item['_path']);
                    document.getElementById(item['_path']).style.pointerEvents = "auto";
                });
            },
            error: function ($xhr, errorThrown) {
                console.log(errorThrown);
                console.warn($xhr.responseText);
            }
        });
    }
}

function use(skill, target) {
    if (target != "none") {
        $.ajax({
            url: "new_phps/use_skill.php",
            type: "POST",
            dataType: "json",
            data: {
                skill: skill,
                pulau: target
            },
            success: function (result) {
                console.log(result);
                location.reload();
            },
            error: function ($xhr, errorThrown) {
                console.log(errorThrown);
                console.warn($xhr.responseText);
            }
        });
    } else { // JIKA BELUM ADA TARGET, PILIH TARGET
        if (skill == "Boom Mega Boom" || skill == "Meteor" || skill == "TBL TBL TBL") {
            currentSkill = skill;

            $('#modal_skill').modal('hide');
            _zoomOut();

            var pulau = document.getElementsByClassName("pulau_ku");
            for (let i = 0; i < pulau.length; i++) {
                pulau[i].style.pointerEvents = "auto";
            }

            // DISABLE PULAU & JEMBATAN SELAIN PULAU KECIL
            disableIsland(currentSkill);

            // NAVIGASI GANTI CANCEL BUTTON
            if (skill == "Boom Mega Boom") {
                document.body.style.cursor = "url(assets/image/cursor-boom.png) 25 25, auto";
                document.getElementById("choose-small").style.display = "block";
            } else if (skill == "Meteor") {
                document.body.style.cursor = "url(assets/image/cursor-meteor.png) 25 25, auto";
                document.getElementById("choose-small").style.display = "block";
            } else if (skill == "TBL TBL TBL") {
                document.body.style.cursor = "url(assets/image/cursor-tbl.png) 25 25, auto";
                document.getElementById("choose-all").style.display = "block";
            }
            document.getElementById("msg-choose").style.display = "block";
            document.getElementById("nav-cancel").style.display = "block";
            document.getElementById("nav-zoom-out").style.display = "none";
            document.getElementById("nav-back").style.display = "none";
            document.getElementById("nav-skill").style.display = "none";

            state = "choosing";
            console.log("targeted");
        } else if (skill == "Inventory Ganda" || skill == "X2 Social Credits") {
            console.log("halo");
            $.ajax({
                url: "new_phps/use_skill.php",
                method: "POST",
                data: {
                    skill: skill
                },
                success: function (result) {
                    console.log(result);
                    location.reload();
                },
                error: function ($xhr, errorThrown) {
                    console.log(errorThrown);
                    console.warn($xhr.responseText);
                }
            });
            console.log("non-targeted");
        }
        console.log("halo??");
    }
}

function build_jembatan(id_jembatan) {
    path_jembatan = id_jembatan;

    $.ajax({
        url: "new_phps/build_jembatan.php",
        method: "POST",
        data: {
            id_jembatan: id_jembatan
        },
        success: function (data) {
            console.log(data);

            if (data.length == 0) {
                console.log("tes");
                $('#modal_build').modal();
            }

            data.forEach(function (item) {
                if (item['username'] == username && item['proteksi'] == 0) {
                    // KAYU
                    if (item['tipe_jembatan'] == 1) {
                        document.getElementById("upkayu").classList.remove('hidden');
                        document.getElementById("harga").innerHTML = "8.500";
                    } else {
                        document.getElementById("upkayu").classList.add('hidden');
                    }

                    // BAJA
                    if (item['tipe_jembatan'] == 2) {
                        document.getElementById("upbaja").classList.remove('hidden');
                        document.getElementById("harga").innerHTML = "15.250";

                    } else {
                        document.getElementById("upbaja").classList.add('hidden');
                    }

                    // BETON
                    if (item['tipe_jembatan'] == 3) {
                        document.getElementById("upbeton").classList.remove('hidden');
                        document.getElementById("harga").innerHTML = "23.500";

                    } else {
                        document.getElementById("upbeton").classList.add('hidden');
                    }

                    $('#modal_upgrade').modal();
                }

                else if (item['username'] != username) {
                    // KAYU
                    if (item['tipe_jembatan'] == 1) {
                        if (item['proteksi'] == 1) {
                            document.getElementById("destkayup").classList.remove('hidden');
                        }
                        else {
                            document.getElementById("destkayu").classList.remove('hidden');
                        }
                    }

                    else if (item['tipe_jembatan'] == 2) {
                        if (item['proteksi'] == 1) {
                            document.getElementById("destbajap").classList.remove('hidden');
                        }

                        else {
                            document.getElementById("destbaja").classList.remove('hidden');
                        }
                    }

                    else if (item['tipe_jembatan'] == 3) {
                        if (item['proteksi'] == 1) {
                            document.getElementById("destbetonp").classList.remove('hidden');
                        }

                        else {
                            document.getElementById("destbeton").classList.remove('hidden');
                        }
                    }

                    $('#modal_destroy').modal();
                }
                else {
                    if (item['tipe_jembatan'] == 1) {
                        if (item['proteksi'] == 1) {
                            document.getElementById("info").innerHTML = `
                            <div class='col-12'>
                            <br>
                            <center>
                                <h1 style='margin-top: -20px;
    padding-bottom: 25px;'>Jembatan Kayu Proteksi</h1>
                            </center>
                            <h4>Jembatan ini dibangun oleh team: `+ item["nama_tim"] + `</h4>
                            
                            </div>
                            `;
                        }
                        else {
                            document.getElementById("info").innerHTML = `
                            <div class='col-12'>
                            <br>
                            <center>
                                <h1 style='margin-top: -20px;
    padding-bottom: 25px;'>Jembatan Kayu</h1>
                            </center>
                            <h4>Jembatan ini dibangun oleh team: `+ item["nama_tim"] + `</h4>
                            
                            </div>
                            `;
                        }
                    }

                    else if (item['tipe_jembatan'] == 2) {
                        if (item['proteksi'] == 1) {
                            document.getElementById("info").innerHTML = `
                            <div class='col-12'>
                            <br>
                            <center>
                                <h1 style='margin-top: -20px;
    padding-bottom: 25px;'>Jembatan Baja Proteksi</h1>
                            </center>
                            <h4>Jembatan ini dibangun oleh team: `+ item["nama_tim"] + `</h4>
                            
                            </div>
                            `;
                        }

                        else {
                            document.getElementById("info").innerHTML = `
                            <div class='col-12'>
                            <br>
                            <center>
                                <h1 style='margin-top: -20px;
    padding-bottom: 25px;'>Jembatan Baja</h1>
                            </center>
                            <h4>Jembatan ini dibangun oleh team: `+ item["nama_tim"] + `</h4>
                            
                            </div>
                            `;
                        }
                    }

                    else if (item['tipe_jembatan'] == 3) {
                        if (item['proteksi'] == 1) {
                            document.getElementById("info").innerHTML = `
                            <div class='col-12'>
                            <br>
                            <center>
                                <h1 style='margin-top: -20px;
    padding-bottom: 25px;'>Jembatan Beton Proteksi</h1>
                            </center>
                            <h4>Jembatan ini dibangun oleh team: `+ item["nama_tim"] + `</h4>
                            
                            </div>
                            `;
                        }

                        else {
                            document.getElementById("info").innerHTML = `
                            <div class='col-12'>
                            <br>
                            <center>
                                <h1 style='margin-top: -20px;
    padding-bottom: 25px;'>Jembatan Beton</h1>
                            </center>
                            <h4>Jembatan ini dibangun oleh team: `+ item["nama_tim"] + `</h4>
                            
                            </div>
                            `;
                        }
                    }

                    $('#modal_info').modal();
                }
            });
        },
        error: function () {
            console.log("ERROR");
        }
    })
}

$('#build').click(function () {
    var id_tipe = document.getElementById("session_tipe_jembatan").value;
    console.log(id_tipe);
    console.log(path_jembatan);

    $.ajax({
        url: "new_phps/post_pengiriman.php",
        method: "POST",
        data: {
            id_tipe: id_tipe,
            id_jembatan: path_jembatan
        },
        success: function (res) {
            document.location.reload(true);
            console.log(res);
        },
        error: function ($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    });
});

$('#upgrade').click(function () {
    var id_tipe = document.getElementById("session_tipe_jembatan").value;
    console.log(id_tipe);
    $.ajax({
        url: "new_phps/post_upgrade.php",
        method: "POST",
        data: {
            id_tipe: id_tipe,
            id_jembatan: path_jembatan
        },
        success: function (res) {
            document.location.reload(true);
            console.log(res);
        },
        error: function ($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    });
});

$('#destroy').click(function () {
    var id_tipe = document.getElementById("session_tipe_jembatan").value;
    console.log(id_tipe);

    $.ajax({
        url: "new_phps/post_destroy.php",
        method: "POST",
        data: {
            id_tipe: id_tipe,
            id_jembatan: path_jembatan
        },
        success: function (res) {
            document.location.reload(true);
            console.log(res);
        },
        error: function ($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    });
});

$('.jembatan_ku').click(function () {
    build_jembatan(this.id);
});

// MODAL BANGUN
var arr_j = ['jmbkayu', 'jmbbaja', 'jmbbeton'];
var arr_j2 = ['desckayu', 'descbaja', 'descbeton'];
var ss = document.forms['session_tipe']['session_tj'];

function on(id) {
    for (let i = 0; i < arr_j.length; i++) {
        if (arr_j[i] != id) {
            off(arr_j[i]);
        } else {
            document.getElementById(id).style.backgroundColor = "yellow";
            desckay(arr_j2[i]);
        }
    }

    if (id == "jmbkayu") {
        ss.setAttribute('value', '1');
    }
    else if (id == "jmbbaja") {
        ss.setAttribute('value', '2');
    }

    else if (id == "jmbbeton") {
        ss.setAttribute('value', '3');

    }

    console.log(document.getElementById("session_tipe_jembatan").value);
}

function desckay(id) {
    for (let i = 0; i < arr_j.length; i++) {
        if (arr_j2[i] != id) {
            document.getElementById(arr_j2[i]).classList.add('hidden');

        } else {
            document.getElementById(arr_j2[i]).classList.remove('hidden');
        }
    }
}

function build() {

}

function off(id) {
    document.getElementById(id).style.backgroundColor = "white";
}

function ambil_jembatan() {

}

// INISIALISASI
$(function () {
    get_jembatan();
    get_lokasi();
    load_map();
    disableIsland("start");
    // $("#modal_konfirmasi").modal();

    // ADD TREASURE
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes();
    if (time >= "19:00") {
        $.ajax({
            url: "new_phps/add_treasure.php",
            method: "POST",
            data: {
                pulau: ["path758", "path766", "path798"],
                harta: [21, 21, 18],
                time: 0
            }, success: function (data) {
                console.log(data);
            }, error: function ($xhr, errorThrown) {
                console.log(errorThrown);
                console.warn($xhr.responseText);
            }
        });
    }
    if (time >= "20:00") {
        $.ajax({
            url: "new_phps/add_treasure.php",
            method: "POST",
            data: {
                pulau: ["path878", "path778", "path738", "path910"],
                harta: [0, 0, 18, 21],
                time: 1
            }, success: function (data) {
                console.log(data);
            }, error: function ($xhr, errorThrown) {
                console.log(errorThrown);
                console.warn($xhr.responseText);
            }
        });
    }
    if (time >= "21:00") {
        $.ajax({
            url: "new_phps/add_treasure.php",
            method: "POST",
            data: {
                pulau: ["path674", "path934", "path770", "path946"],
                harta: [0, 22, 21, 23],
                time: 2
            }, success: function (data) {
                console.log(data);
            }, error: function ($xhr, errorThrown) {
                console.log(errorThrown);
                console.warn($xhr.responseText);
            }
        });
    }
    if (time >= "22:00") {
        $.ajax({
            url: "new_phps/add_treasure.php",
            method: "POST",
            data: {
                pulau: ["path802", "path862", "path910", "path938"],
                harta: [21, 19, 0, 22],
                time: 3
            }, success: function (data) {
                console.log(data);
            }, error: function ($xhr, errorThrown) {
                console.log(errorThrown);
                console.warn($xhr.responseText);
            }
        });
    }
});