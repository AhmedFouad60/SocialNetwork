$(function () {
    'use strict'

    var postId=0;
    var postBodyElement=null;
    var form;
    var data;
    var currentBodySize;
    /*************************************Start navBar part**************************/

    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    });
    /*************************************End navBar part**************************/

    /************************************Start EditPost part**************************/


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


        //hit the save changes in the modal to request editing the post
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
    /************************************End EditPost part**************************/



    /************************************ Start profile part**************************/


    /*trigger the edit button in the profile page*/
$('#profile-pic').on('click',function () {
   console.log("edit button works");
   $('#profile-modal').modal();
});

//when hitting save it will save {image,and first_name} editing of the user
$('#profile-save').on('click',function () {


    //stop submit the form, we will post it manually.
    event.preventDefault();

    // Get form
    form = $('#profile-from')[0];

    // Create an FormData object
     data = new FormData(form);

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
    /************************************ End profile part**************************/



    $('.submit-post').on('click',function () {
        console.log("works");
        currentBodySize= $('.article-size').height();
        $('body').css('padding-top',$('body').css('padding-top')+ currentBodySize );
    });



    /************************************ Start Like/dislike  part**************************/

    $('.like').on('click',function (event) {
        event.preventDefault();
       var isLike= event.target.previousElementSibling==null?true:false;
        postId=event.target.parentNode.parentNode.dataset['postid'];


        $.ajax({
           method:'POST',
           url:likeUrl,
           data:{isLike:isLike,postId:postId,_token:token}
       }).done(function () {
            //change the page

            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }

        });


       console.log(isLike);
    });










    /************************************ End Like/dislike  part**************************/









});
