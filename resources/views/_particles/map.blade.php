<div id="map" style=" height: 400px;"></div>
    <button onclick="initMap()">Show Map</button>  
  
    <script type="text/javascript">
      //  showMap(25.594095, 85.137566)
      //   function showMap(lat, lng) {
      //     const myLatLng = { lat: lat, lng: lng };
      //     const map = new google.maps.Map(document.getElementById("map"), {
      //       zoom: 20,
      //       center: myLatLng,
      //     });
  
      //     new google.maps.Marker({
      //       position: myLatLng,
      //       map,
      //       title: "Hello Rajkot!",
      //     });
      //   }  

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
              center: { lat: -33.866, lng: 151.196 },
              zoom: 15,
            });
            const request = {
              placeId: "ChIJN1t_tDeuEmsRUsoyG83frY4",
              fields: ["name", "formatted_address", "place_id", "geometry"],
            };
            const infowindow = new google.maps.InfoWindow();
            const service = new google.maps.places.PlacesService(map);

            service.getDetails(request, (place, status) => {
              if (
                status === google.maps.places.PlacesServiceStatus.OK &&
                place &&
                place.geometry &&
                place.geometry.location
              ) {
                const marker = new google.maps.Marker({
                  map,
                  position: place.geometry.location,
                });

                google.maps.event.addListener(marker, "click", () => {
                  const content = document.createElement("div");
                  const nameElement = document.createElement("h2");

                  nameElement.textContent = place.name;
                  content.appendChild(nameElement);

                  const placeIdElement = document.createElement("p");

                  placeIdElement.textContent = place.place_id;
                  content.appendChild(placeIdElement);

                  const placeAddressElement = document.createElement("p");

                  placeAddressElement.textContent = place.formatted_address;
                  content.appendChild(placeAddressElement);
                  infowindow.setContent(content);
                  infowindow.open(map, marker);
                });
              }
            });
          }

          window.initMap = initMap;
    </script>
  
   <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyC1DYrAssxOhwsDNkRD7hQ6Urj71jHxuU8&libraries=places&callback=initMap" >
</script>

<!-- {{ env('GOOGLE_MAP_KEY') }} -->