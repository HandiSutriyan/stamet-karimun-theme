const API_URL =
  "https://cuaca-kecamatan-api.netlify.app/.netlify/functions/api/kab. karimun/cuaca";
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

  //NEW DATE
  const sumDate = d.setDate(d.getDate() + sum);
  const newDate = new Date(sumDate);

  let date =
    newDate.getDate() < 10 ? `0${newDate.getDate()}` : newDate.getDate();
  let month =
    newDate.getMonth() + 1 < 10
      ? `0${newDate.getMonth() + 1}`
      : newDate.getMonth() + 1;
  fdate.fid = `${newDate.getDate()} ${
    bulan[newDate.getMonth()]
  } ${newDate.getFullYear()}`;
  fdate.fjs = `${d.getFullYear()}-${month}-${date}`;
  return fdate;
}

function loadDoc() {
  const xhttp = new XMLHttpRequest();
  const url = API_URL;
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
  const LeafIcon = L.Icon.extend({
    options: {
      shadowUrl: null,
      iconSize: [40, 40], // size of the icon
      iconAnchor: [20, 20], // point of the icon which will correspond to marker's location
      popupAnchor: [-3, -3],
    },
  });

  let greenIcon = new LeafIcon({
    iconUrl: `wp-content/themes/stamet/assets/img/w-icon/P${kode}.png`,
  });
  return greenIcon;
}

function generateMap(tgl, data, jam = "12:00") {
  mymap.eachLayer((layer) => {
    if (layer["_latlng"] != undefined) layer.remove();
  });

  data.forEach((item) => {
    item.cuaca.forEach((dc, i) => {
      let datetime = dc.date;
      let arr_datetime = datetime.split(" ");
      let marker = L.marker([item.lat, item.long], {
        icon: getIcon(dc.weather),
      });

      if (arr_datetime[0] == tgl && arr_datetime[1] == jam) {
        marker.addTo(mymap);
        marker.bindPopup(`<b>${item.kecamatan}</b> <br> ${dc.w_ket}`);
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
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  maxZoom: 12,
  minZoom: 9,
}).addTo(mymap);

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
