let form = document.querySelector('form')

form.addEventListener('submit', (event) => {
  for(var count=0; count<form.elements.length; count++) {
    switch (form.elements[count].name) {
      case 'updatename':
        if (form.elements[count].value === '') {
          alert('Le nom est obligatoire')
          event.preventDefault();
      }
      break;
      case 'addname':
        if (form.elements[count].value === '') {
          alert('Le nom est obligatoire')
          event.preventDefault();
      }
      break;
    }
  }
})