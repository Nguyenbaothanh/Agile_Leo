<!DOCTYPE html>
<html>
<head>
    <title>Laptop Filter</title>
    <style>
#filterForm {
    margin: 0;
    padding: 0;
}

/* Apply flexbox to the form */
#filterForm {
    display: flex;
    flex-wrap: wrap; /* Allows form elements to wrap to a new line if needed */
}

/* Create a class for each form group (label + select) */
.form-group {
    display: flex; /* Make form groups appear in a row */
    align-items: center; /* Vertically align items within the form group */
    margin-right: 20px; /* Add some space between form groups, adjust as needed */
}

/* Style the label element */
.form-group label {
    margin-right: 5px; /* Add a small space between the label and select element */
}

/* Style the select element */
.form-group select {
    /* Add desired styles for the select element, e.g., width, border, etc. */
    width: 150px; /* Set a specific width for the select element, adjust as needed */
}
        body {
            max-width: 1200px;
            margin: 0 auto;
        }

        #laptopsContainer {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
        }

        /* Optional: Style the laptop cards */
        #laptopsContainer div {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        
        #laptopsContainer img {
            max-width: 500px;
            height: 200px;
        }
    </style>
</head>
<body>

    <form id="filterForm">
        <label for="brand">Brand:</label>
        <select id="brand" name="brand">
            <option value="">All</option>
            <option value="Asus">Asus</option>
            <option value="Msi">Msi</option>
            <!-- Add more brand options here -->
        </select>
        <br>

        <label for="processor">Processor:</label>
        <select id="processor" name="processor">
            <option value="">All</option>
            <option value="Core i3">Core i3</option>
            <option value="Processor 2">Processor 2</option>
            <!-- Add more processor options here -->
        </select>
        <br>

        <button type="submit">Filter</button>
    </form>

    <div id="laptopsContainer">

    </div>
    <div class="pagination">
        <button id="prevPageBtn" disabled>Previous Page</button>
        <button id="nextPageBtn" disabled>Next Page</button>
    </div>
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

// Function to fetch laptops data based on the filter and display them on the current page
function fetchLaptops(filterData) {
    // Convert form data to URLSearchParams
    const formData = new URLSearchParams(filterData);

    // Make a fetch request to "fetch_laptops.php" with the filter data
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
        laptopsContainer.innerHTML = "";

        // Loop through laptops for the current page and append them to the container
        for (let i = startIndex; i < endIndex; i++) {
            const laptop = data[i];
            const laptopCard = document.createElement("div");
            laptopCard.innerHTML = `
                <img src="/action/${laptop.image_url}" alt="${laptop.laptop_name}">
                <h2>${laptop.laptop_name}</h2>
                <p>Price: $${laptop.price_range}</p>
            `;
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
