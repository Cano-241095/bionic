document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    console.log('si esta');
    let $botonVenta = document.querySelector("#btnCrearPdfVenta");
    $botonVenta.addEventListener("click", () => {
        let nombreCliente = document.getElementById("nombreCliente").innerText;
        document.getElementById("nombreCliente").className = "box";
        console.log(nombreCliente);

        if (nombreCliente != 'Elegir Cliente') {
            console.log('si esta click');
            document.getElementById("btnCrearPdfVenta").style.display = "none";
            document.getElementById("busqueda").style.display = "none";
            document.getElementById("cliente").style.display = "none";
            document.getElementById("contenedor").style.display = "block";
            let $elementoParaConvertir = document.getElementById('contenedor'); // <-- Aquí puedes elegir cualquier elemento del DOM
            document.getElementById("menos").className = "d-none";
            document.getElementById("mas").className = "d-none";
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
            let ir = "compra.php?idVendedor=" + idVendedor + "&folio=" + folio + "&idCliente=" + idCliente;

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