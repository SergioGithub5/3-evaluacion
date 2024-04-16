document.addEventListener("DOMContentLoaded", main)
    
function main(){
    count();
}

 function count(){

    const paraf = document.getElementsByTagName("p");

    for(let i = 0; i< paraf.length; i++){
        const palabras = paraf[i].textContent.split(" ").length;
        const textoConteo = document.createTextNode("Total palabras: " + palabras);
        const negrita = document.createElement("strong");

        negrita.appendChild(textoConteo);
        paraf[i].appendChild(document.createElement("br"));
        paraf[i].appendChild(negrita);
    }

} 
