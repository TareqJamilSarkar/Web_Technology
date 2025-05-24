

function validateForm(formId) {
    let form = document.getElementById(formId);
    let valid = true;
    let fname = form.firstname.value.trim();
    let sname = form.surname.value.trim();
    let phone = form.phone.value.trim();
    let dob = form.dob.value.trim();
    let address = form.address.value.trim();
    let email = form.email.value.trim();
    let password = form.password.value.trim();
    let event = form.querySelector('input[name="event"]:checked');

   
    let fields = ["firstname", "surname", "phone", "dob", "address", "email", "password"];
    fields.forEach(f => {
        form[f].style.border = "1px solid #bfc6d0";
    });


    if (fname.length < 3) {
        form.firstname.style.border = "2px solid #f00";
        valid = false;
    }

    if (!sname) {
        form.surname.style.border = "2px solid #f00";
        valid = false;
    }

    if (!/^\d{8,15}$/.test(phone)) {
        form.phone.style.border = "2px solid #f00";
        valid = false;
    }
  
    if (!dob) {
        form.dob.style.border = "2px solid #f00";
        valid = false;
    }
    
    if (!address) {
        form.address.style.border = "2px solid #f00";
        valid = false;
    }

    if (!/^[\w\.-]+@[\w\.-]+\.\w+$/.test(email)) {
        form.email.style.border = "2px solid #f00";
        valid = false;
    }

    if (password.length < 4) {
        form.password.style.border = "2px solid #f00";
        valid = false;
    }

    if (!event) {
        alert("Please select an event type.");
        valid = false;
    }
    return valid;
}

