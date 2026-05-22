function checkForm() {
    let ids = ["name","age","address","contact","weight","height"];
    for (let i = 0; i < ids.length; i++) {
        if (document.getElementById(ids[i]).value === "") {
            alert("All fields are required");
            return false;
        }
    }
    return true;
}