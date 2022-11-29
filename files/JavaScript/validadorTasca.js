function validador(){
    let solucio="";
    let gridcheck;
    let gestio="";
    solucio = document.getElementById("solucio").value;
    gridcheck = document.getElementById("gridCheck").checked;
    gestio = document.getElementById("gestio").value;
    if(gridcheck!=false){
      gridcheck=" SI ";
    }else if(gridcheck==false){
      gridcheck=" NO "
    }
    var campo1 = document.getElementById('texto_nav1');
    campo1.innerHTML = solucio;
    var campo2 = document.getElementById('texto_nav2');
    campo2.innerHTML = gridcheck;
    var campo3 = document.getElementById('texto_nav3');
    campo3.innerHTML = gestio;

    // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }          
    }
    function guarda(){
    let solucio="";
    let gridcheck;
    let gestio="";
    var modal = document.getElementById("myModal");
    solucio = document.getElementById("solucio").value;
    gridcheck = document.getElementById("gridCheck").checked;
    gestio = document.getElementById("gestio").value;
    
      
      $.ajax({
        type:'POST',
        url:'inserirTasca.php',
        data: {solucio,gridcheck,gestio},
        success:function(data){
        console.log("enviado");
      }
    })
      modal.style.display = "none";


    }