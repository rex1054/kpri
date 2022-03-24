var siteurl = "http://127.0.0.1:80/kpri/";

function menu(menu) {
    if (menu == 'beranda') {
        window.open(siteurl + 'admin', '_SELF');
    } else {
        window.open(siteurl + 'admin/' + menu, '_SELF');
    }
}