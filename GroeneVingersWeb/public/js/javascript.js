function showDropdown(option) {
    // Verberg alle dropdowns
    var dropdowns = document.querySelectorAll(".dropdown");
    dropdowns.forEach(function (dropdown) {
        dropdown.style.display = "none";
    });

    // Controleer welke optie is geselecteerd
    var selectedOption = document.querySelector(
        'input[name="payment_option"]:checked'
    );

    // Als de bankoptie is geselecteerd, toon dan de bijbehorende dropdown
    if (selectedOption && selectedOption.value === "bank") {
        document.getElementById("dropdown-" + option).style.display = "block";
    } else if (selectedOption && selectedOption.value === "paypal") {
        // Als de PayPal-optie is geselecteerd, zorg ervoor dat de dropdown wordt verborgen
        document.getElementById("dropdown-" + option).style.display = "none";
    }
}



    