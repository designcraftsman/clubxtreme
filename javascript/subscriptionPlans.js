/*inspiration 
https://cz.pinterest.com/pin/830703093776458971/
*/

const cards = document.querySelectorAll(".card");
cards.forEach((item) => {
  item.addEventListener("mouseover", () => {
    cards.forEach((el) => el.classList.remove("active"));
    item.classList.add("active");
  });
});
