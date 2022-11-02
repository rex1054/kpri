function menu(menu) {
    if (menu == 'beranda') {
        window.open(siteurl + 'admin', '_SELF');
    } else {
        window.open(siteurl + 'admin/' + menu, '_SELF');
    }
}

function registrasi(){
    window.open(siteurl + 'registrasi');
}

function add(what) {
    window.open(siteurl + 'admin/tambah/' + what, '_SELF');
}

function filt(tabel, nama, x) {
    console.log("nama = " + filter);
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(nama);
    filter = input.value.toUpperCase();
    table = document.getElementById(tabel);
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[x];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}

function bulann(halaman, bulan) {
    window.open(siteurl + 'admin/' + halaman + '/?m=' + bulan, "_SELF");
}

function tahunn(halaman, tahun) {
    window.open(siteurl + 'admin/' + halaman + '/?y=' + tahun, "_SELF");
}

function bulan(bulan) {
    window.open(siteurl + 'admin/?m=' + bulan, "_SELF");
}

function tahun(tahun) {
    window.open(siteurl + 'admin/?y=' + tahun, "_SELF");
}

function reset(page) {
    if (page == 'beranda') {
        window.open(siteurl + 'admin/', '_SELF');
    } else {
        window.open(siteurl + 'admin/' + page), '_SELF';
    }
}

function getYear(year) {
    for (i = new Date().getFullYear(); i > 1970; i--) {
        if (year == i) {
            $('#yearpicker').append($('<option />').val(i).attr("selected", "selected").html(i));
        } else {
            $('#yearpicker').append($('<option />').val(i).html(i));
        }
    }
}

function fetch_akun(id, val) {
    $.ajax({
        type: 'post',
        url: 'getAkun.php',
        data: {
            get_option: val
        },
        success: function(response) {
            document.getElementById(id).innerHTML = $.trim(response);
        }
    });
}

$(document).ready(function() {
    $('#tabel-transaksi').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
        },
        dom: 'Bfrtip',
        paging: true,
        "pageLength": 7,
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    });
});

$(document).ready(function() {
    $('#tabel-pegawai').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
        },
        dom: 'Bfrtip',
        paging: true,
        "pageLength": 7,
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    });
});

function updateProfil(nip) {
    window.open(siteurl + "admin/profil/update/?nip=" + nip, "_SELF");
}
function updateAnggota(nip) {
    window.open(siteurl + "admin/detil-pengguna/update/?nip=" + nip, "_SELF");
}