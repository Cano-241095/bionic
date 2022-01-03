document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    console.log('si esta');
    
    let iva = 1;
    let valorIva = .16;
    let dolar = document.querySelector('#resultado').innerHTML;
    let subTotal1 = document.querySelector('#totalF1').innerHTML;
    document.querySelector('#iva1').innerHTML = (subTotal1 * valorIva).toFixed(2);
    document.querySelector('#totalFinal1').innerHTML = (parseInt(subTotal1) + subTotal1 * valorIva).toFixed(2);
    document.querySelector('#totalFinalMXN1').innerHTML = ((parseInt(subTotal1) + subTotal1 * valorIva) * dolar).toFixed(2);

    let subTotal2 = document.querySelector('#totalF2').innerHTML;
    document.querySelector('#iva2').innerHTML = (subTotal2 * valorIva).toFixed(2);
    document.querySelector('#totalFinal2').innerHTML = (parseInt(subTotal2) + subTotal2 * valorIva).toFixed(2);
    document.querySelector('#totalFinalMXN2').innerHTML = ((parseInt(subTotal2) + subTotal2 * valorIva) * dolar).toFixed(2);

    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------

    let $botonIvaSi = document.querySelector("#ivaSi1");
    $botonIvaSi.addEventListener("click", () => {
        let subTotal = document.querySelector('#totalF1').innerHTML;
        document.querySelector('#iva1').innerHTML = (subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinal1').innerHTML = (parseInt(subTotal) + subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinalMXN1').innerHTML = ((parseInt(subTotal) + subTotal * valorIva) * dolar).toFixed(2);

        document.querySelector('#iva2').innerHTML = (subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinal2').innerHTML = (parseInt(subTotal) + subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinalMXN2').innerHTML = ((parseInt(subTotal) + subTotal * valorIva) * dolar).toFixed(2);
        iva = 1;
    });

    let $botonIvaNo = document.querySelector("#ivaNo1");
    $botonIvaNo.addEventListener("click", () => {
        let subTotal = document.querySelector('#totalF1').innerHTML;
        document.querySelector('#iva1').innerHTML = (subTotal * 0).toFixed(2);
        document.querySelector('#totalFinal1').innerHTML = (parseInt(subTotal) + subTotal * 0).toFixed(2);
        document.querySelector('#totalFinalMXN1').innerHTML = (subTotal * dolar).toFixed(2);

        document.querySelector('#iva2').innerHTML = (subTotal * 0).toFixed(2);
        document.querySelector('#totalFinal2').innerHTML = (parseInt(subTotal) + subTotal * 0).toFixed(2);
        document.querySelector('#totalFinalMXN2').innerHTML = (subTotal * dolar).toFixed(2);
        iva = 0;
    });

    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------
    let $botonIvaSi2 = document.querySelector("#ivaSi2");
    $botonIvaSi2.addEventListener("click", () => {
        let subTotal = document.querySelector('#totalF2').innerHTML;
        document.querySelector('#iva2').innerHTML = (subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinal2').innerHTML = (parseInt(subTotal) + subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinalMXN2').innerHTML = ((parseInt(subTotal) + subTotal * valorIva) * dolar).toFixed(2);

        document.querySelector('#iva1').innerHTML = (subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinal1').innerHTML = (parseInt(subTotal) + subTotal * valorIva).toFixed(2);
        document.querySelector('#totalFinalMXN1').innerHTML = ((parseInt(subTotal) + subTotal * valorIva) * dolar).toFixed(2);
        iva = 1;
    });

    let $botonIvaNo2 = document.querySelector("#ivaNo2");
    $botonIvaNo2.addEventListener("click", () => {
        let subTotal = document.querySelector('#totalF2').innerHTML;
        document.querySelector('#iva2').innerHTML = (subTotal * 0).toFixed(2);
        document.querySelector('#totalFinal2').innerHTML = (parseInt(subTotal) + subTotal * 0).toFixed(2);
        document.querySelector('#totalFinalMXN2').innerHTML = (subTotal * dolar).toFixed(2);

        document.querySelector('#iva1').innerHTML = (subTotal * 0).toFixed(2);
        document.querySelector('#totalFinal1').innerHTML = (parseInt(subTotal) + subTotal * 0).toFixed(2);
        document.querySelector('#totalFinalMXN1').innerHTML = (subTotal * dolar).toFixed(2);
        iva = 0;
    });

    
    let $botonVenta = document.querySelector("#btnCrearPdfVenta");

    $botonVenta.addEventListener("click", () => {
        let nombreCliente = document.getElementById("nombreCliente").innerText;
        document.getElementById("nombreCliente").className = "box";
        console.log(nombreCliente);

        if (nombreCliente != 'Elegir Cliente') {
            console.log('si esta click');
            document.getElementById("btnCrearPdfVenta").style.display = "none";
            document.getElementById("busqueda").style.display = "none";
            document.getElementById("envidoI").style.display = "none";
            document.getElementById("cliente").style.display = "none";
            document.getElementById("contenedor").style.display = "block";
            let $elementoParaConvertir = document.getElementById('contenedor'); // <-- Aquí puedes elegir cualquier elemento del DOM
            document.getElementById("menos1").style.display = "none";
            document.getElementById("mas1").style.display = "none";
            document.getElementById("menos2").style.display = "none";
            document.getElementById("mas2").style.display = "none";
            let folio = document.getElementById("folio").innerText;
            let idCliente = document.getElementById("idCliente").innerText;
            let idVendedor = document.getElementById("idVendedor").innerText;
            console.log('ya nbo esta');
            html2pdf()
                .set({
                    margin: 0,
                    filename: 'Nota_' + folio + '.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.7
                    },
                    html2canvas: {
                        scale: 2, // A mayor escala, mejores gráficos, pero más peso
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a4",
                        orientation: 'portrait' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));
            console.log('valio pispiote');
            let ir = "compra.php?idVendedor=" + idVendedor + "&folio=" + folio + "&idCliente=" + idCliente + "&iva=" + iva;
            setTimeout("location.href='" + ir + "'", 1500);
        }
    });

    // esto es para abrir con el select
    $("select").click(function () {
        var open = $(this).data("isopen");
        if (open) {
            window.location.href = $(this).val()
        }
        //set isopen to opposite so next time when use clicked select box
        //it wont trigger this event
        $(this).data("isopen", !open);
    });
});