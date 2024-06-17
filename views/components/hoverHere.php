<div class="position-fixed z-3 hover-here-component text-center"
    style="width: 100px; height: 100px; top: 10%; right: 20%; filter: drop-shadow(#cccc 1px 1px 4px); ">
    <i class="fa-solid fa-arrow-up"></i>
    <p class="">Hover Here</p>
</div>


<style>
@keyframes showInfinite {
    from {
        opacity: 0.8;
        top: calc(15%);
    }

    to {
        opacity: 1;
        top: 10%;
    }
}

.hover-here-component {

    animation: showInfinite 1s infinite ease-in-out;
    transition: all .5s ease-in-out;
    z-index: 10;
}
</style>


<script>
const navBar = document.querySelector(".navbar");
const hoverHereBtn = document.querySelector(".hover-here-component");
navBar.onmouseover = () => {
    hoverHereBtn.style.opacity = 1;
    hoverHereBtn.style.display = "none";
}
</script>