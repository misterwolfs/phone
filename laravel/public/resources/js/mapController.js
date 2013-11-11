var mapController = {
    base_url: document.URL,
	gmap: null,
	antwerpLat: 51.214263,
	antwerpLng: 4.41799,
    bounds: new google.maps.LatLngBounds(),
    phoneList: new Array(),
    markerIcon: "/resources/img/icons/phones/apple/5.png",
    markerByUser: null,
    marker: null,
    markerCluster: null,
    input: null,
    autocomplete: null,
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
          zoom: 12,
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
    markerClickedHandler: function(type, marker) {
        console.log('base_url', mapController.base_url);
        // console.log('clicked', type);
        google.maps.event.addListener(marker, 'click', function() {
            switch(type)
            {
                case 'brand' :
                    sidebarController.trigger('phone/' + this.url);
                    break;
                case 'repaircafe' :
                    sidebarController.trigger('search/repaircafe/' + this.url);
                    break;
                case 'repairder' : 
                    sidebarController.trigger('search/repairder/' + this.url);
                    break;    
            }
        });     
    },	    
    zoom: function(position) {
        mapController.gmap.setZoom(16);
        mapController.gmap.panTo(position);
    },
    removeMarkers: function() {
        this.bounds = new google.maps.LatLngBounds();
        console.log('empty', this.bounds.isEmpty());

        this.markerCluster.clearMarkers();
        
        for (var i = 0; i < this.phoneList.length; i++) {
            this.phoneList[i].setMap(null);
        }

        this.phoneList = new Array();
    },
    checkLocation:function($arg) {
        console.log('checkLocation');

        mapController.input = /** @type {HTMLInputElement} */(document.getElementById($arg));
        mapController.autocomplete = new google.maps.places.Autocomplete(mapController.input);
        
        mapController.autocomplete.bindTo('bounds', mapController.gmap);
        
        google.maps.event.addListener(mapController.autocomplete, 'place_changed', function() {
            
            searchController.searchLocation($arg);

        });

    }
}


google.maps.event.addListener(mapController.drawingManager, 'markercomplete', function(marker) {
    marker.setOptions({
        draggable: false,
    });

    console.log('marker', marker.position);

    console.log('complete', mapController.phoneList);

    mapController.drawingManager.setDrawingMode(null)
    mapController.markerByUser = marker;
});


