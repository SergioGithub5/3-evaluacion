
    
//Ejercicio 1
document.addEventListener("DOMContentLoaded", main);
 
function main() {
    //Ejercicio 2
    palabrasPorParrafo();
    //Ejercicio 3
    makeLink();
    //Ejercicio 4
    starH1();
    //Ejercicio 5
    document.getElementById("abstract").addEventListener("click", colorFondo);
    //Ejercicio 6
    document.getElementById("content").addEventListener("click", tamLetra);
    //Ejercicio 7
    let botones = document.getElementsByClassName("oculta");
    for (let index = 0; index < botones.length; index++) {
        botones[index].addEventListener("click", function (e) {
            ocultar(e.currentTarget);
            e.stopPropagation();
        });
    }
 
}
 
//ejercicio 2
function palabrasPorParrafo() {
    let parrafos = document.getElementsByTagName("p");
    for (let i = 0; i < parrafos.length; i++) {
        let palabras = parrafos[i].innerHTML.split(" ");
        palabras.push("<br><strong>total palabras: " + palabras.length + "</strong>");
        parrafos[i].innerHTML = palabras.join(" ");
    }
}
 
 
// ejercicio 3
 
function makeLink() {
    let parrafos = document.getElementsByTagName("p");
    for (let i = 0; i < parrafos.length; i++) {
        let palabras = parrafos[i].innerHTML.split(" ");
        for (let j = 0; j < palabras.length; j++) {
            if (palabras[j] == "nulla") {
                palabras[j] = "<a href='www.google.com'>" + palabras[j] + "</a>";
            }
        }
        parrafos[i].innerHTML = palabras.join(" ");
    }
}
 
// ejercicio 4
 
//https://lledogrupo.com/wp-content/uploads/2019/01/star-256.png
 
function starH1() {
    let h1 = document.getElementsByTagName("h1");
    for (let i = 0; i < h1.length; i++) {
        let star = document.createElement("img");
        star.src = "https://lledogrupo.com/wp-content/uploads/2019/01/star-256.png";
        star.width = "16";
        star.style.marginLeft = "10px";
        h1[i].appendChild(star);
    }
}
 
// Ejercicio 5
 
function colorFondo() {
    let color = window.getComputedStyle(this).getPropertyValue("background-color");
   
    this.style.backgroundColor = (color == 'rgb(144, 238, 144)') ? 'rgb(173, 216, 230)' : 'rgb(144, 238, 144)';
}
 
//Ejercicio 6
function tamLetra() {
    let tamanoOriginal = window.getComputedStyle(document.body).getPropertyValue('font-size');
    tamanoDocument = (parseFloat(tamanoOriginal.slice(0, -2)) * 2 + 1) + tamanoOriginal.slice(-2);
    let tamano = window.getComputedStyle(this).getPropertyValue('font-size');
    tamano = (parseFloat(tamano.slice(0, -2)) + 1) + tamano.slice(-2);
    this.style.fontSize = (tamano != tamanoDocument) ? tamano : tamanoOriginal;
}
 
//ejercicio 7
 
function ocultar(ele) {
    let hermano = ele.nextSibling;
    while (hermano.nodeName != "DIV") {
        hermano = hermano.nextSibling;
    };
    hermano.style.display = (ele.innerHTML == "Mostrar") ? "block" : "none";
    ele.innerHTML = (ele.innerHTML == "Mostrar") ? "Ocultar" : "Mostrar";
}