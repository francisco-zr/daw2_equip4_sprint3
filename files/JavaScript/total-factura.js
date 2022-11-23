function calcular_total(){
    const total1 = document.getElementById("page1").value;
    const total2 = document.getElementById("page2").value;
    const total3 = document.getElementById("page3").value;

    const totalFactura = total1+total2+total3;

    document.getElementById("total-presupost").innerHTML = "El presupost total és:" + totalFactura;
}