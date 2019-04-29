
function makeRequest(url, method, formdata, callback) {
    fetch(url, {
        method: method,
        body: formdata
    }).then((data) => {
        return data.json();
    }).then((result) => {
        callback(result);
    }).catch((err) => {
        console.log(err);
    })
}

function getHoroscope() {
    var requestData = new FormData();
    requestData.append("collectionType", "horoscope");
    requestData.append("action", "get");

    makeRequest("./code/requestHandler.php", "POST", requestData, (response) => {
        console.log(response);
        calculateHoroscope(response);
    })
}

function deleteHoroscope() {

}

function addHoroscope() {
    var date = document.querySelector('#date').value;

    var requestData = new FormData();
    var newDate = '2000' + date.slice(4);

    requestData.append('dateValue', newDate);

    makeRequest("./code/addHoroscope.php", "POST", requestData, (response) => {
        console.log(response);
    })
}

function calculateHoroscope(horoscopeList) {

    var date = document.querySelector('#date');
    horoscopeList.forEach((horo) => {
        console.log(horo.dateFrom.slice(5));
        currentHoroscope = horo;
        document.querySelector('.gotten-horoscope-text').innerHTML = JSON.stringify(horo.horoscopeSign);
    });


    console.log(date.value.slice(5));

}