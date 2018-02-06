//navBar part
$(function () {
    'use strict'

    var postId=0;
    var postBodyElement=null;
    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    });

    $('.post').find('.interaction').find('.edit').on('click',function (event) {
        event.preventDefault();
        console.log('It works');
        postBodyElement =event.target.parentNode.parentNode.childNodes[1];
        var postbody=postBodyElement.textContent;
        postId=event.target.parentNode.parentNode.dataset['postid'];
        console.log(postbody);




        $('#edit-modal').modal();//trigger the modal
        $('#post-body').val(postbody);
    });

    $('#modal-save').on('click',function () {
        console.log('save');

        $.ajax({
            method:'POST',
            url:url,
            data:{body:$('#post-body').val(),postId:postId,_token:token}
        })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });

    });

/*for profile Edit image and first name*/
$('#profile-pic').on('click',function () {
   console.log("edit button works");
   $('#profile-modal').modal();
});

$('#profile-save').on('click',function () {

    $.ajax({
        method:'POST',
        url:profileUrl,
        data:{_token:token}
    })
        .done(function () {
            $('#profile-modal').modal('hide');
        });
});






});

