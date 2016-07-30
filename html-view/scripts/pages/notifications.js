(function ($) {
  'use strict';

  $('.chosen-select').chosen({
    disable_search_threshold: 10
  });

  var i = -1,
    msgs = ['Your request has succeded!',
            'Are you the six fingered man?',
            'Inconceivable!',
            'I do not think that means what you think it means.',
            'Have fun storming the castle!'
        ];

  var $layout = 'topRight';

  $('.location-selector li').on('click', function () {

    var position = $(this).data('position');

    $layout = position;

    $('.location-selector').find('li').removeClass('active');

    $(this).addClass('active');
  });

  $('.show-messenger').on('click', function () {
    var msg = $('#message').val(),
      type = $('#messenger-type').val().toLowerCase();

    if (!msg) {
      msg = getMessage();
    }

    if (!type) {
      type = 'error';
    }

    noty({
      theme: 'urban-noty',
      text: msg,
      type: type,
      timeout: 3000,
      layout: $layout,
      closeWith: ['button', 'click'],
      animation: {
        open: 'in',
        close: 'out',
        easing: 'swing'
      },
    });
  });

  function getMessage() {

    i++;
    if (i === msgs.length) {
      i = 0;
    }

    return msgs[i];
  }

})(jQuery);
