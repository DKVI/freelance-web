//circle text animation
const text = document.querySelectorAll(".text");
for (let i = 0; i < text.length; i++) {
  text[i].innerHTML = text[i].innerText
    .split("")
    .map(
      (char, x) =>
        `<span style="transform:rotate(${x * 9.2}deg)">${char}</span>`
    )
    .join("");
}

// FAQ PAGE ROTATE FUNCTION
let faqLabel = document.querySelectorAll(".faq-label");
faqLabel.forEach(
  (item) =>
    (item.onclick = () => {
      //Answer
      item.nextElementSibling.classList.toggle("active");
      let labelIcon = item.lastElementChild;
      let icons = labelIcon.lastElementChild;
      icons.classList.toggle("rotate");
    })
);

const sectionList = document.querySelectorAll("section");

const mainContainer = document.querySelector(".main");
const bodyContainer = document.querySelector("body");
window.addEventListener("scroll", function () {
  sectionList.forEach((section) => {
    let value = section.getBoundingClientRect().y;
    if (value <= 500) {
      section.classList.add("section-active");
    }
  });
});
/**
 * Preloader
 */
const preloader = document.querySelector("#preloader");
mainContainer.style.display = "none";
document.addEventListener("DOMContentLoaded", () => {
  console.log("Preloader loaded");
  setTimeout(() => {
    preloader.classList.add("loaded");
  }, 1000);

  setTimeout(() => {
    preloader.remove();
    mainContainer.style.display = "block";
  }, 4000);
});
// click to flip card - About page - our team
let cards = document.querySelectorAll(".flip-card");

cards.forEach((card) => {
  card.addEventListener("click", function () {
    // Toggle the 'is-flipped' class on the clicked card
    this.classList.toggle("is-flipped");

    // Find all the other cards and remove the 'is-flipped' class from them
    cards.forEach((c) => {
      if (c !== this) {
        c.classList.remove("is-flipped");
      }
    });
  });
});
