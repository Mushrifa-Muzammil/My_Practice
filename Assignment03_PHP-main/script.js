function validateForm() {
    let quantities = document.getElementsByName("qty[]");

    for (let i = 0; i < quantities.length; i++) {
        if (quantities[i].value <= 0) {
            alert("Quantity must be greater than zero");
            return false;
        }
    }
    return true;
}
