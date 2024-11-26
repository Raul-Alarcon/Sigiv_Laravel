import JsBarcode from "jsbarcode";

export default function userBarCode(barcodeELement) {

    const generateBarCode = (code) => {
        if (code.length < 8) return;
        if (code.trim() === "") return; // Validar input vacío
        JsBarcode(barcodeELement.value, code, {
            format: "CODE128", // Formato del código de barras
            lineColor: "#000", // Color de las líneas
            width: 2, // Ancho de las líneas
            height: 100, // Altura del código de barras
            displayValue: true, // Mostrar el texto debajo del código de barras
        });
    }

    const downloadBarCode = (productName) => {
        const svg = barcodeELement.value;
        const svgData = new XMLSerializer().serializeToString(svg);
        const canvas = document.createElement("canvas");

        // Crea una imagen a partir del SVG
        const img = new Image();
        const svgBlob = new Blob([svgData], { type: "image/svg+xml" });
        const url = URL.createObjectURL(svgBlob);

        img.onload = () => {
            canvas.width = img.width;
            canvas.height = img.height + 30; // Añadimos espacio adicional para el nombre del producto
            const ctx = canvas.getContext("2d");

            // Establecer fondo blanco
            ctx.fillStyle = "#FFFFFF"; // Establecer el color de fondo (blanco)
            ctx.fillRect(0, 0, canvas.width, canvas.height); // Rellenar el canvas con blanco

            // Dibuja la imagen del código de barras en el canvas
            ctx.drawImage(img, 0, 30); // Mover la imagen para dejar espacio para el texto

            // Estilos para el texto (nombre del producto)
            ctx.font = "16px Arial"; // Establecer el tamaño y la fuente
            ctx.fillStyle = "#000";  // Establecer el color del texto
            ctx.textAlign = "center"; // Centrar el texto
            ctx.fillText(productName, canvas.width / 2, 20); // Dibujar el nombre del producto sobre el canvas

            // Convierte el canvas a imagen en formato PNG
            const imgURL = canvas.toDataURL("image/png");

            // Crear un enlace para descargar la imagen
            const a = document.createElement("a");
            a.href = imgURL;
            a.download = `barcode-${productName}.png`;
            a.click();
        };

        img.src = url;
    }

    const printBarcode = (productName) => {
        const svg = barcodeELement.value;
    
        // Crear un iframe oculto para enviar el contenido a imprimir
        const iframe = document.createElement("iframe");
        iframe.style.position = "absolute";
        iframe.style.width = "0px";
        iframe.style.height = "0px";
        iframe.style.border = "none";
        document.body.appendChild(iframe);
    
        // Al cargar el iframe, agregar el contenido y llamar a print
        iframe.onload = () => {
            const iframeDoc = iframe.contentWindow.document;
            iframeDoc.open();
            iframeDoc.write(`
          <html>
            <head>
              <style>
                body {
                  margin: 0; 
                  font-family: Arial, sans-serif;  
                  page-break-after: always;
                } 
                .header {
                  font-size: 20px;
                   /* font-weight: bold; */ 
                  margin-bottom: 10px;
                  text-align: center;
                }
                .barcode-container {
                  max-width: 100%;
                  height: auto;
                  margin: 0 auto;
                }
                  .container{
                    width: fit-content;
                }
                svg {
                  max-width: 100%;
                  height: auto;
                }
              </style>
            </head>
            <body> 
                <div class="container">
                    <div class="header">
                        ${productName} <!-- Cabecera: Nombre del producto -->
                    </div>
                    <div class="barcode-container">
                        ${svg.outerHTML} <!-- Aquí va el código de barras generado -->
                    </div>
                </div> 
            </body>
          </html>
        `);
            iframeDoc.close();
    
            // Ejecutamos el comando de impresión en el iframe
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        };
    
        // Cargar el iframe vacío
        iframe.src = "about:blank";
    };


    return {
        generateBarCode,
        downloadBarCode,
        printBarcode 
    }

}