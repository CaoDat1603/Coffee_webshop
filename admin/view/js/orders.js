// // Utility function to get a product by ID
// function getProductById(id) {
//     return products.find(p => p.id === id);
// }

// // Utility function to get an order by ID
// function getOrderById(id) {
//     return orders.find(o => o.id === id);
// }

// // Group orders by status
// function groupOrdersByStatus(orders) {
//     return orders.reduce((acc, order) => {
//         if (!acc[order.status]) {
//             acc[order.status] = [];
//         }
//         acc[order.status].push(order);
//         return acc;
//     }, {});
// }

// // Render orders grouped by status
// function renderOrders() {
//     const orderList = document.getElementById('order-list');
//     if (orderList) {
//         orderList.innerHTML = '';
        
//         const groupedOrders = groupOrdersByStatus(orders);

//         for (const [status, ordersGroup] of Object.entries(groupedOrders)) {
//             const statusSection = document.createElement('div');
//             const statusHeader = document.createElement('h2');
//             if (status == 'Pending') {
//                 statusHeader.textContent = `Status: Chờ xử lý (${status})`;
//             } else if (status == 'Shipped') {
//                 statusHeader.textContent = `Status: Đang giao (${status})`;
//             } else if (status == 'Delivered') {
//                 statusHeader.textContent = `Status: Đã giao (${status})`;
//             } else {
//                 statusHeader.textContent = `Status: Bị hủy (${status})`;
//             }
//             statusSection.appendChild(statusHeader);

//             const table = document.createElement('table');
//             table.innerHTML = `
//                 <thead>
//                     <tr>
//                         <th>Order ID</th>
//                         <th>Products</th>
//                         <th>Customer Name</th>
//                         <th>Order Date</th>
//                         <th>Total Money</th>
//                         <th>Status</th>
//                         <th>Actions</th>
//                     </tr>
//                 </thead>
//                 <tbody id="order-list-${status}">
//                 </tbody>
//             `;
//             statusSection.appendChild(table);
//             orderList.appendChild(statusSection);

//             const orderListByStatus = document.getElementById(`order-list-${status}`);
//             ordersGroup.forEach(order => {
//                 const productDetails = order.products.map(productItem => {
//                     const product = getProductById(productItem.id);
//                     return `
//                     <div style="display: flex; align-items: center; margin-bottom: 10px;">
//                     <img src="../${product.img}" style="max-width: 35px; margin-right: 5px;" alt="${product.name}">
//                     <span>${product.name} (x${productItem.quantity})</span>
//                     </div>
//                 `;
//             }).join('');

//                 const row = document.createElement('tr');
//                 row.innerHTML = `
//                     <td>${order.id}</td>
//                     <td>${productDetails}</td>
//                     <td>${order.customerName}</td>
//                     <td>${order.orderDate}</td>
//                     <td>${order.totalMoney}đ</td>
//                     <td>${order.status}</td>
//                     <td>
//                         <button onclick="viewOrderDetails(${order.id})">View Details</button>
//                         <button onclick="updateOrderStatus(${order.id})">Update Status</button>
//                     </td>
//                 `;
//                 orderListByStatus.appendChild(row);
//             });
//         }
//     }
// }


// // View order details
// function viewOrderDetails(id) {
//     const order = getOrderById(id);
//     if (order) {
//         document.getElementById('order-id').textContent = order.id;
//         document.getElementById('customer-name').textContent = order.customerName;
        
//         const productDetails = order.products.map(productItem => {
//             const product = getProductById(productItem.id);
//             return `
//                 <div style="display: flex; align-items: center; margin-bottom: 10px;">
//                     <img src="../${product.img}" style="max-width: 35px; margin-right: 5px;" alt="${product.name}">
//                     <span>${product.name} (x${productItem.quantity})</span>
//                 </div>
//             `;
//         }).join('');

//         document.getElementById('order-products').innerHTML = productDetails;
//         document.getElementById('order-total').textContent = `${order.totalMoney}đ`;
//         document.getElementById('delivery-method').textContent = order.deliveryMethod;
//         document.getElementById('payment-method').textContent = order.paymentMethod;
//         document.getElementById('phone-name').textContent = order.customerPhone;
//         document.getElementById('promo-code').textContent = order.promoCode || 'N/A';
//         document.getElementById('order-status').textContent = order.status;

//         // Show the order details div with display: flex
//         const orderDetailsDiv = document.getElementById('order-details');
//         orderDetailsDiv.style.display = 'flex';
//     }
// }

// // Close the order details view
// document.getElementById('close-order-details').addEventListener('click', function() {
//     document.getElementById('order-details').style.display = 'none';
// });


// // Hiển thị thẻ div cập nhật trạng thái
// function showUpdateStatus(orderId) {
//     const updateStatusDiv = document.getElementById('update-status');
//     const statusSelect = document.getElementById('status-select');
//     const saveButton = document.getElementById('save-status');
//     const closeButton = document.getElementById('close-status');
//     const order = getOrderById(orderId);
//     statusSelect.value = order.status;
    
//     // Show the update status div
//     updateStatusDiv.style.display = 'flex';
    
//     saveButton.onclick = () => {
//         const newStatus = statusSelect.value;
//         updateOrderStatusInData(orderId, newStatus);
//         updateStatusDiv.style.display = 'none';
//         renderOrders();  // Re-render orders to reflect status change
//     };

//     closeButton.onclick = () => {
//         updateStatusDiv.style.display = 'none';
//     };
// }

// // Cập nhật trạng thái đơn hàng trong dữ liệu
// function updateOrderStatusInData(orderId, newStatus) {
//     const order = orders.find(order => order.id === orderId);
//     if (order) {
//         order.status = newStatus;
//     }
// }

// // Gọi hàm showUpdateStatus khi nhấn nút "Update Status"
// function updateOrderStatus(orderId) {
//     showUpdateStatus(orderId);
// }

// // Thêm một số ví dụ để kiểm tra
// document.addEventListener('DOMContentLoaded', () => {
//     renderOrders();
// });
document.addEventListener('DOMContentLoaded', function() {
    // Lặp qua tất cả các phần tử với lớp "overview-item"
    document.querySelectorAll('.overview-item').forEach(item => {
        item.addEventListener('click', function() {
            // Lấy giá trị trạng thái từ thuộc tính data-status
            const status = this.getAttribute('data-status');
            // Tạo URL với tham số lọc
            const url = new URL(window.location.href);
            url.searchParams.set('status', status);
            // Chuyển hướng đến URL mới với tham số lọc
            window.location.href = url;
        });
    });
});

