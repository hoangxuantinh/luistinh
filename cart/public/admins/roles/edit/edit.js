$(function() {
    $('.input_wrapper').on('click', function() {
        $(this).parents('.card').find('.input_child').prop('checked', $(this).prop('checked'));
    })
    $('.check_all').on('click',function() {
        $(this).parents().find('.input_child').prop('checked',$(this).prop('checked'));
    })
    $('.check_all').on('click',function() {
        $(this).parents().find('.input_wrapper').prop('checked',$(this).prop('checked'));
    })
    

})
