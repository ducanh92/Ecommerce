$(function(){
    $('.checkbox_parent').on('click', function() {
        $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
    })

    $('.check_all').on('click', function() {
        $(document).find('.checkbox_parent').prop('checked', $(this).prop('checked'));
        $(document).find('.checkbox_children').prop('checked', $(this).prop('checked'));
    })
})

