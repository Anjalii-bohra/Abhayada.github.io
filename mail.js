const firebaseConfig = {
    apiKey: "AIzaSyCNdvAlBbLyGiLAa5B2oaLL5xmwejfDOWA",
    authDomain: "contactform-54cb1.firebaseapp.com",
    databaseURL: "https://contactform-54cb1-default-rtdb.firebaseio.com",
    projectId: "contactform-54cb1",
    storageBucket: "contactform-54cb1.appspot.com",
    messagingSenderId: "279996408412",
    appId: "1:279996408412:web:4a99767ddbc8031d72fc99"
  };
  
  // initialize firebase
  firebase.initializeApp(firebaseConfig);
  
  // reference your database
  var contactFormDB = firebase.database().ref("contactForm");
  
  document.getElementById("contactForm").addEventListener("submit", submitForm);
  
  function submitForm (e) {
    e.preventDefault();
  
    var vempid = getElementVal("vempid");
    var cname = getElementVal("cname");
    var cempid = getElementVal("cempid");
    var msg = getElementVal("msg");

  
    saveMessages(vempid, cname, cempid, msg);
  
    //   enable alert
    document.querySelector(".alert").style.display = "block";
  
    //   remove the alert
    setTimeout(() => {
      document.querySelector(".alert").style.display = "none";
    }, 3000);
  
    //   reset the form
    document.getElementById("contactForm").reset();
  }
  
  const saveMessages = (vempid, cname, cempid, msg) => {
    var newContactForm = contactFormDB.push();
  
    newContactForm.set({
      vempid: vempid,
      cname: cname,
      cempid: cempid,
      msg: msg,
    });
  };
  
  const getElementVal = (id) => {
    return document.getElementById(id).value;
  };

  



