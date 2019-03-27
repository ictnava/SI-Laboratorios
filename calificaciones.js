//var peli = document.getElementById("peli");
//document.getElementById("titulo").innerText = peli.value;
//REACCIONES
  var heart = document.getElementById("heart");
  var like = document.getElementById("like");
  var dislike = document.getElementById("dislike");
  var sad = document.getElementById("sad");
  var reaccion = document.getElementById("reaccion");
  heart.addEventListener("click",reaccionh);
  like.addEventListener("click",reaccionl);
  dislike.addEventListener("click",reacciond);
  sad.addEventListener("click",reaccions);
  function reaccionh(){
        reaccion.value = '4';
  }
  function reaccionl(){
    reaccion.value = '3';
      }
    function reacciond(){
        reaccion.value = '2';
      }
      function reaccions(){
        reaccion.value = '1';
      }
      //poner en un hiden input la cantidad de la calificacion

      