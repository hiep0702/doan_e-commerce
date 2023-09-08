let firstName = document.querySelector(".firstname");
let lastName = document.querySelector(".lastname");
let DOB = document.querySelector(".DOB");
let numberPhone = document.querySelector(".numberphone");
let email = document.querySelector(".email");
let userName = document.querySelector(".username");
let password = document.querySelector(".password");
let btnShowPasswordCreate = document.querySelector(".show-password-create");
let btnCreateAccount = document.querySelector(".create-account-btn");

let messSuccess1 = document.querySelector(".condition-succes-1");
let messSuccess2 = document.querySelector(".condition-succes-2");

let token = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

const isEmptyFunction = (input) => {
    let parentElement = input.parentElement;
    let error = parentElement.querySelector(".error");
    if (!input.value) {
        error.style.display = "block";
        return true;
    }
    error.style.display = "none";
    return false;
};

const isNameFunction = (input) => {
    let parentElement = input.parentElement;
    let error = parentElement.querySelector(".error");
    input = input.value.length;
    if (input == 0 || input > 30) {
        error.style.display = "block";
        return false;
    }
    error.style.display = "none";
    return true;
};

const isDateFunction = (input) => {
    let parentElement = input.parentElement;
    let error = parentElement.querySelector(".error");
    if (!input.valueAsDate) {
        error.style.display = "block";
        return false;
    }
    error.style.display = "none";
    return true;
};

const isNumberPhoneFunction = (input) => {
    let parentElement = input.parentElement;
    let error = parentElement.querySelector(".error");
    const regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    if (!regex.test(input.value)) {
        error.style.display = "block";
        return false;
    }
    error.style.display = "none";
    return true;
};

const isEmailFunction = (input) => {
    let parentElement = input.parentElement;
    let error = parentElement.querySelector(".error");
    const regex =
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (!regex.test(input.value)) {
        error.style.display = "block";
        return false;
    }
    error.style.display = "none";
    return true;
};

const isPasswordFunction = (input) => {
    let parentElement = input.parentElement;
    let error = parentElement.querySelector(".error");
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (input.value.length < 8) {
        error.style.display = "block";
        return false;
    } else if (!regex.test(input.value)) {
        error.style.display = "block";
        return false;
    }
    error.style.display = "none";
    return true;
};

// btnCreateAccount.addEventListener("click", () => {
//     isFirstNameEmpty = isEmptyFunction(firstName);
//     isLastNameEmpty = isEmptyFunction(lastName);
//     isDOBEmpty = isDateFunction(DOB);
//     isNumberPhoneEmpty = isEmptyFunction(numberPhone);
//     isEmailEmpty = isEmptyFunction(email);
//     isUserNameEmpty = isEmptyFunction(userName);
//     isPasswordEmpty = isEmptyFunction(password);
//     if (
//         isFirstNameEmpty ||
//         isLastNameEmpty ||
//         !isDOBEmpty ||
//         isNumberPhoneEmpty ||
//         isEmailEmpty ||
//         isUserNameEmpty ||
//         isPasswordEmpty
//     ) {
//         return;
//     }
//     let isFirstName = isNameFunction(firstName);
//     let isLastName = isNameFunction(lastName);
//     let isUserName = isNameFunction(userName);
//     let isNumberPhone = isNumberPhoneFunction(numberPhone);
//     let isEmail = isEmailFunction(email);
//     let isPassword = isPasswordFunction(password);
//     if (
//         !isFirstName ||
//         !isLastName ||
//         !isUserName ||
//         !isNumberPhone ||
//         !isEmail ||
//         !isPassword
//     ) {
//         return;
//     }

//     const data = {
//         firstnameApi: firstName.value,
//         lastnameApi: lastName.value,
//         dobApi: DOB.value,
//         numberphoneApi: numberPhone.value,
//         emailApi: email.value,
//         usernameApi: userName.value,
//         passwordApi: password.value,
//     };

//     let URL = `http://127.0.0.1:8000/api/client/register`;
//     fetch(URL, {
//         headers: {
//             "Content-Type": "application/json",
//             Accept: "application/json, text-plain, */*",
//             "X-Requested-With": "XMLHttpRequest",
//             "X-CSRF-TOKEN": token,
//         },
//         method: "post",
//         credentials: "same-origin",
//         body: JSON.stringify(data),
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// });

btnShowPasswordCreate.addEventListener("click", () => {
    let parentElement = btnShowPasswordCreate.parentElement;
    let password = parentElement.querySelector(".password");
    if (password.type == "password") {
        password.type = "text";
    } else if (password.type == "text") {
        password.type = "password";
    }
});

function myFunction() {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let condition1 = document.querySelector(".condition-succes-1");
    let condition2 = document.querySelector(".condition-succes-2");
    if (password.value.length > 8) {
        condition1.classList.add("condition-succes");
    } else {
        condition1.classList.remove("condition-succes");
    }
    if (regex.test(password.value)) {
        condition2.classList.add("condition-succes");
    } else {
        condition2.classList.remove("condition-succes");
    }
}

// ----------------------------------------------------Sign up------------------------------------------------------

let emailSignUp = document.querySelector(".email-sign-in");
let passwordSignUp = document.querySelector(".password-sign-in");
let rememberMe = document.querySelector(".remember-me");
let btnSignup = document.querySelector(".sign-in-btn");
let btnShowPasswordSignIn = document.querySelector(".show-password-sign-in");

btnSignup.addEventListener("click", () => {
    let isEmailSignUpEmpty = isEmptyFunction(emailSignUp);
    let isPasswordSignUpEmpty = isEmptyFunction(passwordSignUp);
    let isRememberMe = rememberMe.checked;

    if (isEmailSignUpEmpty || isPasswordSignUpEmpty) {
        return;
    }

    let isEmailSignUp = isEmailFunction(emailSignUp);
    let isPasswordSignUp = isPasswordFunction(passwordSignUp);

    if (!isEmailSignUp || !isPasswordSignUp) {
        return;
    }

    const data = {
        emailApi: emailSignUp.value,
        passwordApi: passwordSignUp.value,
    };

    if (isRememberMe) {
        data.remember = true;
    } else {
        data.remember = false;
    }

    let URL = `http://127.0.0.1:8000/api/client/login`;
    fetch(URL, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

btnShowPasswordSignIn.addEventListener("click", () => {
    let parentElement = btnShowPasswordSignIn.parentElement;
    let password = parentElement.querySelector(".password-sign-in");
    if (password.type == "password") {
        password.type = "text";
    } else if (password.type == "text") {
        password.type = "password";
    }
});
