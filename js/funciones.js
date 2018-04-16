/* 
 * Proyecto: Complete Cargo
 * File: funciones.js
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */

/* global numero, tipo, colocaDimensiones, calculaVolumen */





function colocaDimensiones() {
    var capa = document.getElementById("dimensiones");

    var sHtml = '';
    capa.innerHTML = sHtml;
    var contador = Number(numero.value);
    if (tipo.value === "No") {
        for (var i = 1; i <= contador; i++) {

            sHtml = sHtml + '<div>' +
                    '<label for="dimensiones" class="dimensiones">Dimensiones Empaque ' + i +
                    ':</label></div>' +
                    '<div class="dim">' +
                    '<div class="col-lg-3">' +
                    '<label for="alto' + i + '" class="control-label">Alto en cm</label>' +
                    '<input type="number" class="form-control" id="alto' + i + '" name="alto' + i + '"' +
                    'placeholder="Alto" style="width:80px" value="" required ' +
                    'onkeypress="return justNumbers(event);"></div>' +
                    '<div class="col-lg-3">' +
                    '<label for="ancho' + i + '" class="control-label">Ancho en cm</label>' +
                    '<input type="number" class="form-control" id="ancho' + i + '" name="ancho' + i + '"' +
                    'placeholder="Ancho" style="width:80px" value="" required ' +
                    'onkeypress="return justNumbers(event);"></div></div>' +
                    '<div class="dim">' +
                    '<div class="col-lg-3">' +
                    '<label for="largo' + i + '" class="control-label">Largo en cm</label>' +
                    '<input type="number" class="form-control" id="largo' + i + '" name="largo' + i + '"' +
                    'placeholder="Largo" style="width:80px" value="" required ' +
                    'onkeypress="return justNumbers(event);"></div>' +
                    '<div class="col-lg-3">' +
                    '<label for="peso' + i + '" class="control-label">Peso en kg</label>' +
                    '<input type="number" class="form-control" id="peso' + i + '" name="peso' + i + '"' +
                    'placeholder="Peso" style="width:80px" value="" required ' +
                    'onkeypress="return justNumbers(event);"></div></div>' +
                    '<div class="dim2">' +
                    '<div class="col-lg-4">' +
                    '<label for="pesovol' + i + '" class="control-label">Peso Volumétrico Kg</label>' +
                    '<input type="number" class="form-control" id="pesovol' + i + '" name="pesovol' + i + '"' +
                    'placeholder="Peso Voluméntrico ' + i + '" style="width:150px"' +
                    'step="any" readonly></div></div><br class="oculto">';
        }
        capa.innerHTML = sHtml;
        //Adicionar manejador de eventos para DOM
        for (var i = 1; i <= contador; i++) {
            var largo = document.getElementById('largo' + i);
            // var alto = document.getElementById('alto' + i);
            // var ancho = document.getElementById('ancho' + i);
            if (largo) {
                //   largo.addEventListener('keypress', justNumbers(event));
                largo.addEventListener('change', calculaVolumen);
            }
            //   if (alto)
            //   alto.addEventListener('keypress', justNumbers(event));
            //  if (ancho)
            //   ancho.addEventListener('keypress', justNumbers(event));
        }
    } else {
        var i = 1;
        sHtml = sHtml + '<div>' +
                '<label for="dimensiones" class="dimensiones">Dimensiones Empaque ' + i +
                ':</label></div>' +
                '<div class="dim">' +
                '<div class="col-lg-3">' +
                '<label for="alto' + i + '" class="control-label">Alto en cm</label>' +
                '<input type="number" class="form-control" id="alto' + i + '" name="alto' + i + '"' +
                'placeholder="Alto" style="width:80px" value="" required ' +
                'onkeypress="return justNumbers(event);"></div>' +
                '<div class="col-lg-3">' +
                '<label for="ancho' + i + '" class="control-label">Ancho en cm</label>' +
                '<input type="number" class="form-control" id="ancho' + i + '" name="ancho' + i + '"' +
                'placeholder="Ancho" style="width:80px" value="" required ' +
                'onkeypress="return justNumbers(event);"></div></div>' +
                '<div class="dim">' +
                '<div class="col-lg-3">' +
                '<label for="largo' + i + '" class="control-label">Largo en cm</label>' +
                '<input type="number" class="form-control" id="largo' + i + '" name="largo' + i + '"' +
                'placeholder="Largo" style="width:80px" value="" required ' +
                'onkeypress="return justNumbers(event);"></div>' +
                '<div class="col-lg-3">' +
                '<label for="peso' + i + '" class="control-label">Peso en kg</label>' +
                '<input type="number" class="form-control" id="peso' + i + '" name="peso' + i + '"' +
                'placeholder="Peso" style="width:80px" value="" required ' +
                'onkeypress="return justNumbers(event);"></div></div>' +
                '<div class="dim2">' +
                '<div class="col-lg-4">' +
                '<label for="pesovol' + i + '" class="control-label">Peso Volumétrico Kg</label>' +
                '<input type="number" class="form-control" id="pesovol' + i + '" name="pesovol' + i + '"' +
                'placeholder="Peso Volumétrico ' + i + '" style="width:150px"' +
                'step="any" readonly></div></div><br class="oculto">';

        capa.innerHTML = sHtml;

        var largo = document.getElementById('largo' + i);
        // var alto = document.getElementById('alto' + i);
        // var ancho = document.getElementById('ancho' + i);
        if (largo) {
            //largo.addEventListener('keypress', justNumbers(event));
            largo.addEventListener('change', calculaVolumen);
        }
        //  if (alto)
        // alto.addEventListener('keypress', justNumbers(event));

        // if (ancho)
        // ancho.addEventListener('keypress', justNumbers(event));
    }
}


function calculaVolumen() {
    var contador = Number(numero.value);
    var calto;
    var cancho;
    var clargo;
    var pesovol;
    var alto;
    var ancho;
    var largo;
    var volumen;
    for (var j = 1; j <= contador; j++) {
        //  alert("Alerta0 " + j);
        calto = document.getElementById("alto" + j.toString());
        cancho = document.getElementById("ancho" + j.toString());
        clargo = document.getElementById("largo" + j.toString());
        pesovol = document.getElementById("pesovol" + j.toString());
        alto = calto.value;
        ancho = cancho.value;
        largo = clargo.value;
        volumen = alto * ancho * largo * 400 / (100 * 100 * 100);
        pesovol.value = volumen.toString();

    }
}



function justNumbers(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum === 8) || (keynum === 46))
        return true;

    return /\d/.test(String.fromCharCode(keynum));
}

