window.addEventListener('messageToastr', event => { 
  const {title, message, type} = event.detail;
  
    if(type == 'success')
      iziToast.success({
        message,
        position: 'topRight'
      });
    
    if(type == 'error')
      iziToast.error({
        message,
        position: 'topRight'
      });
})

window.addEventListener('redirect', event => { 
  const {url} = event.detail
  setTimeout(function(){
    window.location.replace(url);
  }, 5000);
})

window.addEventListener('reload', () => { 
  setTimeout(function(){
    location.reload();
  }, 5000);
})

window.addEventListener('updateComponent', event => { 
  const {component} = event.detail
  Livewire.emitTo(component, 'render');
})

Livewire.on('delete', (id, component, method) => {
  console.log(id, component, method);
   swal({
    title: '¿Estas seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        Livewire.emitTo(component, method, id)
        swal('Tu registro ha sido eliminado', {
          icon: 'success',
        });
      } else {
        swal('¡Tu registro está a salvo!');
      }
    });
});

Livewire.on('modal', (id, component, method) => {
  Livewire.emitTo(component, method, id);
});

window.addEventListener('modalShow', event => { 
  $('#exampleModalCenter').modal('show')
})