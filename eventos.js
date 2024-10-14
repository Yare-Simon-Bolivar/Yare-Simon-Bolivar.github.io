document.addEventListener("DOMContentLoaded", function() {
    fetch('get_eventos.php')
        .then(response => response.json())
        .then(data => {
            const contenedor = document.querySelector('.contenedor');
            if (data.length > 0) {
                data.forEach(evento => {
                    const card = document.createElement('div');
                    card.classList.add('card');
                    card.innerHTML = `
                        <h3>${evento.nombre}</h3>
                        <p><strong>Tipo:</strong> ${evento.tipo}</p>
                        <p><strong>Descripción:</strong> ${evento.descripcion.replace(/\n/g, '<br>')}</p>
                        <p><strong>Ubicación:</strong> ${evento.ubicacion}</p>
                    `;
                    contenedor.appendChild(card);
                });
            } else {
                contenedor.innerHTML = "<p>No hay eventos disponibles.</p>";
            }
        })
        .catch(error => {
            console.error('Error al obtener los eventos:', error);
        });
});
