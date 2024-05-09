document.addEventListener("DOMContentLoaded", main);
 
function main() {
    document.getElementById("imprescindible").addEventListener("mousemove", colorFondo);
    document.getElementById("imprescindible").addEventListener("mousemove", tamLetra);
 
}

function colorFondo() {
    let color = window.getComputedStyle(this).getPropertyValue("background-color");
   
    this.style.backgroundColor = (color == 'rgb(144, 238, 144)') ? 'rgb(224, 255, 255)' : 'rgb(144, 238, 144)';
}
function tamLetra() {
    let tamanoOriginal = window.getComputedStyle(this).getPropertyValue('font-size');
    tamanoDocument = (parseFloat(tamanoOriginal.slice(0, -2)) * 2 + 1) + tamanoOriginal.slice(-2);
    let tamano = window.getComputedStyle(this).getPropertyValue('font-size');
    tamano = (parseFloat(tamano.slice(0, -2)) + 1) + tamano.slice(-2);
    this.style.fontSize = (tamano != tamanoDocument) ? tamano : tamanoOriginal;
}