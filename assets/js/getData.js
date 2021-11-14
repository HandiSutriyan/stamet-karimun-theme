function loadDoc(url) {
  const xhttp = new XMLHttpRequest();
  let response = "";
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      response = this;
    }
  };
  xhttp.open("GET", url, false);
  xhttp.send();
  return response;
}

function getDataKecamatan(xml) {
  let x, i, xmlDoc;
  let data = [];
  xmlDoc = xml.responseXML;
  x = xmlDoc.getElementsByTagName("kec");
  for (i = 0; i < x.length; i++) {
    data.push({
      kecamatan: x[i].getAttribute("nama"),
      id: x[i].getAttribute("id"),
      lat: x[i].getAttribute("lat"),
      long: x[i].getAttribute("lon"),
      cuaca: {},
    });
  }
  return data;
}

function getDataCuaca(xml) {
  let x, i, xmlDoc;
  let data = [];
  xmlDoc = xml.responseXML;
  x = xmlDoc.getElementsByTagName("cuaca");
  for (i = 0; i < x.length; i++) {
    let datetime = x[i].getAttribute("date");
    let arr_datetime = datetime.split(" ");
    data.push({
      date: arr_datetime[0],
      time: arr_datetime[1],
      t: x[i].getAttribute("t"),
      hu: x[i].getAttribute("hu"),
      wd: x[i].getAttribute("wdcard"),
      ws: x[i].getAttribute("ws"),
      weather: x[i].getAttribute("weather"),
    });
  }
  return data;
}

let kecamatanXML = loadDoc(
  "https://dataweb.bmkg.go.id/API/cuaca/data-kecamatan.bmkg?kab=Kab.%20Karimun&&decache=0"
);

let dataKecamatan = getDataKecamatan(kecamatanXML);
dataKecamatan.forEach(function (item, i) {
  let id_kec = item.id;
  let cuaca = loadDoc(
    `https://dataweb.bmkg.go.id/API/cuaca/cuaca-kecamatan.bmkg?id=${id_kec}&detail=1&decache=0`
  );
  let res = getDataCuaca(cuaca);
  item.cuaca = res;
});

console.log(dataKecamatan);
document.getElementById("demo").innerHTML += JSON.stringify(dataKecamatan);
