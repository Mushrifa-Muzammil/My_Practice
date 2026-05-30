$(function () {
  // Main Menu JS
  $(window).scroll(function () {
    if ($(this).scrollTop() < 50) {
      $("nav").removeClass("site-top-nav");
      $("#back-to-top").fadeOut();
    } else {
      $("nav").addClass("site-top-nav");
      $("#back-to-top").fadeIn();
    }
  });

  // Shopping Cart Toggle JS
  $("#shopping-cart").on("click", function () {
    $("#cart-content").toggle("blind", "", 500);
  });

  // Back-To-Top Button JS
  $("#back-to-top").click(function (event) {
    event.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });

  // Delete Cart Item JS
  $(document).on("click", ".btn-delete", function (event) {
    event.preventDefault();
    $(this).closest("tr").remove();
    updateTotal();
  });

  // Update Total Price JS
  function updateTotal() {
    let total = 0;
    // Select only data rows (skip header row)
    $("#cart-content tbody tr").each(function () {
      // Get the 5th column (index 4) which contains the total price
      const rowTotal = parseFloat($(this).find("td:eq(4)").text().replace("$", ""));
      if (!isNaN(rowTotal)) {
        total += rowTotal;
      }
    });
    // Update the total in the cart table footer
    $("#cart-content tfoot th:eq(0)").text("Total");
    $("#cart-content tfoot th:eq(1)").text("$" + total.toFixed(2));
    // Also update total on order page if present
    $(".tbl-full tfoot th:eq(1)").text("$" + total.toFixed(2));
  }

  // Initialize total on page load
  setTimeout(updateTotal, 100);
});