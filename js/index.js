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
