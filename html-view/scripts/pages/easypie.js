(function ($) {
  'use strict';

  var timer;

  $('.bounce_pie').easyPieChart({
    size: 180,
    lineWidth: 8,
    barColor: 'rgba(255,255,255,.7)',
    trackColor: 'rgba(0,0,0,.1)',
    lineCap: 'butt',
    easing: 'easeOutBounce',
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });

  $('.dailyvisitors').easyPieChart({
    size: 180,
    lineWidth: 15,
    barColor: 'rgba(255,255,255,.7)',
    trackColor: false,
    lineCap: 'round',
    easing: 'easeOutBounce',
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });

  $('.newvisitors').easyPieChart({
    size: 180,
    lineWidth: 15,
    barColor: 'rgba(255,255,255,.7)',
    trackColor: 'rgba(0,0,0,.1)',
    lineCap: 'butt',
    easing: 'easeOutBounce',
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });

  $('.total').easyPieChart({
    size: 180,
    lineWidth: 8,
    barColor: 'rgba(255,255,255,.7)',
    trackColor: 'rgba(0,0,0,.1)',
    lineCap: 'round',
    easing: 'easeOutBounce',
    scaleColor: false,
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });

  $('.servernodes').easyPieChart({
    size: 180,
    lineWidth: 2,
    barColor: 'rgba(255,255,255,.7)',
    trackColor: 'rgba(0,0,0,.1)',
    lineCap: 'round',
    easing: 'easeOutBounce',
    scaleColor: false,
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });

  $('.junkfiles').easyPieChart({
    size: 180,
    lineWidth: 14,
    barColor: 'rgba(255,255,255,.7)',
    trackColor: 'rgba(0,0,0,.1)',
    lineCap: 'butt',
    easing: 'easeOutBounce',
    scaleColor: false,
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });

  $('.piechart').each(function () {
    var canvas = $(this).find('canvas');
    $(this).css({
      'width': canvas.width(),
      'height': canvas.height()
    });
  });

  /*timer = setInterval(function () {
      $('.piechart > div').each(function () {
          $(this).data('easyPieChart').update(Math.floor(100 * Math.random()));
      });
  }, 3000);*/

})(jQuery);
