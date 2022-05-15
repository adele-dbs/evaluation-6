let form = document.querySelector('form')

form.addEventListener('submit', (event) => {
  for(var count=0; count<form.elements.length; count++) {
    switch (form.elements[count].name) {
      case 'email':
        if (form.elements[count].value === '') {
          alert('L\'email est obligatoire')
          event.preventDefault();
      }
      break;
      case 'password':
        if (form.elements[count].value === '') {
          alert('Le mot de passe est obligatoire')
          event.preventDefault();
      }
      break;
    }
  }
})

