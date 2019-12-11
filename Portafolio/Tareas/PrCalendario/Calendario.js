meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octurbre", "Noviembre", "Diciembre"]
lasemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
diassemana = ["L", "K", "M", "J", "V", "S", "D"]

window.onload = function () {
    hoy = new this.Date();

    diasemhoy = hoy.getDay();
    diahoy = hoy.getDate();
    meshoy = hoy.getMonth();
    annohoy = hoy.getFullYear();

    tit = document.getElementById("titulos");
    ant = document.getElementById("anterior");
    pos = document.getElementById("posterior");

    f0 = document.getElementById("fila0");

    pie = document.getElementById("fechaactual");
    pie.innerHTML += lasemana[diasemhoy] + ", " + diahoy + " de " + meses[meshoy] + " de " + annohoy;

    document.buscar.buscaanno.value = annohoy;

    mescal = meshoy;
    annocal = annohoy;

    cabecera()
    primeralinea()
    escribirdias()
}

function cabecera() {
    tit.innerHTML = meses[mescal] + " de " + annocal;
    mesant = mescal - 1;
    mespos = mescal + 1;
    if (mesant < 0) {
        mesant = 11;
    }
    if (mespos > 11) {
        mespos = 0;
    }
    ant.innerHTML = meses[mesant];
    pos.innerHTML = meses[mespos];
}

function primeralinea() {
    for (let i = 0; i < 7; i++) {
        celda0 = f0.getElementsByTagName("th")[i];
        celda0.innerHTML = diassemana[i];
    }
}

function escribirdias() {
    primeromes = new Date(annocal, mescal, "1");
    prsem = primeromes.getDay();
    prsem--;
    if (prsem == -1) { prsem = 6 }
    diaprmes = primeromes.getDate();
    prcelda = diaprmes - prsem;
    empezar = primeromes.setDate(prcelda);
    diames = new Date();
    diames.setTime(empezar);

    for (let i = 1; i < 7; i++) {
        fila = document.getElementById("fila" + i);
        for (let j = 0; j < 7; j++) {
            midia = diames.getDate()
            mimes = diames.getMonth()
            mianno = diames.getFullYear()
            celda = fila.getElementsByTagName("td")[j]
            celda.innerHTML = midia;

            celda.style.backgroundColor = "#9bf5ff";
            celda.style.color = "#8D3F36";

            if (j == 6) {
                celda.style.color = "#f11445";
            }

            if (mimes != mescal) {
                celda.style.color = "#a0babc";
            }

            if (mimes == meshoy && midia == diahoy && mianno == annohoy) {
                celda.style.backgroundColor = "#f0b1e9";
                celda.innerHTML = "<cite title='Fecha Actual'>" + midia + "</cite>";
            }

            midia = midia + 1;
            diames.setDate(midia);
        }
    }
}

function mesantes() {
    nuevomes = new Date()
    primeromes--;
    nuevomes.setTime(primeromes)
    mescal = nuevomes.getMonth()
    annocal = nuevomes.getFullYear()
    cabecera()
    escribirdias()
}

function mesdespues() {
    nuevomes = new Date()
    tiempounix = primeromes.getTime()
    tiempounix = tiempounix + (45 * 24 * 60 * 60 * 1000)
    nuevomes.setTime(tiempounix)
    mescal = nuevomes.getMonth()
    annocal = nuevomes.getFullYear()
    cabecera()
    escribirdias()
}
function actualizar() {
    mescal = hoy.getMonth()
    annocal = hoy.getFullYear()
    cabecera()
    escribirdias()
}

function mifecha() {
    mianno = document.buscar.buscaanno.value;
    listameses = document.buscar.buscames;
    opciones = listameses.options;
    num = listameses.selectedIndex
    mimes = opciones[num].value;
    if (isNaN(mianno) || mianno < 1) {
        alert("El año no es válido: \n debe ser un número mayor que cero")
    }
    else {
        mife = new Date();
        mife.setMonth(mimes);
        mife.setFullYear(mianno);
        mescal = mife.getMonth();
        annocal = mife.getFullYear();
        cabecera()
        escribirdias()
    }
}
