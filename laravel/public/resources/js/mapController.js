    var style = [{
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "road",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#ffffff"
        }]
    }, {
        "featureType": "road.arterial",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#fee379"
        }]
    }, {
        "featureType": "road.highway",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#fee379"
        }]
    }, {
        "featureType": "landscape",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#f3f4f4"
        }]
    }, {
        "featureType": "water",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#7fc8ed"
        }]
    }, {}, {
        "featureType": "road",
            "elementType": "labels",
            "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#83cead"
        }]
    }, {
        "elementType": "labels",
            "stylers": [{
            "visibility": "on"
        }]
    }, {
        "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [{
            "weight": 0.9
        }, {
            "visibility": "off"
        }]
    }]

var mapController = {
	gmap: null,
	antwerpLat: 51.214263,
	antwerpLng: 4.41799,
    phoneList: new Array(),
    markerIcon: "/resources/img/icons/phones/apple/5.png",
    markerByUser: null,
    drawingManager: new google.maps.drawing.DrawingManager({
        drawingMode: null,
        drawingControl: false,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
                google.maps.drawing.OverlayType.MARKER,
            ]
        },
        markerOptions: {
            icon: ''
        },
    }),
    initialize: function() {
        var mapOptions = {
          center: new google.maps.LatLng(this.antwerpLat, this.antwerpLng),
          zoom: 16,
          disableDefaultUI: true,
          streetViewControl: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        map.setOptions({
            styles: style
        });
        
        this.gmap = map;

        mapController.drawingManager.setMap(mapController.gmap);

    },
    addMarkers: function(marker) {
          this.markerClickedHandler(marker);  
          this.phoneList.push(marker);           
    },
    markerClickedHandler: function(marker) {
        google.maps.event.addListener(marker, 'click', function() {
            sidebarController.trigger(this.info);
        });     
    },	    
    fitMarker: function() {
        mapController.gmap.setZoom(17);
        mapController.gmap.panTo(mapController.markerByUser.position);
    }
} //end of initGMaps

google.maps.event.addListener(mapController.drawingManager, 'markercomplete', function(marker) {
    marker.setOptions({
        draggable: true
    });
    console.log(marker.position);

    mapController.drawingManager.setDrawingMode(null)
    mapController.markerByUser = marker;
});
