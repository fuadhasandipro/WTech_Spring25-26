console.log("Connected!");

function calculate_total() {
  let unit_price = 1000;
  let days = 30;

  let quantity_input = document.getElementById("quantity");
  let total_input = document.getElementById("totalPrice");

  let quantity = quantity_input.value;

  if (quantity == "") {
    total_input.value = 0;
    return false;
  }

  if (quantity < 0) {
    quantity_input.value = 0;
    quantity = 0;
    alert("Quantity cannot be negative. Resetting to 0.");
  }

  let total_price = unit_price * quantity * days;
  total_input.value = total_price;

  if (total_price > 1000) {
    alert("Congratulations! You are eligible for a gift coupon.");
  }
}

document.getElementById("quantity").addEventListener("input", calculate_total);
