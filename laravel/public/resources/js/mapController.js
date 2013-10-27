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
} //end of initGMaps

$(function() {
    mapController.initialize();

    var beachMarker = new google.maps.Marker({
      position: new google.maps.LatLng(mapController.antwerpLat, mapController.antwerpLng),
      map: mapController.gmap,
      icon: mapController.markerIcon,
      info: "test"
    });

    mapController.addMarkers(beachMarker);

})

console.log($("#base").attr("data-url"));
