<div class="position-fixed rounded-circle z-3 d-flex popup-component" style="width: 50px; height: 50px; top: 90%; right: 50px; box-shadow: 3px 3px 10px #cccc;">
    <div class="rounded-circle z-3 d-flex message-btn" style="width: 50px; height: 50px; background-color: #274069;  cursor: pointer;">
        <i class="fa-regular fa-message m-auto " style="font-size: 24px; color: white"></i>
    </div>
    <div class="position-absolute shadow rounded-4 overflow-hidden popup-message" style="display: none; width: 300px; right: 0; bottom: calc(100% + 10px); background-color: white; animation: popup 0.4s; z-index: 9999">
        <div>
            <div class="title w-full d-flex px-2 py-3 text-center" style="background-color: #274069; color: white; font-size: 18px">
                <div class="m-auto">Contact
                    to us</div>
                <div class="px-2 close-btn" style="font-size: 24px; cursor: pointer">&times</div>
            </div>
            <div>
                <div class="px-3 py-2">
                    <form class="form position-relative" action="" method="POST">
                        <div class="form-group pb-2">
                            <label class="form-label" for="name">Full name <span style="color:red">*<span></label>
                            <input type="text" class="form-control name" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group pb-2">
                            <label class="form-label" for="email">Full name <span style="color:red">*<span></label>
                            <input type="email" class="form-control email" name="email" placeholder="Enter your email" required>

                        </div>
                        <div class="form-group pb-2">
                            <label class="form-label" for="phone">Phone number <span style="color:red">(optional)<span></label>
                            <input type="tel" class="form-control phone" name="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group pb-2">
                            <label class="form-label" for="message">Message <span style="color:red">*<span></label>
                            <textarea class="form-control message" name="message" placeholder="Type your message" rows="3" required></textarea>
                        </div>
                        <div class="w-full d-flex justify-content-end" style="gap: 8px">
                            <button class="btn w-full shadow" type="reset" style="background-color: white; color: #274069; border: solid 2px #274069">Clear</button>
                            <button class="btn w-full shadow submit-btn" type="submit" style="background-color: #274069; color: white">Send</button>
                        </div>
                    </form>
                    <div class="loading-screen position-absolute" style="display: none; left:0; right: 0; top: 0; bottom: 0">
                        <div class="loader m-auto"></div>
                    </div>
                    <div class="success-screen position-absolute" style="display: none; left:0; right: 0; top: 0; bottom: 0; background-color: #52da6b; animation: popup 0.2s; transition: all 0.5s ease-in-out">
                        <div class="m-auto w-full">
                            <div class="w-full d-flex">
                                <i class="fa-regular fa-circle-check m-auto" style="color: white; font-size: 100px;"></i>
                            </div>
                            <div class=" text-center pt-4">
                                <h3 style="color: white">SUCCESS!</h3>
                                <p style="color: white">Your message have been sent</p>
                                <button type="button" class="btn btn-outline-light">Go Back</button>
                            </div>
                        </div>
                    </div>
                    <div class="fail-screen position-absolute" style="display: none; left:0; right: 0; top: 0; bottom: 0; background-color: #e94848; animation: popup 0.2s; transition: all 0.5s ease-in-out">
                        <div class="m-auto w-full">
                            <div class="w-full d-flex">
                                <i class="fa-regular fa-circle-xmark m-auto" style="color: white; font-size: 100px;"></i>
                            </div>
                            <div class=" text-center pt-4">
                                <h3 style="color: white">OOPS!</h3>
                                <p style="color: white">Got some error, please try later!</p>
                                <button type="button" class="btn btn-outline-light">Try again</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .loader {
        width: 50px;
        --b: 8px;
        aspect-ratio: 1;
        border-radius: 50%;
        background: #514b82;
        -webkit-mask: repeating-conic-gradient(#0000 0deg, #000 1deg 70deg, #0000 71deg 90deg), radial-gradient(farthest-side, #0000 calc(100% - var(--b) - 1px), #000 calc(100% - var(--b)));
        -webkit-mask-composite: destination-in;
        mask-composite: intersect;
        animation: l5 1s infinite;
    }

    @keyframes l5 {
        to {
            transform: rotate(.5turn)
        }

    }

    @keyframes popup {
        from {
            scale: 0.5;
        }

        to {
            scale: 1;
        }
    }

    @keyframes fade {
        from {
            opacity: 0.5;
        }

        to {
            opacity: 1;
        }
    }

    .loading-screen {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>

<script>
    const messageBtn = document.querySelector(".message-btn");
    const loadingScreen = document.querySelector(".loading-screen");
    const popupMessage = document.querySelector(".popup-message");
    const form = document.querySelector("form");
    const submitBtn = document.querySelector(".submit-btn");
    const successScreen = document.querySelector(".success-screen");
    const failScreen = document.querySelector(".fail-screen");
    const closeBtn = document.querySelector(".close-btn");

    closeBtn.onclick = () => {
        messageBtn.classList.toggle("show");
        if (messageBtn.classList.contains("show")) {
            popupMessage.style.display = "block";
        } else {
            popupMessage.style.display = "none";
        }
    }
    //hide success screen
    successScreen.querySelector("button").onclick = () => {
        successScreen.style.display = "none";
    }

    //hide fail screen
    failScreen.querySelector("button").onclick = () => {
        failScreen.style.display = "none";
    }

    //handle popup form
    messageBtn.onclick = () => {
        messageBtn.classList.toggle("show");
        if (messageBtn.classList.contains("show")) {
            popupMessage.style.display = "block";
        } else {
            popupMessage.style.display = "none";
        }
    }

    popupMessage.onclick = (e) => {
        // if (e.target.className !== 'popup-message') {
        //     popupMessage.style.display = "none";
        // }
        console.log(e.target.closest("popup-message"));
    }
    //Send request to server
    async function sendMessage(formData) {
        const response = await fetch('<?php echo BASE_URL ?>/controllers/handleSendMessage.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(formData)
        });
        return response.json();
    }
    // Validate Email Address
    function isValidEmail(email) {
        const pattern =
            /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        return pattern.test(email);
    }
    //Handle send message
    submitBtn.onclick = (e) => {
        const name = document.querySelector(".name").value;
        const email = document.querySelector(".email").value;
        const message = document.querySelector(".message").value;
        console.log(isValidEmail(email))
        if (name !== '' && email !== '' && isValidEmail(email) && message !== '') {
            loadingScreen.style.display = "flex";
            e.preventDefault();
            const data = new FormData();
            const phone = document.querySelector(".phone").value;
            sendMessage({
                name,
                email,
                phone,
                message
            }).then(res => {
                console.log(res);
                if (res) {
                    setTimeout(() => {
                        successScreen.style.display = "flex";
                        loadingScreen.style.display = "none";
                    }, 1500);
                } else {
                    setTimeout(() => {
                        failScreen.style.display = "flex";
                        loadingScreen.style.display = "none";
                    }, 1500);
                }
            }).catch(err => {
                setTimeout(() => {
                    failScreen.style.display = "flex";
                    loadingScreen.style.display = "none";
                }, 1500);
            });
        }
    }
</script>