function getTgl(sum = 0) {
  const d = new Date();
  let fdate = { fid: "", fjs: "", time: "" };
  const bulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  const timestamp = [0, 3, 6, 9, 12, 15, 18, 21];
  let getTime = d.getHours();

  timestamp.forEach(function (item, i) {
    let interval = item - getTime;
    if (getTime <= item && interval < 3) {
      let ftime = item;
      fdate.time = ftime < 10 ? `0${ftime}:00` : `${ftime}:00`;
    }
  });

  let date =
    d.getDate() + sum < 10 ? "0" + (d.getDate() + sum) : d.getDate() + sum;
  let month = d.getMonth() + 1 < 10 ? "0" + d.getMonth() + 1 : d.getMonth() + 1;
  fdate.fid = `${d.getDate() + sum} ${bulan[d.getMonth()]} ${d.getFullYear()}`;
  fdate.fjs = `${d.getFullYear()}-${month}-${date}`;
  return fdate;
}

function loadDoc() {
  const xhttp = new XMLHttpRequest();
  const url =
    "https://api-cuaca-karimun.netlify.app/.netlify/functions/api/cuaca?kab=Kab.%20Karimun";
  let response = "";
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      response = this.responseText;
    }
  };
  xhttp.open("GET", url, false);
  xhttp.send();
  return response;
}

function getIcon(wcode) {
  let kode = wcode;
  let greenIcon = L.icon({
    iconUrl: `assets/vendor/leaflet/images/P${kode}.png`,
    shadowUrl: null,
    iconSize: [60, 60], // size of the icon
    iconAnchor: [20, 20], // point of the icon which will correspond to marker's location
  });
  return greenIcon;
}

function generateMap(tgl, data, jam = "12:00") {
  mymap.eachLayer((layer) => {
    if (layer["_latlng"] != undefined) layer.remove();
  });

  data.forEach((item) => {
    item.cuaca.forEach((dc, i) => {
      let datetime = dc.$.date;
      let arr_datetime = datetime.split(" ");
      //console.log(item.lat);
      let marker = L.marker([item.lat, item.long], {
        icon: getIcon(dc.$.weather),
      });
      /* Marker with toolip
      let marker = L.marker([item.lat, item.long], {
        icon: getIcon(dc.weather),
      }).bindTooltip(`<b>${item.kecamatan}</b>`, {
        permanent: true,
        direction: "bottom",
        offset: L.point(0, 0),
      });
      */
      //let splited = date.split(" ");
      if (arr_datetime[0] == tgl && arr_datetime[1] == jam) {
        //console.log(date + " " + dc.time);
        marker.addTo(mymap);
        marker.bindPopup(`<b>${item.kecamatan}</b>`);
      }
    });
  });
}

let foot_tab = document.getElementById("foot-tab");
let foot_tabs = foot_tab.getElementsByClassName("tab");
let tgl_tab = document.getElementById("tgl-tab");
let tabs = tgl_tab.getElementsByClassName("tab");
// generate kecamatan
let kecamatan = JSON.parse(loadDoc());

// MAP
let mark;
const mymap = L.map("peta").setView([0.8065, 103.45], 10);
const mapToken =
  "pk.eyJ1IjoiemFyYWhhZGlkIiwiYSI6ImNrdWU3YzE5cTFmZTAzMW12d21vaTVpazgifQ.3S9KANZaySSuEcW62bBNhg";
L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors,',
    maxZoom: 12,
    minZoom: 9,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
    accessToken: mapToken,
  }
).addTo(mymap);

//modify tabs
for (var i = 0; i < tabs.length; i++) {
  let tgl = getTgl(i);
  tabs[i].innerHTML = tgl.fid;
  tabs[i].setAttribute("data-date", tgl.fjs);
  tabs[i].addEventListener("click", function () {
    let current = tgl_tab.getElementsByClassName("active");
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";
    let current_jam = foot_tab.querySelectorAll("div.tab.active")[0].innerHTML;
    generateMap(tgl.fjs, kecamatan, current_jam);
  });
}

for (var i = 0; i < foot_tabs.length; i++) {
  //set deafult active forecast time tab
  let cur_time = getTgl();
  if (foot_tabs[i].innerHTML == cur_time.time) {
    foot_tabs[i].className += " active";
  }

  foot_tabs[i].addEventListener("click", function () {
    let current = foot_tab.getElementsByClassName("active");
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";

    //get date from active tab
    let current_tgl = tgl_tab
      .querySelectorAll("div.tab.active")[0]
      .getAttribute("data-date");

    //get jam from active tab
    let current_jam = foot_tab.querySelectorAll("div.tab.active")[0].innerHTML;
    generateMap(current_tgl, kecamatan, current_jam);
  });
}

let def_datetime = getTgl();
generateMap(def_datetime.fjs, kecamatan, def_datetime.time);
console.log("peta.js loaded");
