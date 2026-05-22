function validateForm() {
    let name = document.getElementById("name").value;
    let account = document.getElementById("account").value;
    let extra = document.getElementById("extra_gb").value;

    if (name === "" || account === "" || extra === "") {
        alert("All fields are required");
        return false;
    }

    if (isNaN(account)) {
        alert("Account number must be numeric");
        return false;
    }

    return true;
}