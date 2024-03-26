function initTextLoop() {
  const container = document.querySelector(".js--textloop--container");
  const content = container.querySelector(".js--textloop--content");
  const loopText = content.innerHTML;
  let init = false;

  while (container.offsetWidth > content.offsetWidth - container.offsetWidth) {
    if (!init) {
      content.innerHTML += loopText;
      animContent(content);
      init = true;
    } else {
      content.innerHTML += loopText;
    }
  }
  return;
}

function animContent(content) {
  //Solution via js animating with the animate method

  //Solution via CSS adding keyframes to the head

  const textLoopAnimation =
    `
              @keyframes moveLeft {
                  0% { left: 0; }
                  100% { left: -` +
    content.offsetWidth +
    `px; }
              }
              `;
  const styleElement = document.createElement("style");
  styleElement.innerHTML = textLoopAnimation;
  document.head.appendChild(styleElement);
}

initTextLoop();

// navbar animation

let menuBtn = document.querySelector("nav");
let navItem = document.querySelectorAll(".moving-nav");
menuBtn.addEventListener("mouseover", mouseOver);
menuBtn.addEventListener("mouseout", mouseOut);

function mouseOver() {
  navItem.forEach((element) => {
    element.classList.remove("moving-nav");
  });
}
function mouseOut() {
  navItem.forEach((element) => {
    element.classList.add("moving-nav");
  });
}
