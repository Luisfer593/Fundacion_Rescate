function mostrarImagen() {
    var archivo = document.getElementById("nuevaFoto").files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        document.getElementById("previsualizar").src = reader.result;
    }

    if (archivo) {
        reader.readAsDataURL(archivo);
    } else {
        document.getElementById("previsualizar").src = "";
    }
}
function mostrarImagen1() {
    const nuevaImagenInput = document.getElementById("nuevaImagen");
    const nuevaFotoInput = document.getElementById("nuevaFoto");
    const previsualizar = document.getElementById("previsualizar");

    if (nuevaFotoInput.files && nuevaFotoInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previsualizar.src = e.target.result;
            nuevaImagenInput.value = "1"; // Cambia solo si se selecciona una nueva imagen
        };
        reader.readAsDataURL(nuevaFotoInput.files[0]);
    }
}

function guardarCambios() {
    // Captura los cambios en el campo "Estado" y envíalos al servidor
    var form = document.getElementById("estadoForm");
    var formData = new FormData(form);
    formData.append("guardar", "guardar"); // Agrega un campo adicional para identificar la acción en el servidor

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_estado.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Procesa la respuesta del servidor (puedes mostrar un mensaje de éxito o manejar errores)
            var respuesta = JSON.parse(xhr.responseText);
            if (respuesta.success) {
                alert("Cambios guardados exitosamente.");
            } else {
                alert("Error al guardar los cambios: " + respuesta.message);
            }
        }
    };
    xhr.send(formData);
}


