<div class="position-fixed rounded-circle z-3 gototop-component" style="width: 50px; height: 50px; top: 90%; left: 50px; filter: drop-shadow(#cccc 5px 5px 5px); display:none; animation: show 0.5s; transition: all 0.5s ease-in-out">

    <div class="rounded-circle z-3 d-flex message-btn" style="width: 50px; height: 50px; background-color: #274069;  cursor: pointer; opacity: 80%">


        <i class="fa-solid fa-arrow-up m-auto" style="font-size: 24px; color: white"></i>
    </div>
</div>

<style>
    @keyframes show {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>


<script>
    const goToTopBtn = document.querySelector(".gototop-component");
    window.onscroll = () => {
        goToTopBtn.style.display = "flex";
    }
    goToTopBtn.onclick = () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>