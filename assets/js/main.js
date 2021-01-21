//Voeg een user toe:
//haal add user button op
const addUserButton = document.querySelector('.js-add-user-button');

//wanneer er op geklikt word vuur adduser
addUserButton.addEventListener('click', addUser);

function addUser() {
  //haal de input fields op
  const name = document.querySelector('.js-add-name');
  const box = document.querySelector('.js-add-box');
  const size = document.querySelector('.js-add-size');
  const allergy = document.querySelector('.js-add-allergy');
  const preferences = document.querySelector('.js-add-preferences');
  const fingerprint = document.querySelector('.js-add-fingerprint');
  const foodbank = document.querySelector('.js-add-foodbank');

  console.log(name.value)
  console.log(box.value)
  console.log(size.value)
  console.log(allergy.value)
  console.log(preferences.value)
  console.log(fingerprint.value)
  console.log(foodbank.value)

  //kijk of ze niet leeg zijn
  if (!name.value || !box.value || !size.value || !fingerprint.value || !foodbank.value) {
    return alert("empty fields");
  }

  //maak een request naar de php file met javascript fetch
  Request('includes/addUser.php', "POST", {
    //stuur de waardes mee zodat php het als post kan ophalen
    name: name.value,
    box: box.value,
    size: size.value,
    allergy: allergy.value,
    preferences: preferences.value,
    fingerprint: fingerprint.value,
    foodbank: foodbank.value

  }).then(data => {

    // Check for errors
    if (data.hasOwnProperty("error")) {
      alert(data.error);
      return;
    }

    alert(data.message);
  })
}

//haal de edit User button op
const editUserButton = document.querySelector('.js-edit-button');

//wanneer er op geklikt word vuur adduser
editUserButton.addEventListener('click', editUser);

function editUser() {
  //haal de input fields op
  const id = document.querySelector('.js-edit-id');
  const name = document.querySelector('.js-edit-name');
  const box = document.querySelector('.js-edit-box');
  const size = document.querySelector('.js-edit-size');
  const allergy = document.querySelector('.js-edit-allergy');
  const preferences = document.querySelector('.js-edit-preferences');
  const foodbank = document.querySelector('.js-edit-foodbank');

  console.log(id.id);
  console.log(name.value)
  console.log(box.value)
  console.log(size.value)
  console.log(allergy.value)
  console.log(preferences.value)
  console.log(foodbank.value)

  //kijk of ze niet leeg zijn
  if (!id.id || !name.value || !box.value || !size.value || !foodbank.value) {
    return alert("empty fields");
  }

  //maak een request naar de php file met javascript fetch
  Request('includes/editUser.php', "POST", {
    //stuur de waardes mee zodat php het als post kan ophalen
    id: id.id,
    name: name.value,
    box: box.value,
    size: size.value,
    allergy: allergy.value,
    preferences: preferences.value,
    foodbank: foodbank.value

  }).then(data => {

    // Check for errors
    if (data.hasOwnProperty("error")) {
      alert(data.error);
      return;
    }

    alert(data.message);
  })
}

let vingerprint = 0;

function isnotthesame() {

  fetch('http://localhost/YourChoice/includes/vingerprint.php', {
    method: 'get',
    // may be some code of fetching comes here
  }).then(function (response) {
    if (response.status >= 200 && response.status < 300) {
      return response.text()
    }
    throw new Error(response.statusText)
  })
    .then(function (response) {
      console.log(response);

      if (vingerprint != response) {
        vingerprint = response;

        refresh();

      } else {
        console.log("false");
      }
    })
}

//request function
function Request(link, method, data) {

  return new Promise((resolve, reject) => {

    const formdata = new FormData();

    // GO over all data items
    //stop het in formdata, ajax deed dit vroeger zelf
    for (const key in data) {
      if (data.hasOwnProperty(key)) {
        // Append this key with it's value to formdata
        formdata.append(key, data[key]);
      }
    }

    //link is includes.... method is post en body is de formdata met de gegevens van de input fields
    fetch(link, {
      method: method,
      body: formdata
    }).then(res => {

      console.log(res)

      // Parse the json en return het naar de console log, Normaal zou je dit als popup tonen.
      res.json().then(parsedJson => {
        console.log(parsedJson);
        return resolve(parsedJson);
      }).catch(e => {
        console.log(e);
        reject();
      })

    }).catch(e => {
      console.log(e);
      reject();
    })
  })
}

//refresh the add and info forms with the current vingerid

function refresh() {
  const add = document.querySelector('.js-add');
  const info = document.querySelector('.js-info');

  info.innerHTML = "";
  $(info).load("http://localhost/YourChoice/info.php");
  
  add.innerHTML = "";
  $(add).load("http://localhost/YourChoice/add.php");
}

//refresh every 2 sec
setInterval(function(){ isnotthesame() }, 2000);
