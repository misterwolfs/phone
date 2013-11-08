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
    bounds: new google.maps.LatLngBounds(),
    phoneList: new Array(),
    markerIcon: "/resources/img/icons/phones/apple/5.png",
    markerByUser: null,
    marker: null,
    markerCluster: null,
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
          zoom: 10,
          disableDefaultUI: true,
          streetViewControl: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          maxZoom: 15,
          minZoom: 2,
        };
        
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        map.setOptions({
            styles: style
        });
        
        this.gmap = map;

        this.markerCluster = new MarkerClusterer(this.gmap, this.phoneList)

        mapController.drawingManager.setMap(mapController.gmap);

    },
    // addMarkers: function(marker) {
    //       this.markerClickedHandler(marker);  
    //       this.phoneList.push(marker);           
    // },
    // markerClickedHandler: function(marker) {
    //     google.maps.event.addListener(marker, 'click', function() {
    //         sidebarController.trigger(this.info);
    //     });     
    // },	    
    fitMarker: function() {
        mapController.gmap.setZoom(10);
        mapController.gmap.panTo(mapController.markerByUser.position);
    },

    removeMarkers: function() {
        //console.log('remove markers');
        this.bounds = new google.maps.LatLngBounds();
        console.log('empty', this.bounds.isEmpty());

        
        this.markerCluster.clearMarkers();
        

        for (var i = 0; i < this.phoneList.length; i++) {
            //console.log('remove');


            this.phoneList[i].setMap(null);
        }

        this.phoneList = new Array();
    }
} //end of initGMaps



google.maps.event.addListener(mapController.drawingManager, 'markercomplete', function(marker) {
    marker.setOptions({
        draggable: true,
    });

    console.log('marker', marker.position);

    console.log('complete', mapController.phoneList);

    mapController.drawingManager.setDrawingMode(null)
    mapController.markerByUser = marker;
});



