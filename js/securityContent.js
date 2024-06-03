document.addEventListener("contextmenu", function (event) {
  event.preventDefault();
});
document.addEventListener("copy", function (e) {
  e.preventDefault();
  alert("ĐỂ TÔN TRỌNG CHẤT XÁM, VUI LÒNG KH COPY, XIN CẢM ƠN");
});
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
