<form method="GET" action="<?php echo BASE_URL . '/search' ?>" class="d-flex m-0">
    <input class=" w-100 h-100 px-2 search-input form-control" style="font-size: 16px" name="keyword" placeholder="Enter keyword" onblur="clearSearch()">
    <button class="btn d-flex" type="submit"><i class="fa-solid fa-magnifying-glass m-0"></i></button>
</form>

<script>
    //Khung dữ liệu của search
    const searchContainer = document.querySelector(".search-container");
    //Thẻ input dùng để search
    const searchInput = document.querySelector(".search-input");
    //Lấy ra dữ liệu khi truyền keyword

    //Lấy dữ liệu từ file handleSearch file này sẽ trả về dữ liệu từ db và đây là 1 hành động bất đồng bộ
    //Do phải đọc file nên JS sẽ chuyển hành động này qua 1 vùng nhớ khác do đó phải sử dụng promise và async await để đồng bộ hành vi
    const getPostByKeyWord = (keyword) => {
        return new Promise(async (resolve, reject) => {
            await fetch(`<?php echo BASE_URL ?>/controllers/handleSearch.php?keyword=${keyword}`).then(
                res =>
                resolve(res.json())).catch(err => reject(err));
        });
    }
    //render nội dung khung search 
    const handleRender = (data) => {
        let html = '';
        Array.from(data).forEach((element, index) => {
            if (index <= 2) {
                html += `<li><h3>${element.title}</h3></li>`;
            }
        })
        searchContainer.innerHTML = html;
    }
    //render lại sau khi nhập từ mới 
    searchInput.oninput = async (e) => {
        if (e.target.value === '') {
            console.log(" empty");
            searchContainer.innerHTML = "";
        }
        const data = await getPostByKeyWord(e.target.value);
        handleRender(data);
    }

    //khi ấn ra ngoài khỏi input sẽ tắt khung search
    const clearSearch = () => {
        console.log("blur event");
        searchContainer.innerHTML = "";
    }
</script>