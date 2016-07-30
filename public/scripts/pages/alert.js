(function ($) {
  'use strict';

  $('.swal-message').on('click', function () {
    swal('Here\'s a message!');
  });

  $('.swal-timer').on('click', function () {
    swal({
      title: 'Auto close alert!',
      text: 'I will close in 2 seconds.',
      timer: 2000
    });
  });

  $('.swal-title').on('click', function () {
    swal('Here\'s a message!', 'It\'s pretty, isn\'t it?');
  });

  $('.swal-success').on('click', function () {
    swal('Good job!', 'You clicked the button!', 'success');
  });

  $('.swal-warning-confirm').on('click', function () {
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this imaginary file!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
      },
      function () {
        swal('Deleted!', 'Your imaginary file has been deleted!', 'success');
      });
  });

  $('.swal-warning-cancel').on('click', function () {
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this imaginary file!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel plx!',
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function (isConfirm) {
        if (isConfirm) {
          swal('Deleted!', 'Your imaginary file has been deleted!', 'success');
        } else {
          swal('Cancelled', 'Your imaginary file is safe :)', 'error');
        }
      });
  });

  $('.swal-custom-icon').on('click', function () {
    swal({
      title: 'Sweet!',
      text: 'Here\'s a custom image.',
      imageUrl: 'images/avatar.jpg'
    });
  });

})(jQuery);
