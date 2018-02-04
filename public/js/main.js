//navBar part
$(function () {
    'use strict'

    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    });

    $('.post').find('.interaction').find('a').eq(2).on('click',function () {
        console.log('It works');

        $('#edit-modal').modal();//trigger the modal
    });








});

