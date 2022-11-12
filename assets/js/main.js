// start modal listener
// start modal ktp suami
var modala = document.getElementById("modal-ktp-suami");

var btna = document.getElementById("ktp-suami-show");

var spana = document.getElementById("closea");

btna.onclick = function() {
  modala.style.display = "block";
}

spana.onclick = function() {
  modala.style.display = "none";
}
// end modal ktp suami

// start modal ktp istri
var modalb = document.getElementById("modal-ktp-istri");

var btnb = document.getElementById("ktp-istri-show");

var spanb = document.getElementById("closeb");

btnb.onclick = function() {
  modalb.style.display = "block";
}

spanb.onclick = function() {
  modalb.style.display = "none";
}
// end modal ktp istri

// start modal 3x4
var modalc = document.getElementById("modal-3x4");

var btnc = document.getElementById("foto-3x4-show");

var spanc = document.getElementById("closec");

btnc.onclick = function() {
  modalc.style.display = "block";
}

spanc.onclick = function() {
  modalc.style.display = "none";
}
// end modal 3x4

function tampilsandi(){
  var a = document.getElementById("tampilkan-sandi");
  var b = document.getElementById("kpri-kata-sandi");
  var c = document.getElementById("kpri-logo-password");
  a.setAttribute("id", "sembunyikan-sandi");
  a.setAttribute("onclick", "sembunyisandi()");
  b.setAttribute("type", "text");
  c.setAttribute("src", siteurl+"assets/hide.png");
};

function sembunyisandi(){
  var a = document.getElementById("sembunyikan-sandi");
  var b = document.getElementById("kpri-kata-sandi");
  var c = document.getElementById("kprilogo-password");
  a.setAttribute("id", "tampilkan-sandi");
  a.setAttribute("onclick", "tampilsandi()")
  b.setAttribute("type", "password");
  c.setAttribute("src", siteurl+"assets/show.png");
};

function rtampilsandi(){
  var a = document.getElementById("tampilkan-sandi");
  var b = document.getElementById("kata-sandi");
  var c = document.getElementById("kpri-logo-password");
  a.setAttribute("id", "sembunyikan-sandi");
  a.setAttribute("onclick", "rsembunyisandi()");
  b.setAttribute("type", "text");
  c.setAttribute("src", siteurl+"assets/hide.png");
};

function rsembunyisandi(){
  var a = document.getElementById("sembunyikan-sandi");
  var b = document.getElementById("kata-sandi");
  var c = document.getElementById("kpri-logo-password");
  a.setAttribute("id", "tampilkan-sandi");
  a.setAttribute("onclick", "rtampilsandi()")
  b.setAttribute("type", "password");
  c.setAttribute("src", siteurl+"assets/show.png");
};

function tampilsandia(){
  var a = document.getElementById("tampilkan-sandia");
  var b = document.getElementById("kpri-kata-sandia");
  var c = document.getElementById("kpri-logo-passworda");
  a.setAttribute("id", "sembunyikan-sandia");
  a.setAttribute("onclick", "sembunyisandia()");
  b.setAttribute("type", "text");
  c.setAttribute("src", siteurl+"assets/hide.png");
};

function sembunyisandia(){
  var a = document.getElementById("sembunyikan-sandia");
  var b = document.getElementById("kpri-kata-sandia");
  var c = document.getElementById("kpri-logo-passworda");
  a.setAttribute("id", "tampilkan-sandia");
  a.setAttribute("onclick", "tampilsandia()")
  b.setAttribute("type", "password");
  c.setAttribute("src", siteurl+"assets/show.png");
};

function tampilsandib(){
  var a = document.getElementById("tampilkan-sandib");
  var b = document.getElementById("kpri-kata-sandib");
  var c = document.getElementById("kpri-logo-passwordb");
  a.setAttribute("id", "sembunyikan-sandib");
  a.setAttribute("onclick", "sembunyisandib()");
  b.setAttribute("type", "text");
  c.setAttribute("src", siteurl+"assets/hide.png");
};

function sembunyisandib(){
  var a = document.getElementById("sembunyikan-sandib");
  var b = document.getElementById("kpri-kata-sandib");
  var c = document.getElementById("kpri-logo-passwordb");
  a.setAttribute("id", "tampilkan-sandib");
  a.setAttribute("onclick", "tampilsandib()")
  b.setAttribute("type", "password");
  c.setAttribute("src", siteurl+"assets/show.png");
};

function masuk(){
  window.open(siteurl, '_SELF');
}

var moda = document.getElementById("modal-ubah-sandi");

var spanmoda = document.getElementById("closesandi");

spanmoda.onclick = function() {
  moda.style.display = "none";
}

function ubahFotoKTPSuami(){
  modala.style.display = "none";
  var modalzz = document.getElementById("modal-ubah-foto-ktp-suami");
  modalzz.style.display = "block";
}

var modalzz = document.getElementById("modal-ubah-foto-ktp-suami");

var spanzz = document.getElementById("closezz");

spanzz.onclick = function() {
  modalzz.style.display = "none";
}

function ubahFotoKTPIstri(){
  modalb.style.display = "none";
  var modalzzz = document.getElementById("modal-ubah-foto-ktp-Istri");
  modalzzz.style.display = "block";
}

var modalzzz = document.getElementById("modal-ubah-foto-ktp-Istri");

var spanzzz = document.getElementById("closezzz");

spanzzz.onclick = function() {
  modalzzz.style.display = "none";
}

function ubahFoto3x4(){
  modalc.style.display = "none";
  var modalzzzz = document.getElementById("modal-ubah-foto-3x4");
  modalzzzz.style.display = "block";
}

var modalzzzz = document.getElementById("modal-ubah-foto-3x4");

var spanzzzz = document.getElementById("closezzzz");

spanzzzz.onclick = function() {
  modalzzzz.style.display = "none";
}

function ubahsandi(){
  var moda = document.getElementById('modal-ubah-sandi');
  moda.style.display = 'block';
}

function resetsandi(){
  window.open('../../m/kpri.model.profile-updater.php?a=10');
}

function hapus(who, what, id) {
  window.open(siteurl + 'hapus/' + what + '/?u=' + who + '&id=' + id, '_SELF');
}

window.onclick = function(event) {
  if (event.target == modala) {
    modala.style.display = "none";
  } else if (event.target == modalb) {
    modalb.style.display = "none";
  } else if (event.target == modalc) {
    modalc.style.display = "none";
  } else if (event.target == modalz) {
    modalz.style.display = "none";
  } else if (event.target == modalzz) {
    modalzz.style.display = "none";
  } else if (event.target == modalzzz) {
    modalzzz.style.display = "none";
  } else if (event.target == modalzzzz) {
    modalzzzz.style.display = "none";
  } else if (event.target == moda) {
    moda.style.display = "none";
  }
}