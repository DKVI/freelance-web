<form method="GET" action="<?php echo BASE_URL . '/search' ?>"
    class="d-flex justify-content-end search-bar m-0 position-relative ">
    <input class="expand-none h-100 search-input form-control search-input" style="font-size: 16px" name="keyword"
        placeholder="Enter keyword" onblur="clearSearch()">
    <button class="btn btn-search d-flex" type="submit"><i class="fa-solid fa-magnifying-glass m-0"></i></button>
    <div class="search-result w-100 position-absolute shadow p-3 rounded-3"
        style="background-color: white; top: calc(100% + 8px); left: 0;">
        <div class="w-100 keyword" style="font-size: 16px; color: #cccc">
            Search for "keyword"
        </div>
        <div class="search-container">
            <ul class="list-unstyled d-flex flex-column ">
            </ul>
        </div>
    </div>
</form>

<script>
//Khung dữ liệu của search
const searchContainer = document.querySelector(".search-container ul");
//Thẻ input dùng để search
const searchInput = document.querySelector(".search-input");
//Lấy ra dữ liệu khi truyền keyword
const keyword = document.querySelector(".keyword");
const searchResult = document.querySelector(".search-result");
const searchBtn = document.querySelector(".btn-search");
searchResult.style.display = "none";
//Lấy dữ liệu từ file handleSearch file này sẽ trả về dữ liệu từ db và đây là 1 hành động bất đồng bộ
//Do phải đọc file nên JS sẽ chuyển hành động này qua 1 vùng nhớ khác do đó phải sử dụng promise và async await để đồng bộ hành vi
const getPostByKeyWord = (keyword) => {
    return new Promise(async (resolve, reject) => {
        await fetch(`<?php echo BASE_URL ?>/controllers/handleSearch.php?keyword=${keyword}`)
            .then(
                res =>
                resolve(res.json())).catch(err => reject(err));
    });
}
//render nội dung khung search 
const handleRender = (data) => {
    let html = '';
    Array.from(data).forEach((element, index) => {
        if (index <= 2) {
            html += `<li class="w-100">
                <a onclick="clearBlurEvent()" class="w-100 p-2 d-flex justify-content-between" href="<?php echo BASE_URL ?>${element.path}" style="height: 60px; cursor: pointer">
                    <div class="h-100 w-25"><img class="h-100" src="<?php echo BASE_URL ?>/uploads/imgs/${element.fileImg}" alt=""></div>
                    <div class="w-75 d-flex flex-column ">
                        <div class="w-100" style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        white-space: nowrap;">
                            ${element.title}
                        </div>
                        <div style="font-size: 12px">20 minues read</div>
                    </div>
                </a>
            </li>`;
        }
    })
    searchContainer.innerHTML = html;
}

const handleChangeKeyword = (text) => {
    keyword.innerHTML = `Search for "${text}"`;
}
//render lại sau khi nhập từ mới 
searchInput.oninput = async (e) => {
    searchResult.style.display = "block";
    if (e.target.value === '') {
        searchContainer.innerHTML = "";
    }
    const data = await getPostByKeyWord(e.target.value);
    handleChangeKeyword(e.target.value);
    handleRender(data);
}



//khi ấn ra ngoài khỏi input sẽ tắt khung search
const clearSearch = () => {
    searchResult.style.display = "none";
}

searchBtn.addEventListener("mouseover", function() {
    searchInput.focus();
    searchInput.classList.add("expanded");
    searchInput.classList.remove("expand-none");
});

searchResult.addEventListener("mouseover", function() {
    clearBlurEvent();
})

searchResult.addEventListener("mouseout", function() {
    blurEvent();
});
searchInput.onblur = function() {
    searchInput.classList.remove("expanded");
    searchInput.classList.add("expand-none");
    searchResult.style.display = "none";
};

function blurEvent() {
    searchInput.onblur = function() {
        searchInput.classList.remove("expanded");
        searchInput.classList.add("expand-none");
        searchResult.style.display = "none";
    };
}


function clearBlurEvent() {
    searchInput.onblur = function() {
        searchInput.classList.add("expanded");
        searchInput.classList.remove("expand-none");
        searchResult.style.display = "block";
    };
}
</script>


<style>
.search-input {
    transition: all 0.8s ease-in-out;
}

.expand-none {
    opacity: 0;
    width: 0;
}

.expanded {
    opacity: 1;
    width: 100%;
}
</style>