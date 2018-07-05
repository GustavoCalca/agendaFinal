function showMessage(titulo,texto) {
    swal({
        title: titulo,
        type:'success',
        text: texto,
        icon: "success",
        showCancelButton:false,
        allowOutsideClick:false,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ok',
        closeOnConfirm: false,
        closeOnEsc: false,
        timer: 3000,
        html: true
    });
}
