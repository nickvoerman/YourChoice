//haal de login button op
const loginButton = document.querySelector('.js-login');
//kijk wanneer er op gedrukt word en fire loginuser
loginButton.addEventListener('click', loginUser);

function loginUser() {

//haal de input fields op
const username = document.querySelector('.js-username');
const password = document.querySelector('.js-password');

console.log(username.value)
console.log(password.value)

//kijk of ze niet leeg zijn
  if(!username.value || !password.value) {
    return alert("empty fields");
  }

  //maak een request naar de php file met javascript fetch
  Request('includes/loginUser.php', "POST", {
    //stuur de waardes mee zodat php het als post kan ophalen
    username: username.value,
    password: password.value

  }).then(data => {

    // Check for errors
    if (data.hasOwnProperty("error")) {
      alert(data.error);
      return;
    }

    alert(data.message);
    window.location.href = "index.php";
  })
}

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