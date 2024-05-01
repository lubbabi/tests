document.addEventListener("DOMContentLoaded", function() {
    const loginButton = document.getElementById("loginButton");
    const loginBox = document.getElementById("loginBox");

    // Function to toggle the visibility of the login box
    function toggleLoginBox() {
        loginBox.classList.toggle("show");
    }

    // Function to close the popup
    function closePopup() {
        loginBox.classList.remove("show");
    }

    // Event listener for the login button
    loginButton.addEventListener("click", toggleLoginBox);

    // Close the popup when the close button is clicked
    document.querySelector(".close-popup").addEventListener("click", closePopup);

    // Validator function when the form is submitted
    document.querySelector("form").addEventListener("submit", function(e) {
        e.preventDefault(); // Preventing form submission

        const uField = document.querySelector(".field:nth-child(1)");
        const uInput = uField.querySelector("input");
        const pField = document.querySelector(".field:nth-child(2)");
        const pInput = pField.querySelector("input");

        // Check if username and password are blank
        if (uInput.value.trim() === "") {
            showError(uField, "Username can't be blank");
        } else {
            removeError(uField);
        }

        if (pInput.value.trim() === "") {
            showError(pField, "Password can't be blank");
        } else {
            removeError(pField);
        }

        // Function to show error message
        function showError(field, message) {
            field.classList.add("shake", "error");
            let errorTxt = field.querySelector(".error-txt");
            errorTxt.innerText = message;

            // Hide error message after 3 seconds
            setTimeout(() => {
                removeError(field);
            }, 3000);
        }

        // Function to remove error
        function removeError(field) {
            field.classList.remove("shake", "error");
            let errorTxt = field.querySelector(".error-txt");
            errorTxt.innerText = "";
        }

        // If there are no errors, submit the form
        if (!uField.classList.contains("error") && !pField.classList.contains("error")) {
            this.submit();
        }
    });
});
