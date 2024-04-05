<!-- Book -->
<div id="book" class="book w-100">
    <!-- Paper 1 -->
    <div id="p1" class="paper">
        <div class="front">
            <div id="f1" class="front-content">
                <h1>Front 1</h1>
            </div>
        </div>
        <div class="back">
            <div id="b1" class="back-content">
                <h1>Back 1</h1>
            </div>
        </div>
    </div>
    <!-- Paper 2 -->
    <div id="p2" class="paper">
        <div class="front">
            <div id="f2" class="front-content">
                <h1>Front 2</h1>
            </div>
        </div>
        <div class="back">
            <div id="b2" class="back-content">
                <h1>Back 2</h1>
            </div>
        </div>
    </div>
    <!-- Paper 3 -->
    <div id="p3" class="paper">
        <div class="front">
            <div id="f3" class="front-content">
                <h1>Front 3</h1>
            </div>
        </div>
        <div class="back">
            <div id="b3" class="back-content">
                <h1>Back 3</h1>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    /* Book */
    .book {
        margin: auto;
        position: relative;
        width: 350px;
        height: 500px;
        transition: transform 0.5s;
    }

    .paper {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        perspective: 1500px;

    }

    .front,
    .back {
        box-shadow: inset 5px 5px 10px rgba(0, 0, 0, 0.2);
        background-color: white;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        transform-origin: left;
        transition: transform 0.5s;
    }

    .front {
        z-index: 1;
        backface-visibility: hidden;
        border-left: 3px solid gray;
        cursor: pointer;
    }

    .back {
        z-index: 0;
        cursor: pointer;
    }

    .front-content,
    .back-content {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .back-content {
        transform: rotateY(180deg)
    }

    /* Paper flip effect */
    .flipped .front,
    .flipped .back {
        transform: rotateY(-180deg);
    }

    /* Controller Buttons */
    button {
        border: none;
        background-color: transparent;
        cursor: pointer;
        margin: 10px;
        transition: transform 0.5s;
    }

    button:focus {
        outline: none;
    }

    button:hover i {
        color: #636363;
    }

    i {
        font-size: 50px;
        color: gray;
    }

    /* Paper stack order */
    #p1 {
        z-index: 3;
    }

    #p2 {
        z-index: 2;
    }

    #p3 {
        z-index: 1;
    }
</style>

<script>
    // References to DOM Elements
    const prevBtn = document.querySelector("#prev-btn");
    const nextBtn = document.querySelector("#next-btn");
    const book = document.querySelector("#book");

    const paper1 = document.querySelector("#p1");
    const paper2 = document.querySelector("#p2");
    const paper3 = document.querySelector("#p3");
    const fronts = document.querySelectorAll(".front");
    const backs = document.querySelectorAll(".back");
    // Event Listener
    fronts.forEach(element => {
        element.addEventListener("click", goNextPage);
    });

    backs.forEach(element => {
        element.addEventListener("click", goPrevPage);
    });
    // Business Logic
    let currentLocation = 1;
    let numOfPapers = 3;
    let maxLocation = numOfPapers + 1;

    function openBook() {
        book.style.transform = "translateX(50%)";

    }

    function closeBook(isAtBeginning) {
        if (isAtBeginning) {
            book.style.transform = "translateX(0%)";
        } else {
            book.style.transform = "translateX(100%)";
        }
    }

    function goNextPage() {
        if (currentLocation < maxLocation) {
            switch (currentLocation) {
                case 1:
                    paper1.classList.add("flipped");
                    paper1.style.zIndex = 1;
                    break;
                case 2:
                    paper2.classList.add("flipped");
                    paper2.style.zIndex = 2;
                    break;
                case 3:
                    paper3.classList.add("flipped");
                    paper3.style.zIndex = 3;
                    break;
                default:
                    throw new Error("unkown state");
            }
            currentLocation++;
        }
    }

    function goPrevPage() {
        if (currentLocation > 1) {
            switch (currentLocation) {
                case 2:
                    paper1.classList.remove("flipped");
                    paper1.style.zIndex = 3;
                    break;
                case 3:
                    paper2.classList.remove("flipped");
                    paper2.style.zIndex = 2;
                    break;
                case 4:
                    paper3.classList.remove("flipped");
                    paper3.style.zIndex = 1;
                    break;
                default:
                    throw new Error("unkown state");
            }

            currentLocation--;
        }
    }
</script>