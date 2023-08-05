
<!DOCTYPE html>
<html>
<head>
    <title>Laptop Filter</title>
    <link rel="stylesheet" href="/css/filter.css">
</head>
<body>
    <header><?php include 'header.php';?></header>
    <main><form id="filterForm">
        <label for="brand">Brand:</label>
        <select id="brand" name="brand">
            <option value="">All</option>
            <option value="Asus">Asus</option>
            <option value="Msi">Msi</option>
            <option value="HP">HP</option>
            <option value="Acer">Acer</option>
            <option value="Dell">Dell</option>
            <option value="Samsung">SamSung</option>
            <option value="Macbook">Macbook</option>
            <option value="Lenovo">Lenovo</option>
            <option value="LG">LG</option>
            <option value="GIGABYTE">GIGABYTE</option>
            <option value="Huawei">Huawei</option>
        </select>
        <br>
        <label for="processor">Processor:</label>
        <select id="processor" name="processor">
            <option value="">All</option>
            <option value="Core i3">Core i3</option>
            <option value="Core i5">Core i5</option>
            <option value="Core i7">Core i7</option>
            <option value="Core i9">Core i9</option>
        </select>
        <br>
        <label for="ram">Ram:</label>
        <select id="ram" name="ram">
            <option value="">All</option>
            <option value="4GB">4GB</option>
            <option value="8GB">8GB</option>
            <option value="16GB">16GB</option>
            <option value="24GB">24GB</option>
            <option value="32GB">32GB</option>
            <option value="64GB">64GB</option>
        </select>
        <br>
        <label for="storage_capacity">Dung lượng ổ cứng:</label>
        <select id="storage_capacity" name="storage_capacity">
            <option value="">All</option>
            <option value="128 GB">128 GB</option>
            <option value="240 GB">240 GB</option>
            <option value="256 GB">256 GB</option>
            <option value="500 GB">500 GB</option>
            <option value="512 GB">512 GB</option>
            <option value="1 TB">1 TB</option>
            <option value="2 TB">2 TB</option>
            <option value="4 TB">4 TB</option>
        </select>
        <br>
        <button type="submit">Filter</button>
    </form>

    <div id="laptopsContainer">

    </div>
    <div class="pagination">
        <button id="prevPageBtn" disabled>Previous Page</button>
        <button id="nextPageBtn" disabled>Next Page</button>
    </div></main>
    
    <footer><?php 
    include 'footer.php';
    ?>
    </footer>
    <script>
        // Variables to track pagination
        let currentPage = 1;
        const laptopsPerPage = 20;
        let totalLaptops = 0;

        // Function to update pagination buttons based on the current page and total laptops count
        function updatePaginationButtons() {
            const prevPageBtn = document.getElementById("prevPageBtn");
            const nextPageBtn = document.getElementById("nextPageBtn");

            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage >= Math.ceil(totalLaptops / laptopsPerPage);
        }

        function getProductDetailsLink(laptopId) {
            return `/layout/product_details.php?id=${laptopId}`;
        }

        // Function to fetch laptops data based on the filter and display them on the current page
        function fetchLaptops(filterData) {
            // Convert form data to URLSearchParams
            const formData = new URLSearchParams(filterData);
            fetch("/action/fetch_laptops.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                // Save the total number of laptops retrieved
                totalLaptops = data.length;
                // Update pagination buttons based on the current page and total laptops count
                updatePaginationButtons();
                // Calculate the start and end index for the current page
                const startIndex = (currentPage - 1) * laptopsPerPage;
                const endIndex = Math.min(startIndex + laptopsPerPage, totalLaptops);
                // Get the container where laptops will be displayed
                const laptopsContainer = document.getElementById("laptopsContainer");
                // Clear previous data
                laptopsContainer.innerHTML = ""; // Clear previous data before appending new data
                for (let i = startIndex; i < endIndex; i++) {
                    const laptop = data[i];
                    const laptopCard = document.createElement("div");

                    // Create an anchor tag linking to the product_details.php page with the laptop ID
                    const laptopLink = document.createElement("a");
                    laptopLink.href = getProductDetailsLink(laptop.id);

                    // Create the content for the laptop card
                    laptopLink.innerHTML = `
                        <img src="/action/${laptop.image_url}" alt="${laptop.laptop_name}">
                        <h2 class='filter-laptop'>${laptop.laptop_name}</h2>
                        <p class='filter-laptop'> ${laptop.price_range} đ</p>
                    `;

                    // Append the laptop card to the laptops container
                    laptopCard.appendChild(laptopLink);
                    laptopsContainer.appendChild(laptopCard);
                }
            })
            .catch(error => console.error("Error fetching laptops:", error));
        }

        // Event listener for the filter form submission
        document.getElementById("filterForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            currentPage = 1; // Reset to the first page when a new filter is applied
            fetchLaptops(formData);
        });

        // Event listener for the "Previous Page" button
        document.getElementById("prevPageBtn").addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                fetchLaptops(new FormData(document.getElementById("filterForm")));
            }
        });

        // Event listener for the "Next Page" button
        document.getElementById("nextPageBtn").addEventListener("click", function () {
            if (currentPage < Math.ceil(totalLaptops / laptopsPerPage)) {
                currentPage++;
                fetchLaptops(new FormData(document.getElementById("filterForm")));
            }
        });

    </script>
</body>
</html>
