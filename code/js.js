
function makeRequest(url, method, formdata, callback) {

    var headers
    
    if(method == "GET" || !formdata) {
        headers = {
            method: method
        }
    } else {
        headers = {
            method: method,
            body: formdata
        }
    }

    fetch(url, headers).then((data) => {
        return data.json();
    }).then((result) => {
        callback(result);
    }).catch((err) => {
        console.log(err);
    })
}

function getHoroscope() {
    makeRequest("./code/viewHoroscope.php", "GET", undefined, (response) => {
        if(response == '') {
            document.querySelector('.gotten-horoscope-text').innerHTML = '';
        }else {
            document.querySelector('.gotten-horoscope-text').innerHTML = JSON.stringify(response[0].horoscopeSign);
        }

    })
}

function deleteHoroscope() {
    makeRequest("./code/deleteHoroscope.php", "DELETE", undefined, (response) => {
        console.log(response);
        if(response == true) {
            document.querySelector('.gotten-horoscope-text').innerHTML = 'Saved horoscope was deleted';
        } else {
            document.querySelector('.gotten-horoscope-text').innerHTML = 'Nothing to delete';
        }

    })
}

function addHoroscope() {
    var date = document.querySelector('#date').value;

    if(date == '') {
        document.querySelector('.gotten-horoscope-text').innerHTML = "You need to add a date";
        console.log(false);
        return;
    }

    var requestData = new FormData();

    var newDate = '';
    
    if(date.slice(5, 7) == 01 && date.slice(8, 10) <= 19) {
        newDate = '2001' + date.slice(4);
    } else {
        newDate = '2000' + date.slice(4);
    }

    requestData.append('dateValue', newDate);
    requestData.append('action', 'add');

    makeRequest("./code/addHoroscope.php", "POST", requestData, (response) => {
        if(response == 'true') {
            getHoroscope();
        } else if (response == 'false') {
            document.querySelector('.gotten-horoscope-text').innerHTML = "You'll have to update or delete the saved horoscope before you save a new"
        }

        console.log(response);

    })
}

function updateHoroscope() {
    var date = document.querySelector('#date').value;
    
    if(date == '') {
        document.querySelector('.gotten-horoscope-text').innerHTML = "You need to add a date";
        console.log(false);
        return;
    }

    var requestData = new FormData();

    var newDate = '';

    if(date.slice(5, 7) == 01 && date.slice(8, 10) <= 19) {
        newDate = '2001' + date.slice(4);
    } else {
        newDate = '2000' + date.slice(4);
    }

    requestData.append('dateValue', newDate);
    requestData.append('action', 'update');


    makeRequest("./code/updateHoroscope.php", "POST", requestData, (response) => {
        if(response == 'true') {
            console.log(response);
            getHoroscope();
        } else if (response == 'false') {
            console.log(response);
        }
    });
}