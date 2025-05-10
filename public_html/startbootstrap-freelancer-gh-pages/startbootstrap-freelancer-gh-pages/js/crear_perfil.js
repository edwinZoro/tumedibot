$('.crear_perfil').click(function(e){
    e.preventDefault();
      Swal.fire(
      'Puede crear su perfil sólo una vez',
      'Sí lo desea puede Editar Médico. Si es primera vez debe enviar la información de periodo de prueba y notificar por chat para que sea habilitado',
      'error'
    )
});