  
//funcion para que la respuesta a la pregunta se despliegue

  function toggleFaq(faqNumber) {

   //seleccion de la pregunta clickeada y el simbolo del inicio

    var faqBody = document.getElementById('faq' + faqNumber);
    var symbol = document.getElementById('symbol' + faqNumber);


// cambio de clases segun el estado de la pregunta

    if (faqBody.style.display === "none" || faqBody.style.display === "") {
      faqBody.style.display = "block";
      symbol.textContent = "−";  // Cambia a "menos" cuando se alterna
    } else {
      faqBody.style.display = "none";
      symbol.textContent = "+";  // Cambia a "más" cuando vuelve a su estado normal
    }
    }