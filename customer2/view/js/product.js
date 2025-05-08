document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let filteredItems = [];

    // Lấy giá trị bộ lọc từ URL
    const urlParams = new URLSearchParams(window.location.search);
    const filterFromUrl = urlParams.get('filter');
    
    // Xử lý sự kiện nhấp vào bộ lọc
    document.querySelectorAll('.filter-option').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Cập nhật trạng thái của các liên kết bộ lọc
            document.querySelectorAll('.filter-option').forEach(el => el.classList.remove('active'));
            e.currentTarget.classList.add('active');

            // Lấy loại sản phẩm được chọn
            const filter = e.currentTarget.getAttribute('data-filter');

            // Hiển thị hoặc ẩn các sản phẩm dựa trên loại
            filteredItems = [...document.querySelectorAll('.product-item')].filter(item => {
                const category = item.getAttribute('data-category');
                if (filter === 'all') return true;
                if (filter === 'nuoc' && category !== 'banh') return true;
                return category === filter;
            });

            totalPages = Math.ceil(filteredItems.length / itemsPerPage);
            currentPage = 1;
            showPage(currentPage);
        });
    });

    // Nếu có bộ lọc từ URL, kích hoạt nó
    if (filterFromUrl) {
        const filterLink = document.querySelector(`.filter-option[data-filter="${filterFromUrl}"]`);
        if (filterLink) {
            filterLink.click();
        }
    }

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (e) => {
            const productId = e.currentTarget.getAttribute('data-product-id');
            const productName = e.currentTarget.getAttribute('data-product-name');
            const productPrice = e.currentTarget.getAttribute('data-product-price');
            const productImg = e.currentTarget.getAttribute('data-product-img');
            const quantityElement = document.querySelector(`.product-quantity[data-product-id="${productId}"]`);
            const quantity = parseInt(quantityElement.value);
            addToCart(productId, productName, productPrice, productImg, quantity);
        });
    });

    function addToCart(productId, productName, productPrice, productImg, quantity) {
        const productIndex = cart.findIndex(item => item.id === productId);

        if (productIndex > -1) {
            cart[productIndex].quantity += quantity;
        } else {
            const product = {
                id: productId,
                name: productName,
                price: productPrice,
                img: productImg,
                quantity: quantity
            };
            cart.push(product);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartDisplay();
        updateCheckoutButton();
    }

    function updateCartDisplay() {
        const cartElement = document.querySelector('.cart-item');
        cartElement.innerHTML = '';
        let total = 0;
        let totalQuantity = 0;
    
        cart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.className = 'cc-item';
            cartItem.innerHTML = `
            <div class="contain-citem">
                <img src="${item.img}" alt="${item.name}">
                <p>${item.name}<br>${formatCurrency(parseCurrency(item.price))}</p>
                <div class="quantity-controls" style="display:flex; align-items: center;">
                    <p>X</p>
                    <input type="number" class="quantity-input" data-product-id="${item.id}" value="${item.quantity}" min="1" style="width: 30px; height: 30px;">
                </div>
            </div>
            <button class="remove-from-cart" data-product-id="${item.id}"><i class='bx bxs-message-square-x'></i></button>
            `;
            cartElement.appendChild(cartItem);
    
            // Cập nhật tổng tiền
            total += parseCurrency(item.price) * item.quantity;
    
            // Cập nhật tổng số lượng sản phẩm
            totalQuantity += item.quantity;
        });
    
        // Cập nhật số lượng giỏ hàng và tổng tiền
        document.querySelector('.cart sub').textContent = totalQuantity;
        document.querySelector('.cart-total').textContent = `Tổng tiền: ${formatCurrency(total)}`;
    
        // Thêm sự kiện xóa sản phẩm khỏi giỏ hàng
        cartElement.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                const productId = e.currentTarget.getAttribute('data-product-id');
                removeFromCart(productId);
            });
        });
    
        // Thêm sự kiện thay đổi số lượng sản phẩm trực tiếp từ input
        cartElement.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', (e) => {
                const productId = e.currentTarget.getAttribute('data-product-id');
                const newQuantity = parseInt(e.currentTarget.value);
                if (newQuantity >= 1) {
                    updateProductQuantityDirect(productId, newQuantity);
                } else {
                    e.currentTarget.value = 1; // Đảm bảo giá trị không nhỏ hơn 1
                    updateProductQuantityDirect(productId, 1);
                }
            });
        });
        updateCheckoutButton();
    }
    
    // Hàm cập nhật số lượng sản phẩm trực tiếp từ input
    function updateProductQuantityDirect(productId, newQuantity) {
        const productIndex = cart.findIndex(item => item.id === productId);
    
        if (productIndex > -1) {
            cart[productIndex].quantity = newQuantity;
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();  // Cập nhật lại hiển thị giỏ hàng sau khi thay đổi số lượng
        }
    }
    
    // Hàm chuyển đổi giá từ chuỗi sang số thực
    function parseCurrency(value) {
        return parseFloat(value.replace(/\./g, '').replace('đ', ''));
    }
    
    // Hàm định dạng số với dấu phân cách hàng nghìn
    function formatCurrency(value) {
        return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }
    
    function removeFromCart(productId) {
        const productIndex = cart.findIndex(item => item.id === productId);
    
        if (productIndex > -1) {
            cart.splice(productIndex, 1);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartDisplay();
        updateCheckoutButton();
    }

    function updateCheckoutButton() {
        const checkoutButton = document.getElementById('checkoutBtn');
    
        // Kiểm tra xem cart có sản phẩm hay không
        if (cart.length === 0) {
            // Nếu giỏ hàng trống, vô hiệu hóa nút "Thanh toán"
            checkoutButton.style.pointerEvents = 'none';
            checkoutButton.style.opacity = '0.5';
        } else {
            // Nếu giỏ hàng có sản phẩm, kích hoạt nút "Thanh toán"
            checkoutButton.style.pointerEvents = 'auto';
            checkoutButton.style.opacity = '1';
        }
    }
    
    
    const itemsPerPage = 10;
    const productItems = document.querySelectorAll(".product-item");
    let currentPage = 1;
    let totalPages = Math.ceil(productItems.length / itemsPerPage);

    function showPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        productItems.forEach(item => item.style.display = 'none');
        filteredItems.slice(start, end).forEach(item => item.style.display = 'block');

        updatePageNumbers();
    }

    function updatePageNumbers() {
        const pageNumbers = document.querySelector(".page-numbers");
        pageNumbers.innerHTML = `Page ${currentPage} of ${totalPages}`;
    }

    window.changePage = function(delta) {
        currentPage += delta;
        if (currentPage < 1) currentPage = 1;
        if (currentPage > totalPages) currentPage = totalPages;
        showPage(currentPage);
    };

    // Khởi tạo trang hiển thị
    filteredItems = [...productItems];
    showPage(currentPage);

    
});

