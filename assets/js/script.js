const searchFilter = () => {
    const input = document.getElementById("inputSearch")
    const table = document.querySelectorAll(".table-search")
    var p = document.getElementById("notFound")

    table.forEach(e => {
        if (e.innerHTML.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
            e.style.display = ""
            p.classList.remove("d-block")

        } else if (e.innerHTML.toLowerCase().indexOf(input.value.toLowerCase()) < 1) {
            e.style.display = "none"
            p.classList.add("d-block")
        }
    });
}

const sortSuhu = () => {
    const sort = document.getElementById("sort")
    const sortBy = document.getElementById("sortBy")
    const tanggal = document.getElementById("tanggal")
    const input = document.getElementById("inputSearch")


    if (sort.value === "suhu") {
        sortBy.classList.remove("d-none")
        input.classList.add("d-none")
        tanggal.classList.add("d-none")
        sortBy.disabled = false;
        input.disabled = true
        tanggal.disabled = true


    } else if (sort.value === "tanggal") {
        tanggal.classList.remove("d-none")
        input.classList.add("d-none")
        sortBy.classList.add("d-none")
        tanggal.disabled = false;
        sortBy.disabled = true
        input.disabled = true

    } else {
        sortBy.classList.add("d-none")
        tanggal.classList.add("d-none")
        input.classList.remove("d-none")
        sortBy.disabled = true
        tanggal.disabled = true;
        input.disabled = false
    }
}

const panas = () => {
    var audio = new Audio('../assets/panas.mp3');
    audio.play();
}

function initMap() {
    const myLatlng = { lat: -7.1816657, lng: 111.9065997 };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: myLatlng,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
      content: "Click the map to get Lat/Lng!",
      position: myLatlng,
    });
  
    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
      // Close the current InfoWindow.
      infoWindow.close();
      // Create a new InfoWindow.
      infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
      });
      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
        document.getElementById("lat").value = mapsMouseEvent.latLng.lat(),
        document.getElementById("long").value = mapsMouseEvent.latLng.lng()
      );
      infoWindow.open(map);
    });
  }