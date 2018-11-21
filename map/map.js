var map;
var userLatitude;
var userLongitude;
var latlongs;
var loc=null;
var index;
var infobox;
var lat;
var lng;
    var infoboxTemplate = '<div class="customInfobox"><div class="title">{title}</div>{description}</div>';

function initMap()
{
      load();
     map = new Microsoft.Maps.Map(document.getElementById('map'), {
                  
                    center: loc,
                    zoom: 18 });
                
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
                    directionsManager.showInputPanel('directionShow');
                    
                    infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
                            visible: false
                        });

                        //Assigning the infobox in map
                        infobox.setMap(map);

                    });
                Map();

                $("#loading").css({"display":"none"});
                $("#map").css({"background-color":"white"});

}



function Map() {
                            
                 
                 var pin;

                setLoc();
                     /* console.log(latlongs.length);*/
                    for(var i=0,len = resData.length;i<len;i++){
                      
                     
                        pin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(resData[i][2], resData[i][3]),{
                               icon: 'map/mapIcon/store.png',
                               anchor: new Microsoft.Maps.Point(12, 39)
        
                        });
                        /*alert(resData[index[i]][0]+" "+resData[index[i]][1]+" "+resData[index[i]][4]);
                         */
              
                         pin.metadata = {
                                title: resData[i][0]+": Type( "+resData[i][4]+" )",
                                description: 'Address: '+resData[i][1]
                            };

                        Microsoft.Maps.Events.addHandler(pin, 'click', function(e){
                                     if (e.target.metadata) {
                            //Set the infobox options with the metadata of the pushpin.
                            infobox.setOptions({
                                location: e.target.getLocation(),
                                title:e.target.metadata.title,
                                description: e.target.metadata.description,
                                visible: true,
                                 actions: {
                                        label: 'Direction',
                                        eventHandler: function()
                                        {

                                            setDirection(loc,e.target.getLocation());
                                        }
                                    }
                            });
                        }
                        });

                        console.log("in");
                        map.entities.push(pin);
                    
                    }
                

                            
}




function setLoc()
{

    navigator.geolocation.getCurrentPosition(function (position) {
        loc = new Microsoft.Maps.Location(
        position.coords.latitude,
        position.coords.longitude);

    //Add a pushpin at the user's location.
    var pin = new Microsoft.Maps.Pushpin(loc,{
         icon: 'map/mapIcon/user.png',
         anchor: new Microsoft.Maps.Point(12, 39)
    });
    pin.metadata = {
            title: 'Your location',
            description: 'Your Are Here'
        };
    Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);
    map.entities.push(pin);

    //Center the map on the user's location.
    map.setView({ center: loc, zoom: 18 });
}); 
    function pushpinClicked(e) {
    //Make sure the infobox has metadata to display.
    if (e.target.metadata) {
        //Set the infobox options with the metadata of the pushpin.
        infobox.setOptions({
            location: e.target.getLocation(),
            title: e.target.getLocation(),
            description: e.target.metadata.description,
            visible: true
        });
    }
}
}




  function load() {
  // HTML5/W3C Geolocation
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(UserLocation);
  }
  // Default to Washington, DC
  else{
    loc = new Microsoft.Maps.Location(
        position.coords.latitude,
        position.coords.longitude
        );
    NearestCity(23.822003, 90.427361);
  }
}

// Callback function for asynchronous call to HTML5 geolocation
function UserLocation(position) {
    loc = new Microsoft.Maps.Location(
        position.coords.latitude,
        position.coords.longitude
        );
   
  NearestCity(position.coords.latitude, position.coords.longitude);
}


// Convert Degress to Radians
function Deg2Rad(deg) {
  return deg * Math.PI / 180;
}

function PythagorasEquirectangular(lati1, long1, lati2, long2) {
  lat1 = Deg2Rad(lati1);
  lat2 = Deg2Rad(lati2);
  lon1 = Deg2Rad(long1);
  lon2 = Deg2Rad(long2);
  var R = 10; // km
  /*
    λ is the longitude of the location to project;
    φ is the latitude of the location to project;
    φ1 are the standard parallels (north and south of the equator) where the scale of the projection is true;
    λ0 is the central meridian of the map;
    x is the horizontal coordinate of the projected location on the map;
    y is the vertical coordinate of the projected location on the map.

  */
  var x = (lon2 - lon1) * Math.cos((lat1 + lat2) / 2);
  var y = (lat2 - lat1);
  var d = Math.sqrt(x * x + y * y) * R;
  return [d,lati2,long2];
}

var lat = 20; // user's latitude
var lon = 40; // user's longitude


function NearestCity(latitude, longitude) {
  var mindif = 99999;
  var closest;
  var div="";
  var closestlati=[0,0,0,0,0];
  var closestlongi=[0,0,0,0,0];
  var indexA=[-1,-1,-1,-1,-1];
  for (index = 0; index < resData.length; ++index) {
     
    var dif = PythagorasEquirectangular(latitude, longitude, resData[index][2], resData[index][3]);
    if (dif[0] < mindif) {
        closestlati[4]=closestlati[3];
        closestlati[3]=closestlati[2];
        closestlati[2]=closestlati[1];
        closestlati[1]=closestlati[0];
        closestlati[0]=dif[1];

        closestlongi[4]=closestlongi[3];
        closestlongi[3]=closestlongi[2];
        closestlongi[2]=closestlongi[1];
        closestlongi[1]=closestlongi[0];
        closestlongi[0]=dif[2];
        mindif=dif[0];

        indexA[4]=indexA[3];
        indexA[3]=indexA[2];
        indexA[2]=indexA[1];
        indexA[1]=indexA[0];
        indexA[0]=index;
    }
  }

  latlongs=[{lat:closestlati[0],lon:closestlongi[0]},{lat:closestlati[1],lon:closestlongi[1]},{lat:closestlati[2],lon:closestlongi[2]},{lat:closestlati[3],lon:closestlongi[3]},{lat:closestlati[4],lon:closestlongi[4]}];
  index=indexA; 
 
}

function setDirection(a,b){
    
    if (b!=null) {
    Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
    // Set Route Mode to walking
    directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.walking });
    var waypoint1 = new Microsoft.Maps.Directions.Waypoint({location:a});
    var waypoint2 = new Microsoft.Maps.Directions.Waypoint({location:b});
    directionsManager.addWaypoint(waypoint1);
    directionsManager.addWaypoint(waypoint2);
    // Set the element in which the itinerary will be rendered
    directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
    directionsManager.calculateDirections();
});
}
else{
    swal("Oops!!","Your location is not defined.\nPlease open your geolocation.","error");
}
}



function searchRestaurant(loc)
{
    //Center the map on the user's location.
    map.setView({ center: loc, zoom: 18 });

}