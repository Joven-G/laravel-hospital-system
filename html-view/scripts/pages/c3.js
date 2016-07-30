(function ($) {
  'use strict';

  var chart = c3.generate({ data: { columns: [ ['data1', 30, 200, 100, 400, 150, 250], ['data2', 50, 20, 10, 40, 15, 25] ] } }); setTimeout(function () { chart.load({ columns: [ ['data1', 230, 190, 300, 500, 300, 400] ] }); }, 1000); setTimeout(function () { chart.load({ columns: [ ['data3', 130, 150, 200, 300, 200, 100] ] }); }, 1500); setTimeout(function () { chart.unload({ ids: 'data1' }); }, 2000);

  var chart2 = c3.generate({
    bindto: '#chart2',
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 130, 100, 140, 200, 150, 50]
        ],
        type: 'bar'
    },
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});

setTimeout(function () {
    chart2.load({
        columns: [
            ['data3', 130, -150, 200, 300, -200, 100]
        ]
    });
}, 1000);

})(jQuery);
