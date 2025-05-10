$('.eliminar').submit(function(e){
  e.preventDefault();
      Swal.fire({
      title: '¿Desea Eliminar su Perfil M&eacutedico?',
      text: 'Tenga en cuenta que esta acción es irreversible y sus datos una vez borrados serán irrecuperables. No se borrará su Usuario, sólo su Perfil Médico y la configuración de Calendario. Costo adicional 1$ para agregar nuevamente. Una vez elimine notifique por chat para habilitar el botón Crear Médico',
      icon: 'question',
      iconColor:'yellow',
      showCancelButton:'true',
      cancelButtonText:'cancelar',
      cancelButtonColor:'#007bff',
      confirmButtonText: 'Eliminar',
      confirmButtonColor: 'red'
    }).then((result) => {
        if(result.value){
            this.submit();
        }
    })
});