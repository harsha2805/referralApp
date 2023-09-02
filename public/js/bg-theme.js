/*
$('.btn').on('click', function () {
    $('.form').addClass('form--no');
});
*/

var URL = 'http://gamer.com';

$(document).ready(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //save new user
  $('#signup').on('click', function () {
    $.ajax({
      method: 'POST',
      url: URL + '/signup',
      dataType: 'json',
      //timeout: 500,
      data: {
        'email': $('#email').val(),
        'password': $('#password').val(),
        'referralKey': $('#referral_key').val()
      },
      success: function (data, status, xhr) {
        $('form').hide();

        if (data.referralUrl) {
          $('#referral-url').text(data.referralUrl);
          $('#success-section').show();
          //Enables url sharing in social media
          createSharer(data);

        } else {
          $('#error-message').text(data.error);
          $('#error-section').show();
        }
      },
      error: function (jqXhr, textStatus, errorMessage) {
        // $('.form').addClass('form--no');
        $('.form').addClass('error');
        var response = jqXhr.responseJSON;
        if (response.errors) {
          $.each(response.errors, function (element, error) {
            showError(element, error);
          })
        }
      }
    });

    function createSharer(data) {
      var referralUrl = data.referralUrl;
      $('.button').attr('data-url', function (index, originalUrl) {
        return originalUrl.replace('referral_url_placeholder', referralUrl);
      });
    }

  });

  $('input').on('change paste keyup click', function () {
    var elementId = $(this).attr('id');
    if ($('#' + elementId).hasClass('error')) {
      $('#' + elementId).removeClass('error');
      //$('.form').removeClass('form--no');
      hideErrors(elementId);
    }
  });
});

function showError(elm, error) {
  $('#' + elm).css('color', 'red');
  $('#' + elm).val(error);
  $('#' + elm).addClass('error');

  if (elm == 'password') {
    $('#' + elm).attr('type', 'text');
  }

}

function hideErrors(id) {
  $('#' + id).val('').css('color', 'black');
  if (id === 'password') {
    $('#' + id).attr('type', 'password');
    $('#' + id).removeClass('error');
  }
}
