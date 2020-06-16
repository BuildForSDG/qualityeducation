
//SIGN UP FORM VALIDATION
$(document).ready(function () {
    $("#register").click(function () {
        var letter = /[a-zA-Z]/;
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var number = document.getElementById("tele").value;
        var password = document.getElementById("password").value;
        var cpassword = document.getElementById("cpassword").value;
        var ucountry = document.getElementById("ucountry").value;
        var gender = document.getElementById("gender").value;

        if (fname.length > 3) {
            fname=true;
        } else {
            fname='Name is invalid';
        }
        if (lname.length > 3) {
            lname=true;
        } else {
            lname='Name is invalid';
        }
        if (email.indexOf("@") < 1 || email.lastIndexOf(".") < email.indexOf("@") + 2 || email.lastIndexOf(".") + 2 >= email.length) {
            invalid.push("*Email");
        }

        if (password.length < 4 || !letter.test(password) || !number.test(password) || (password != cpassword)) {
            invalid.push("*Password");
        }
        if (invalid.length != 0) {
            alert("Please provide response: \n" + invalid.join("\n"));
            return false;
        }
        if (ucountry.selectedIndex < 1) {
            passing.innerHtml="Please select Country.";
            ucountry.focus();
            return false;
        } 
        if (gender.selectedIndex < 1) {
            passing.innerHtml="Please select gender.";
            gender.focus();
            return false;
        } 

        return true;
    });
});
