// function openForm() {
//     document.getElementById("popup").classList.add("active");
//   }
  
//   function closeForm() {
//     document.getElementById("popup").classList.remove("active");
//   }

function openForm(projetId) {
  document.getElementById("popup-" + projetId).classList.add("active");
}

function closeForm(projetId) {
  document.getElementById("popup-" + projetId).classList.remove("active");
}


