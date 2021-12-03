
document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    let $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
        document.getElementById("btnCrearPdf").style.display = "none";
        document.getElementById("busqueda").style.display = "none";
        document.getElementById("contenedor").style.display = "block";
        document.getElementById("volver").style.display = "flex";
        let $elementoParaConvertir = document.getElementById('contenedor'); // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                margin: 0,
                filename: 'Presupuesto.pdf',
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
    });
    // // Escuchamos el click del botón volver
    // let $volver = document.querySelector("#volver");
    // $volver.addEventListener("click", () => {
    //     console.log('<?php echo Hola mundo?>');
    // });
});