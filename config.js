var siteurl;
var domain = window.location.hostname;
if(domain == '127.0.0.1'){
    siteurl = 'http://'+domain+'/kpri/';
} else {
    siteurl = 'https://'+domain+'/';
}