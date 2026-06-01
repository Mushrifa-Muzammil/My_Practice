function validateForm() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();

    if (name === "") {
        alert("Please enter name");
        return false;
    }

    if (email === "") {
        alert("Please enter email");
        return false;
    }

    return true;
}