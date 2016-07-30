(function ($) {
  'use strict';

  //
  var data = [{
    x: -1893456000,
    y: 92228531
  }, {
    x: -1577923200,
    y: 106021568
  }, {
    x: -1262304000,
    y: 123202660
  }, {
    x: -946771200,
    y: 132165129
  }, {
    x: -631152000,
    y: 151325798
  }, {
    x: -315619200,
    y: 179323175
  }, {
    x: 0,
    y: 203211926
  }, {
    x: 315532800,
    y: 226545805
  }, {
    x: 631152000,
    y: 248709873
  }, {
    x: 946684800,
    y: 281421906
  }, {
    x: 1262304000,
    y: 308745538
  }];

  var graph = new Rickshaw.Graph({
    element: document.querySelector('#chart'),
    series: [{
      color: $.urbanApp.primary,
      data: data
        }]
  });

  var axes = new Rickshaw.Graph.Axis.Time({
    graph: graph
  });

  graph.render();

  //
  var graph2 = new Rickshaw.Graph({
    element: document.querySelector('#chart2'),
    series: [{
      data: [{
        x: -1893456000,
        y: 92228531
      }, {
        x: -1577923200,
        y: 106021568
      }, {
        x: -1262304000,
        y: 123202660
      }, {
        x: -946771200,
        y: 132165129
      }, {
        x: -631152000,
        y: 151325798
      }, {
        x: -315619200,
        y: 179323175
      }, {
        x: 0,
        y: 203211926
      }, {
        x: 315532800,
        y: 226545805
      }, {
        x: 631152000,
        y: 248709873
      }, {
        x: 946684800,
        y: 281421906
      }, {
        x: 1262304000,
        y: 308745538
      }],
      color: $.urbanApp.danger
        }]
  });

  var x_axis = new Rickshaw.Graph.Axis.Time({
    graph: graph2
  });

  var y_axis = new Rickshaw.Graph.Axis.Y({
    graph: graph2,
    orientation: 'left',
    tickFormat: Rickshaw.Fixtures.Number.formatKMBT,
    element: document.getElementById('y_axis'),
  });

  graph2.render();

  $(window).smartresize(function () {
    graph.configure({
      width: $('#chart').parent().width()
    });
    graph.render();

    graph2.configure({
      width: $('#chart2').parent().width() - 40
    });
    graph2.render();
  });

})(jQuery);
