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
document.addEventListener("contextmenu", function (event) {
  event.preventDefault();
});
document.addEventListener("copy", function (e) {
  e.preventDefault();
  alert("ĐỂ TÔN TRỌNG CHẤT XÁM, VUI LÒNG KH COPY, XIN CẢM ƠN");
});

// Attempt to capture and disable Ctrl+Shift+I (common shortcut)
document.addEventListener("keydown", function (event) {
  if (event.ctrlKey && event.shiftKey && event.key === "I") {
    event.preventDefault();
    alert("VUI LÒNG KHÔNG SỬ DỤNG DEVTOOLS ĐỂ LẤY DỮ LIỆU, XIN CẢM ƠN");
  }
  if (event.key === "F12") {
    event.preventDefault();
    alert("VUI LÒNG KHÔNG SỬ DỤNG DEVTOOLS ĐỂ LẤY DỮ LIỆU, XIN CẢM ƠN");
  }
  if (event.ctrlKey && event.key === "u") {
    event.preventDefault();
    alert("VUI LÒNG KHÔNG XEM MÃ NGUỒN, XIN CẢM ƠN");
  }
});
