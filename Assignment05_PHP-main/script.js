function validateForm() {
    let checkin = new Date(document.querySelector("[name='checkin']").value);
    let checkout = new Date(document.querySelector("[name='checkout']").value);

    if (checkout <= checkin) {
        alert("Check-out date must be after check-in date.");
        return false;
    }

    let activities = ["spa", "cycling", "swimming", "gym"];
    for (let act of activities) {
        let checkbox = document.querySelector(`[name="${act}"]`);
        let hours = document.querySelector(`[name="${act}_hours"]`).value;

        if (checkbox.checked && hours <= 0) {
            alert("Please enter hours for selected activities.");
            return false;
        }
    }

    return true;
}
