function menu(menu) {
    if (menu == 'beranda') {
        window.open(siteurl + 'pimpinan', '_SELF');
    } else {
        window.open(siteurl + 'pimpinan/' + menu, '_SELF');
    }
}

function acc(id, pimpinan, acc){
    window.open(siteurl + 'pimpinan/detil-ajuan/acc.php?id='+id+'&nip='+pimpinan+'&acc='+acc, "_SELF");
}

function bulann(halaman, bulan) {
    window.open(siteurl + 'pimpinan/' + halaman + '/?m=' + bulan, "_SELF");
}

function tahunn(halaman, tahun) {
    window.open(siteurl + 'pimpinan/' + halaman + '/?y=' + tahun, "_SELF");
}

function bulan(bulan) {
    window.open(siteurl + 'pimpinan/?m=' + bulan, "_SELF");
}

function tahun(tahun) {
    window.open(siteurl + 'pimpinan/?y=' + tahun, "_SELF");
}

function reset(page) {
    if (page == 'beranda') {
        window.open(siteurl + 'pimpinan/', '_SELF');
    } else {
        window.open(siteurl + 'pimpinan/' + page);
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
    window.open(siteurl + "pimpinan/profil/update/?nip=" + nip, "_SELF");
}