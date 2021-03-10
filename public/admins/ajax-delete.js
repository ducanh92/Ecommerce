function confirmDelete(event) {
    event.preventDefault();

    let urlRequest = $(this).data('url');
    let button = $(this);

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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        button.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    }
                },
                error: function() {

                }
            });
        
        }
      });
}

$(function(){
    $(document).on('click', '.confirm-delete', confirmDelete)
});