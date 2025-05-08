// Get Sale by ID
function getSaleById(id) {
    return sales.find(sale => sale.id === id);
}
// Show the Add Sales form
function showAddSalesForm() {
    document.getElementById('addsalesForm').style.display = 'flex';
}

// Hide the Add Sales form
function hideAddSalesForm() {
    document.getElementById('addsalesForm').style.display = 'none';
}

// Preview the selected image
function previewImage() {
    const file = document.getElementById('productImg').files[0];
    const reader = new FileReader();
    reader.onloadend = function() {
        const img = document.createElement('img');
        img.src = reader.result;
        img.width = 100; // Adjust the size as needed
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = ''; // Clear any previous preview
        previewContainer.appendChild(img);
    };
    if (file) {
        reader.readAsDataURL(file);
    }
}

// Show the Edit Sales form
function showEditSalesForm(id) {
    const sale = getSaleById(id);
    if (sale) {
        // Fill the form with sale data
        document.getElementById('editSalesTitle').value = sale.title;
        document.getElementById('editSalesDateRange').value = sale.dateRange;
        document.getElementById('editSalesLocation').value = sale.location;
        document.getElementById('editSalesDescriptionHeading').value = sale.description.heading;
        document.getElementById('editSalesDescriptionContent').value = sale.description.content.join('\n');
        document.getElementById('editSalesDetailContent').value = sale.detail.content.join('\n');
        document.getElementById('editSalesRewards').value = sale.detail.rewards.join('\n');
        document.getElementById('editSalesNotes').value = sale.notes.join('\n');
        document.getElementById('editSalesStatus').value = sale.status;

        // Display current sale image
        const currentImg = document.getElementById('currentSaleImg');
        currentImg.src = "../" + sale.detailsImage; // Set the current image source
        currentImg.style.display = 'block'; // Show the image element
                
        // Add event listener to handle image file changes
        document.getElementById('editsalesForm').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    currentImg.src = e.target.result; // Update the image display
                };
                reader.readAsDataURL(file); // Read image as base64 URL
            }
        });

        document.getElementById('editsalesForm').style.display = 'flex';
        document.getElementById('saveSalesButton').onclick = () => saveSale(id);
    }
}

// Hide the Edit Sales form
function hideEditSalesForm() {
    document.getElementById('editsalesForm').style.display = 'none';
}

// Show confirmation modal for deletion
function showConfirmationModal(id) {
    document.getElementById('confirmationModal').style.display = 'flex';
    document.getElementById('confirmDelete').onclick = () => confirmDelete(id);
    document.getElementById('cancelDelete').onclick = cancelDelete;
}

// Confirm delete sale
function confirmDelete(id) {
    deleteSale(id);
    document.getElementById('confirmationModal').style.display = 'none';
}

// Cancel delete sale
function cancelDelete() {
    document.getElementById('confirmationModal').style.display = 'none';
}

// Show Sale Details
function showSaleDetails(id) {
    const sale = getSaleById(id);
    if (sale) {
        const detailsContainer = document.getElementById('saleDetails');
        
        // Sanitize content to prevent XSS attacks
        function sanitizeHTML(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, (m) => map[m]);
        }

        // Create HTML content
        const detailsHTML = `
        <div class="detail-salse-prv">
            <h1 id="notification-title">${sanitizeHTML(sale.title)}</h1>
            <div id="date-send" style="padding-top: 10px; color: #a5a2a2; font-size: 12px;">
                ${sanitizeHTML(sale.dateRange)}
            </div>
            <div class="contents">
                <div id="notes-heading" style="padding: 5px;">
                    <p>
                        <b>${sanitizeHTML(sale.description.heading)}</b> ${sanitizeHTML(sale.location)}<br><br>
                        <b>${sanitizeHTML(sale.description.heading)}</b> ${sale.description.content.map(sanitizeHTML).join('<br><br>')}
                    </p>
                </div>
                <div style="display: flex; justify-content: center; margin: 15px; color: black;">
                    <b>NỘI DUNG CHI TIẾT</b>
                </div>
                <img class="imgl imgl-loaded" src="../${sanitizeHTML(sale.detailsImage)}" style="margin-bottom: 15px;">
                <p id="notification-content">
                    Từ ngày <b>${sanitizeHTML(sale.dateRange)}</b>, khi Khách hàng ghé thăm cửa hàng và mua hóa đơn từ 200,000đ sẽ được rút thăm với cơ hội 100% trúng thưởng một trong những phần quà sau:<br><br>
                    ${sale.detail.rewards.map(reward => `- ${sanitizeHTML(reward)}`).join('<br><br>')}
                </p>
                <div class="notes-footer-pg">
                    <b>LƯU Ý</b><br><br>
                    <p id="notes-ft-pg">
                        ${sale.notes.map(note => `- ${sanitizeHTML(note)}`).join('<br><br>')}
                    </p>
                </div>
            </div>
            <button class="close-detail-sale" onclick="hideSaleDetails()">Đóng</button>
        </div>`;

        // Insert HTML content into the container
        detailsContainer.innerHTML = detailsHTML;
        detailsContainer.style.display = 'flex';
    } else {
        console.error(`Sale with ID ${id} not found.`);
    }
}



// Hide Sale Details
function hideSaleDetails() {
    document.getElementById('saleDetails').style.display = 'none';
}


function renderSales() {
    function groupSalesByStatus() {
        const groupedSales = {
            ongoing: [],
            completed: [],
            upcoming: []
        };

        sales.forEach(sale => {
            groupedSales[sale.status].push(sale);
        });

        return groupedSales;
    }

    const container = document.getElementById('sales-list');
    container.innerHTML = ''; // Clear existing content

    const groupedSales = groupSalesByStatus();

    // Create a table for each status
    Object.keys(groupedSales).forEach(status => {
        if (groupedSales[status].length > 0) {
            const statusHeading = document.createElement('h2');
            if (status === 'upcoming') {
                statusHeading.textContent = 'Status: Sắp diễn ra (Upcoming)';
            } else if (status === 'ongoing') {
                statusHeading.textContent = 'Status: Đang diễn ra (Ongoing)';
            } else {
                statusHeading.textContent = 'Status: Đã hoàn thành (Completed)';
            }
            container.appendChild(statusHeading);

            const table = document.createElement('table');
            table.innerHTML = `
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date Range</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ${groupedSales[status].map(sale => `
                        <tr>
                            <td>${sale.id}</td>
                            <td>${sale.title}</td>
                            <td>${sale.dateRange}</td>
                            <td>
                                <button onclick="showSaleDetails(${sale.id})">View Details</button>
                                <button onclick="showEditSalesForm(${sale.id})">Edit</button>
                                <button onclick="showConfirmationModal(${sale.id})">Delete</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            `;
            container.appendChild(table);
        }
    });
}

// Function to add a new discount code
function addDiscountCode(code, discountPercent, maxDiscount, minOrderAmount, quantity, status) {
    if (validCodes[code]) {
        console.log('Discount code already exists');
        return;
    }

    validCodes[code] = {
        id: Object.keys(validCodes).length + 1,
        discountPercent,
        maxDiscount,
        minOrderAmount,
        quantity,
        status
    };
    console.log('Discount code added:', validCodes[code]);
    renderDiscountCodes();
}

// Function to edit an existing discount code
function editDiscountCode(code, newDetails) {
    if (!validCodes[code]) {
        console.log('Discount code does not exist');
        return;
    }

    validCodes[code] = { ...validCodes[code], ...newDetails };
    console.log('Discount code updated:', validCodes[code]);
    renderDiscountCodes();
}

// Function to delete a discount code
function deleteDiscountCode(code) {
    if (!validCodes[code]) {
        console.log('Discount code does not exist');
        return;
    }

    delete validCodes[code];
    console.log('Discount code deleted:', code);
    renderDiscountCodes();
}

// Function to render the list of discount codes in tables grouped by status
function renderDiscountCodes() {
    const container = document.getElementById('codes-list');
    container.innerHTML = ''; // Clear existing content

    // Group discount codes by status
    const groupedCodes = {
        active: [],
        expired: []
    };

    Object.entries(validCodes).forEach(([code, details]) => {
        groupedCodes[details.status].push({ code, ...details });
    });

    // Create a table for each status
    Object.keys(groupedCodes).forEach(status => {
        if (groupedCodes[status].length > 0) {
            const statusHeading = document.createElement('h2');
            if (status === 'active') {
                statusHeading.textContent = 'Status: Active';
            } else if (status === 'expired') {
                statusHeading.textContent = 'Status: Expired';
            }
            container.appendChild(statusHeading);

            const table = document.createElement('table');
            table.innerHTML = `
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Discount Percent</th>
                        <th>Max Discount</th>
                        <th>Min Order Amount</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ${groupedCodes[status].map(details => `
                        <tr>
                            <td>${details.code}</td>
                            <td>${details.discountPercent}%</td>
                            <td>${details.maxDiscount.toLocaleString()}₫</td>
                            <td>${details.minOrderAmount.toLocaleString()}₫</td>
                            <td>${details.quantity ? details.quantity : 'Unlimited'}</td>
                            <td>${details.status.charAt(0).toUpperCase() + details.status.slice(1)}</td>
                            <td>
                                <button onclick="editCode('${details.code}')">Edit</button>
                                <button onclick="deleteCode('${details.code}')">Delete</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            `;
            container.appendChild(table);
        }
    });
}

// Show form for adding a new discount code
document.getElementById('add-code-button').addEventListener('click', () => {
    document.getElementById('code-form').style.display = 'flex';
    document.getElementById('form-title').textContent = 'Add Discount Code';
    document.getElementById('code-name').value = '';
    document.getElementById('discount-percent').value = '';
    document.getElementById('max-discount').value = '';
    document.getElementById('min-order-amount').value = '';
    document.getElementById('quantity').value = '';
    document.getElementById('status').value = 'active';
});

// Edit a discount code
function editCode(code) {
    const details = validCodes[code];
    document.getElementById('code-name').value = code;
    document.getElementById('discount-percent').value = details.discountPercent;
    document.getElementById('max-discount').value = details.maxDiscount;
    document.getElementById('min-order-amount').value = details.minOrderAmount;
    document.getElementById('quantity').value = details.quantity ? details.quantity : '';
    document.getElementById('status').value = details.status;
    document.getElementById('form-title').textContent = 'Edit Discount Code';
    document.getElementById('code-form').style.display = 'flex';
}

// Handle form submission for adding/editing discount codes
document.getElementById('save-code-button').addEventListener('click', () => {
    const code = document.getElementById('code-name').value.trim();
    const discountPercent = parseInt(document.getElementById('discount-percent').value, 10);
    const maxDiscount = parseInt(document.getElementById('max-discount').value, 10);
    const minOrderAmount = parseInt(document.getElementById('min-order-amount').value, 10);
    const quantity = parseInt(document.getElementById('quantity').value, 10) || null;
    const status = document.getElementById('status').value;

    if (document.getElementById('form-title').textContent === 'Add Discount Code') {
        addDiscountCode(code, discountPercent, maxDiscount, minOrderAmount, quantity, status);
    } else {
        editDiscountCode(code, { discountPercent, maxDiscount, minOrderAmount, quantity, status });
    }
    document.getElementById('code-form').style.display = 'none';
});

// Cancel form display
document.getElementById('cancel-code-button').addEventListener('click', () => {
    document.getElementById('code-form').style.display = 'none';
});

// Initialize rendering on page load
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('sales-list')) {
        renderSales();
    }
    renderDiscountCodes();
});
