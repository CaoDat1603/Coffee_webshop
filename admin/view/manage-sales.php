<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['mySession_admin'])){
        header('location: ../view/sign_in.php');
    }
?>

<link rel="stylesheet" href="../view/css/sales.css">
    <main>  
        <div class="container-overview-all">
            <fieldset>
                <legend><h1>Tổng quan Khuyến Mãi</h1></legend>
    
                <div class="overview-all">
                    <div class="overview-item">
                        <h2>5</h2>
                        <p>Tổng Khuyến Mãi</p>
                    </div>
                    <div class="overview-item">
                        <h2>2</h2>
                        <p>Đang diễn ra</p>
                    </div>
                    <div class="overview-item">
                        <h2>2</h2>
                        <p>Đã kết thúc</p>
                    </div>
                    <div class="overview-item">
                        <h2>1</h2>
                        <p>Sắp diễn ra</p>
                    </div>
                </div>
            </fieldset>
        </div>

        <form class="search-container">
            <input type="search" class="search-input" placeholder="Tìm kiếm..." aria-label="Search">
            <button class="search-button" aria-label="Search Button"><i class='bx bx-search'></i></button>
        </form>

        <button class="add-sales-button" onclick="showAddSalesForm()">Add sales</button>

        <div id="addsalesForm" style="display: none;">
            <form class="formcsla">
                <h3>Add New Sale</h3>
                <label for="salesTitle">Title:</label>
                <input type="text" id="salesTitle" required>
        
                <label for="salesDateRange">Date Range:</label>
                <input type="text" id="salesDateRange" required>
        
                <label for="salesLocation">Location:</label>
                <input type="text" id="salesLocation" required>
        
                <label for="salesDescriptionHeading">Description Heading:</label>
                <input type="text" id="salesDescriptionHeading" required>
        
                <label for="salesDescriptionContent">Description Content:</label>
                <textarea id="salesDescriptionContent" rows="4" required></textarea>
        
                <label for="editSalesDetailsImage">Details Image File:</label>
                <input type="file" id="productImg" accept="image/*" onchange="previewImage()" required><br>
                <div id="imagePreview"></div>
        
                <label for="salesDetailContent">Detail Content:</label>
                <textarea id="salesDetailContent" rows="4" required></textarea>
        
                <label for="salesRewards">Rewards:</label>
                <textarea id="salesRewards" rows="4" required></textarea>
        
                <label for="salesNotes">Notes:</label>
                <textarea id="salesNotes" rows="4" required></textarea>
        
                <label for="salesStatus">Status:</label>
                <select id="salesStatus">
                    <option value="upcoming">Upcoming</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
        
                <button type="button" onclick="addSale()">Add Sale</button>
                <button type="button" onclick="hideAddSalesForm()">Cancel</button>
            </form>
        </div>             

        <div id="editsalesForm" style="display: none;">
            <form class="formcsla">
                <h2>Edit Sales</h2>
                <label for="editSalesTitle">Title:</label>
                <input type="text" id="editSalesTitle" required>
        
                <label for="editSalesDateRange">Date Range:</label>
                <input type="text" id="editSalesDateRange" required>
        
                <label for="editSalesLocation">Location:</label>
                <input type="text" id="editSalesLocation" required>
        
                <label for="editSalesDescriptionHeading">Description Heading:</label>
                <input type="text" id="editSalesDescriptionHeading" required>
        
                <label for="editSalesDescriptionContent">Description Content:</label>
                <textarea id="editSalesDescriptionContent" rows="4" required></textarea>
        
                <label for="editSalesDetailsImage">Details Image File:</label>
                <input type="file" id="productImg" accept="image/*" onchange="previewImage()" required><br>
                <div id="currentSaleImgContainer">
                    <img id="currentSaleImg" src="" alt="Current Sale Image" style="max-width: 200px; margin-bottom: 10px;">
                </div>
        
                <label for="editSalesDetailContent">Detail Content:</label>
                <textarea id="editSalesDetailContent" rows="4" required></textarea>
        
                <label for="editSalesRewards">Rewards:</label>
                <textarea id="editSalesRewards" rows="4" required></textarea>
        
                <label for="editSalesNotes">Notes:</label>
                <textarea id="editSalesNotes" rows="4" required></textarea>
        
                <label for="editSalesStatus">Status:</label>
                <select id="editSalesStatus">
                    <option value="upcoming">Upcoming</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
        
                <button type="button" id="saveSalesButton">Save Changes</button>
                <button type="button" onclick="hideEditSalesForm()">Cancel</button>
            </form>
        </div>
        
        <div id="saleDetails" style="display: none;"></div>

        <div id="confirmationModal" style="display: none;">
            <div class="modal-content">
                <h3>Bạn có chắc muốn xóa Khuyến Mãi này không?</h3>
                <div class="modal-buttons">
                    <button id="confirmDelete" onclick="confirmDelete()">Yes, Delete</button>
                    <button id="cancelDelete" onclick="cancelDelete()">Cancel</button>
                </div>
            </div>
        </div>

        <div id="sales-list" style="background-color: rgb(147, 201, 203); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <!-- saless will be grouped and listed here -->
        </div>

        <div id="discount-codes-section">
            <h1>Manage Discount Codes</h1>
            <button id="add-code-button">Add New Code</button>
            
            <div id="codes-list" style="background-color: rgb(147, 201, 203);padding: 20px;border-radius: 10px;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"></div>
            
            <!-- Form for adding/editing discount codes -->
            <div id="code-form" style="display: none;">
                <form class="formcsla">
                    <h2 id="form-title">Add/Edit Discount Code</h2>
                    <label for="code-name">Code Name:</label>
                    <input type="text" id="code-name" required>
                    <label for="discount-percent">Discount Percent:</label>
                    <input type="number" id="discount-percent" required>
                    <label for="max-discount">Max Discount:</label>
                    <input type="number" id="max-discount" required>
                    <label for="min-order-amount">Min Order Amount:</label>
                    <input type="number" id="min-order-amount" required>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity">
                    <label for="status">Status:</label>
                    <select id="status">
                        <option value="active">Active</option>
                        <option value="expired">Expired</option>
                    </select>
                    <button type="button" id="save-code-button">Save</button>
                    <button type="button" id="cancel-code-button">Cancel</button>
                </form>
            </div>
        </div>
        
        
    </main>
    <script src="../view/js/admin.js"></script>
    <script src="../view/js/sales.js"></script>
</body>
</html>
