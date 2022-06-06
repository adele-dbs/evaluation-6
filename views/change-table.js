const menu = document.getElementById('menu');

changeTable = (ev) => {
   const tableName = ev.target.value;
   console.log(tableName)
   // votre code ici
}

menu.addEventListener('change', changeTable);


//si click sur le menu
//affiche la table correspondante
$(document).ready(() => {
  $('#menu').click(function () {
      $('#tableValue').html($(this).val())
  })
});