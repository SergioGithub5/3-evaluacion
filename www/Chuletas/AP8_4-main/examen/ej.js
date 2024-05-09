var contador = 0;
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("myForm").addEventListener("submit", function(event) {
        var titulo = document.getElementById("titulo").value;
        var tituloError = document.getElementById("tituloError");

        if (titulo.length < 3) {
            contador++; 
            if (contador >= 3) {
                var mensaje = document.createElement("h3");
                mensaje.textContent = "Demasiados intentos, vuelva más tarde :(";
                var contenedorBoton = document.getElementById("boton").parentNode;
                contenedorBoton.innerHTML = ""; 
                contenedorBoton.appendChild(mensaje);
                event.preventDefault();
                var container = document.querySelector(".container")
                container.style.backgroundColor= "red";
            }
            tituloError.textContent = "El título debe tener al menos 3 caracteres ";
            event.preventDefault();
        } else {
            tituloError.textContent = ""; 
        }
    });

    let boton = document.getElementById('susto');
    boton.addEventListener("click", function () {
      document.body.innerHTML="";
      var foto=document.createElement("img");
      foto.src="javi.webp";
      document.body.appendChild(foto);
    });
});