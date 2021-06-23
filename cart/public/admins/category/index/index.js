function actionDelete(event) {
    event.preventDefault();
    // let ulrRequest = $(this).data('url');
    let _this = $(this);
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
            $.ajax({
                type: 'GET',
                url: $(this).attr('data-url'),
                success: function(data) {
                    
                    if(data.code == 200){
                        _this.parent().parent().remove();
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }

                },
                error: function() {

                }
            })
        
        }
      })
}


$(function() {
    $(document).on('click','.action_delete',actionDelete);
})