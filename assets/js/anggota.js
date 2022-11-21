function menu(menu) {
    if (menu == 'beranda') {
        window.open(siteurl + 'anggota', '_SELF');
    } else {
        window.open(siteurl + 'anggota/' + menu, '_SELF');
    }
}

function addSetoran(){
    window.open(siteurl + 'anggota/tambah/setoran.php', '_SELF');
}

function filt(tabel, nama,x) {
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
    window.open(siteurl + 'anggota/' + halaman + '/?m=' + bulan, "_SELF");
}

function tahunn(halaman, tahun) {
    window.open(siteurl + 'anggota/' + halaman + '/?y=' + tahun, "_SELF");
}

function bulan(bulan) {
    window.open(siteurl + 'anggota/?m=' + bulan, "_SELF");
}

function tahun(tahun) {
    window.open(siteurl + 'anggota/?y=' + tahun, "_SELF");
}

function reset(page) {
    if (page == 'beranda') {
        window.open(siteurl + 'anggota/', '_SELF');
    } else {
        window.open(siteurl + 'anggota/' + page);
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

function sortTable(id, n) {
    console.log("kolom penyortir = " + n);
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById(id);
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
            first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (n == 0) {
                if (dir == "asc") {
                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (Number(x.innerHTML) < Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }
            } else {
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

$(document).ready(function() {
    $('#tabel-transaksi').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
        },
        dom: 'Bfrtip',
        order: [[0, 'desc']],
        paging: true,
        "pageLength": 7,
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    });
});

function add(what) {
    window.open(siteurl + 'anggota/tambah/' + what, '_SELF');
}

function updateProfil(nip) {
    window.open(siteurl + "anggota/profil/update/?nip=" + nip, "_SELF");
}