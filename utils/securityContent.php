<?php
$sessionLang = $_SESSION["lang"];

echo $sessionLang === "eng" ? '<script>
console.log("Security: On");
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    alert("To respect the copyright, please do not copy. Thank you!");
});
document.addEventListener("copy", function(e) {
    e.preventDefault();
    alert("To respect the copyright, please do not copy. Thank you!");
});
document.addEventListener("keydown", function(event) {
    if (event.ctrlKey && event.shiftKey && event.key === "I") {
        event.preventDefault();
        alert(
            "The use of developer tools is strictly prohibited on this website. Please respect our terms of service."
        );
    }
    if (event.key === "F12") {
        event.preventDefault();
        alert(
            "The use of developer tools is strictly prohibited on this website. Please respect our terms of service."
        );
    }
    if (event.ctrlKey && event.key === "u") {
        event.preventDefault();
        alert("The viewing of source code is strictly prohibited. Please respect our terms of service.");
    }
});
</script>' : '<script>
console.log("Security: On");
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    alert("Để tôn trọng bản quyền, vui lòng không copy. Xin cảm ơn!");
});
document.addEventListener("copy", function(e) {
    e.preventDefault();
    alert("Để tôn trọng bản quyền, vui lòng không copy. Xin cảm ơn!");
});
document.addEventListener("keydown", function(event) {
    if (event.ctrlKey && event.shiftKey && event.key === "I") {
        event.preventDefault();
        alert("Vui lòng không sử dụng Devtools trong trang web, xin cảm ơn!");
    }
    if (event.key === "F12") {
        event.preventDefault();
        alert("Vui lòng không sử dụng Devtools trong trang web, xin cảm ơn!");
    }
    if (event.ctrlKey && event.key === "u") {
        event.preventDefault();
        alert("Trang web không cho phép xem mã nguồn, xin cảm ơn!");
    }
});
</script>';