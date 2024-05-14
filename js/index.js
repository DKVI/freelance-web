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
console.log(sectionList);

const mainContainer = document.querySelector(".main");
const bodyContainer = document.querySelector("body");
window.addEventListener("scroll", function () {
  sectionList.forEach((section) => {
    let value = section.getBoundingClientRect().y;
    console.log(value);
    if (value <= 500) {
      section.classList.add("section-active");
    }
  });
});
