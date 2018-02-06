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


    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    var form = $('#profile-from')[0];

    // Create an FormData object
    var data = new FormData(form);

    // If you want to add an extra field for the FormData
    data.append("_token", token);

    // disabled the submit button
    $("#profile-save").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: profileUrl,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {

            console.log("SUCCESS : ", data);
            $("#profile-save").prop("disabled", false);
            $('#profile-modal').modal('toggle');
            //Refresh the source image
            $('#user-image').attr("src",$('#user-image').attr('src')+'?'+Math.random());


        },
        error: function (e) {

            console.log("ERROR : ", e);
            $("#btnSubmit").prop("disabled", false);

        }
    });

});


















});

