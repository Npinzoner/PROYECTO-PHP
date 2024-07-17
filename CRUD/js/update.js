document.addEventListener("DOMContentLoaded", (event) => {
  document.querySelectorAll(".edit-btn").forEach((button) => {
    button.addEventListener("click", () => {
      const id = button.getAttribute("data-id");
      const game = button.getAttribute("data-game");
      const number = button.getAttribute("data-number");
      const city = button.getAttribute("data-city");
      const bet = button.getAttribute("data-bet");

      document.getElementById("edit-id").value = id;
      document.getElementById("edit-game").value = game;
      document.getElementById("edit-number").value = number;
      document.getElementById("edit-city").value = city;
      document.getElementById("edit-bet").value = bet;
    });
  });
});
