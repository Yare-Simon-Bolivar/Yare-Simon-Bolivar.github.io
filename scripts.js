document.addEventListener("DOMContentLoaded", function() {
    cargarFotos("eventos-proximos", "proximos");
    cargarFotos("eventos-actuales", "actuales");
    cargarFotos("eventos-anteriores", "anteriores");
});

function cargarFotos(contenedorId, evento) {
    fetch(`get_fotos.php?evento=${evento}`)
        .then(response => response.json())
        .then(data => {
            const contenedor = document.getElementById(contenedorId);
            data.forEach(foto => {
                const img = document.createElement("img");
                img.src = foto.ruta;
                contenedor.appendChild(img);
            });
        });
}
