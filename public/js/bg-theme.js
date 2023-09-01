/*
$('.btn').on('click', function () {
    $('.form').addClass('form--no');
});
*/

var URL = 'http://gamer.com';

$(document).ready(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //save new user
  $('#signup').on('click', function(){
    $.ajax({
      method: 'POST',
      url: URL + '/signup',
      dataType: 'json',
      timeout: 500,
      data:{ 
        'email': $('#email').val(),
        'password': $('#password').val(),
        'referralKey': $('#referral_key').val()
      },
      success: function (data,status,xhr) {
        $('form').hide();

        if(data.referralUrl){
          $('#referral-url').text(data.referralUrl);
          $('#success-section').show();
        }else{
          $('#error-message').text(data.error);
          $('#error-section').show();
        }
      },
      error: function (jqXhr, textStatus, errorMessage) {
       // $('.form').addClass('form--no');
        $('.form').addClass('error');
        var response = jqXhr.responseJSON;
        if(response.errors){
          $.each(response.errors, function(element, error){
            showError(element,error);
          })
        }
      }
    });
    
  });


 $('input').on('change paste keyup click', function(){
  if($('form').hasClass('error')){
    $('.form').removeClass('error');
    //$('.form').removeClass('form--no');
    hideErrors();
  }
 });

});

function showError(elm, error){
  $('#'+elm).css('color', 'red');
  $('#'+elm).val(error);
  $('#'+elm).addClass('error');
  
  if(elm == 'password'){
    $('#'+elm).attr('type', 'text');
  }
 
}

function hideErrors(){
  $('input').val('').css('color', 'black');
  $('#password').attr('type', 'password');
  $('input').removeClass('error');
}