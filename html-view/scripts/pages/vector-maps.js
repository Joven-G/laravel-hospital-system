(function ($) {
  'use strict';

  $('.world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    zoomOnScroll: false,
    strokeWidth: 1,
    regionStyle: {
      initial: {
        fill: $.urbanApp.dark,
        'fill-opacity': 0.5
      },
      hover: {
        'fill-opacity': 0.3
      }
    },
    markerStyle: {
      initial: {
        fill: '#fff',
        stroke: $.urbanApp.primary
      },
      hover: {
        r: 8,
        stroke: $.urbanApp.primary,
        'stroke-width': 2
      }
    },
    markers: [
      {
        latLng: [41.90, 12.45],
        name: 'Vatican City'
      },
      {
        latLng: [43.73, 7.41],
        name: 'Monaco'
      },
      {
        latLng: [-0.52, 166.93],
        name: 'Nauru'
      },
      {
        latLng: [-8.51, 179.21],
        name: 'Tuvalu'
      },
      {
        latLng: [43.93, 12.46],
        name: 'San Marino'
      },
      {
        latLng: [47.14, 9.52],
        name: 'Liechtenstein'
      },
      {
        latLng: [35.88, 14.5],
        name: 'Malta'
      },
      {
        latLng: [13.16, -61.23],
        name: 'Saint Vincent and the Grenadines'
      },
      {
        latLng: [-4.61, 55.45],
        name: 'Seychelles'
      },
      {
        latLng: [7.35, 134.46],
        name: 'Palau'
      },
      {
        latLng: [42.5, 1.51],
        name: 'Andorra'
      },
      {
        latLng: [6.91, 158.18],
        name: 'Federated States of Micronesia'
      },
      {
        latLng: [1.3, 103.8],
        name: 'Singapore'
      },
      {
        latLng: [1.46, 173.03],
        name: 'Kiribati'
      },
      {
        latLng: [-21.13, -175.2],
        name: 'Tonga'
      },
      {
        latLng: [-20.2, 57.5],
        name: 'Mauritius'
      },
      {
        latLng: [26.02, 50.55],
        name: 'Bahrain'
      }
        ]
  });

})(jQuery);
