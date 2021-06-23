$(function() {
    
    $(".select2_option").select2({
        placeholder: "Select a state",
    });    
    $('.checkbox_wrapper').on('click', function() {
        $(this).parents('.card').find('.checkbox_element').prop('checked', $(this).prop('checked'));
    })
    $('.check_all').on('click', function() {
        $(this).parents('.container').find('.checkbox_element').prop('checked', $(this).prop('checked'));
    })

})