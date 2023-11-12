
function loading(Swal) {
    Swal.fire({
        title: 'Loading Data..',
        allowEscapeKey: false,
        allowOutsideClick: false
    });
    Swal.showLoading();
}

function Close(Swal) {
    Swal.close();
}


function AlertSwal(Swal,title,message){
    return Swal.fire(title, message, "success").then((result) => {
        return result;
      });

}
function AlertSwalCancelled(Swal, message){
    return Swal.fire("Cancel Request", message, "success").then((result) => {
        return result;
      });

}