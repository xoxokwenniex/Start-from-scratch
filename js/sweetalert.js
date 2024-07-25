const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
})
async function SweetError(errmsg = "Please Fill the form correctly", icon = "error") {
    Swal.fire({
        icon: icon,
        text: errmsg,
    })
}
async function SweetSuccess(msg = "Updated Successfully") {
    await Toast.fire({
        icon: "success",
        title: msg
    })
}