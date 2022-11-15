//  JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })();

  //function

function create_account(){  
  var name=document.getElementById("n1").value;  
  var email=document.getElementById("e1").value;  
  var pwd=document.getElementById("p1").value;  
  
  //Code for password validation  
          var letters = /^[A-Za-z]+$/;  
          var email_val = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
  //other validations required code  
  if(name==''||email==''||pwd==''){  
  alert("Enter each details correctly");  
  }  
  else if(!letters.test(name))  
          {  
              alert('Name is incorrect must contain alphabets only');  
          }  
  else if (!email_val.test(email))  
          {  
              alert('Invalid email format please enter valid email id');  
          }  
  else if(pwd!=pwd)  
  {  
  alert("Passwords not matching");  
  }  
  else if(document.getElementById("p1").value.length > 12)  
  {  
  alert("Password maximum length is 12");  
  }  
  else if(document.getElementById("p1").value.length < 6)  
  {  
  alert("Password minimum length is 6");  
  }  
  else{  
  alert("Your account has been created successfully... Redirecting to JavaTpoint.com");  
  window.location="https://www.FoodCorner.com/";  
  }  
  }  
  
