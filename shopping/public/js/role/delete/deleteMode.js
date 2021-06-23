
 function actionDelete() {
    let _this = $(this);
    $.ajax({
        type: 'GET',
        url: $(this).attr('data-url'),
        success: function (data) {
            if (data.code == 200) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        _this.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        }
    })
}

$(function () {
    $(document).on('click', '.action_delete', actionDelete)
    
})




