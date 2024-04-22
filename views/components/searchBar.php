<div class="search-input position-relative d-block" style="width: 500px; height: 50px;"><input
        class="w-100 h-100 px-2 py-2" placeholder="enter keyword" onblur="clearSearch()">
    <div class="search-container position-absolute bg-white shadow" style="left: 0; top: 100%; right: 0">
    </div>
</div>

<script>
const searchContainer = document.querySelector(".search-container");
const searchInput = document.querySelector(".search-input");
const getPostByKeyWord = (keyword) => {
    return new Promise(async (resolve, reject) => {
        await fetch(`<?php echo BASE_URL ?>/controllers/handleSearch.php?keyword=${keyword}`).then(
            res =>
            resolve(res.json())).catch(err => reject(err));
    });
}

const handleRender = (data) => {
    let html = '';
    Array.from(data).forEach((element, index) => {
        if (index <= 2) {
            html += `<li><h3>${element.title}</h3></li>`;
        }
    })
    searchContainer.innerHTML = html;
}
searchInput.oninput = async (e) => {
    if (e.target.value === '') {
        console.log("empty")
        searchContainer.innerHTML = "";
    }
    const data = await getPostByKeyWord(e.target.value);
    handleRender(data);
}

const clearSearch = () => {
    console.log("blur event");
    searchContainer.innerHTML = "";
}
</script>