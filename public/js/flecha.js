
    var arriba;
    function subir() {
    if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
    window.scrollBy(0, -15);
    arriba = setTimeout('subir()', 10); //retardo en segundos
    }
    else clearTimeout(arriba);
    }