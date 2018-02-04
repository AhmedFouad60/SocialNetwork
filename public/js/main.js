//navBar part
$(function () {
    'use strict'

    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    });

    $('.post').find('.interaction').find('.edit').on('click',function (event) {
        event.preventDefault();
        console.log('It works');

        var postbody=event.target.parentNode.parentNode.childNodes[1].textContent;
        console.log(postbody);




        $('#edit-modal').modal();//trigger the modal
        $('#post-body').val(postbody);
    });








});

