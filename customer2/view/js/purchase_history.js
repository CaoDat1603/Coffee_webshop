const products = [
    { id: 1, name: 'Caffee Đen Đá', price: '20.000', img: 'img/cfden.png', category: 'caffee' },
    { id: 2, name: 'Caffee Socola-Trắng', price: '25.000', img: 'img/cf-whiteSocola.png', category: 'caffee' },
    { id: 3, name: 'Cappuccino', price: '30.000', img: 'img/Cappuccino.png', category: 'caffee' },
    { id: 4, name: 'Cold Brew Cam Úc', price: '50.000', img: 'img/Cold Brew Cam Úc.png', category: 'caffee' },
    { id: 5, name: 'Cold Brew Hạnh Nhân', price: '50.000', img: 'img/Cold Brew Sữa Hạnh Nhân.png', category: 'caffee' },
    { id: 6, name: 'Cold Brew Dâu Tây', price: '70.000', img: 'img/Cold Brew Dâu Tây.png', category: 'caffee' },
    { id: 7, name: 'Cold Brew Macchiato', price: '70.000', img: 'img/Cold Brew Macchiato.png', category: 'caffee' },
    { id: 8, name: 'Coffee Jelly', price: '50.000', img: 'img/Coffee Jelly.png', category: 'caffee' },
    { id: 9, name: 'Dalgona Coffee', price: '65.000', img: 'img/Dalgona Coffee.png', category: 'caffee' },
    { id: 10, name: 'Boozy Whipped Coffee', price: '65.000', img: 'img/Boozy Whipped Coffee.png', category: 'caffee' },
    { id: 11, name: 'Matcha Espresso', price: '70.000', img: 'img/Matcha Espresso.png', category: 'tra' },
    { id: 12, name: 'Trà Đá Mận (Maesil)', price: '70.000', img: 'img/Trà Đá Mận (Maesil).png', category: 'tra' },
    { id: 13, name: 'Trà Hoa Oải Hương', price: '50.000', img: 'img/Trà Hoa Oải Hương.png', category: 'tra' },
    { id: 14, name: 'Trà Chanh Giây', price: '30.000', img: 'img/Trà Chanh Giây.png', category: 'tra' },
    { id: 15, name: 'Trà Earl Grey', price: '45.000', img: 'img/Trà Earl Grey.png', category: 'tra' },
    { id: 16, name: 'Chocolate Mousse', price: '75.000', img: 'img/Chocolate Mousse.png', category: 'banh' },
    { id: 17, name: 'Croissant Kem Dâu', price: '80.000', img: 'img/Croissant Kem Dâu.png', category: 'banh' },
    { id: 18, name: 'Matcha Tiramisu', price: '50.000', img: 'img/Matcha Tiramisu.png', category: 'banh' },
    { id: 19, name: 'Rose Panna Cotta', price: '50.000', img: 'img/Rose Panna Cotta.png', category: 'banh' },
    { id: 20, name: 'Vanilla Dream Crepes', price: '85.000', img: 'img/Vanilla Dream Crepes.png', category: 'banh' }
];

const orders = [
    {
        id: 1,
        products: [
            { id: 1, quantity: 2 },  // Caffee Đen Đá
            { id: 3, quantity: 1 },  // Cappuccino
            { id: 16, quantity: 1 }  // Chocolate Mousse
        ],
        customerName: 'John Doe',
        customerPhone: '1234567890',
        deliveryMethod: 'standard',
        paymentMethod: 'credit-card',
        promoCode: 'WELCOME10',
        orderDate: '2024-08-01',
        totalMoney: '140.000',
        status: 'Pending',
        customerAccountName: 'customer1'
    },
    {
        id: 2,
        products: [
            { id: 5, quantity: 2 },  // Cold Brew Dâu Tây
            { id: 12, quantity: 1 }, // Trà Đá Mận (Maesil)
            { id: 18, quantity: 1 }  // Matcha Tiramisu
        ],
        customerName: 'Jane Doe',
        customerPhone: '0987654321',
        deliveryMethod: 'express',
        paymentMethod: 'paypal',
        promoCode: '',
        orderDate: '2024-08-02',
        totalMoney: '220.000',
        status: 'Shipped',
        customerAccountName: 'customer1'
    },
    {
        id: 3,
        products: [
            { id: 7, quantity: 1 },  // Cold Brew Macchiato
            { id: 9, quantity: 2 },  // Dalgona Coffee
            { id: 20, quantity: 2 }  // Vanilla Dream Crepes
        ],
        customerName: 'Michael Smith',
        customerPhone: '1122334455',
        deliveryMethod: 'standard',
        paymentMethod: 'credit-card',
        promoCode: 'SUMMER20',
        orderDate: '2024-08-03',
        totalMoney: '340.000',
        status: 'Delivered',
        customerAccountName: 'customer1'
    },
    {
        id: 4,
        products: [
            { id: 11, quantity: 2 }, // Matcha Espresso
            { id: 14, quantity: 3 }  // Trà Chanh Giây
        ],
        customerName: 'Emily Johnson',
        customerPhone: '5566778899',
        deliveryMethod: 'standard',
        paymentMethod: 'credit-card',
        promoCode: '',
        orderDate: '2024-08-04',
        totalMoney: '245.000',
        status: 'Pending',
        customerAccountName: 'customer1'
    },
    {
        id: 5,
        products: [
            { id: 2, quantity: 3 },  // Caffee Socola-Trắng
            { id: 16, quantity: 2 }  // Chocolate Mousse
        ],
        customerName: 'Sarah Brown',
        customerPhone: '6677889900',
        deliveryMethod: 'express',
        paymentMethod: 'paypal',
        promoCode: 'AUTUMN15',
        orderDate: '2024-08-05',
        totalMoney: '265.000',
        status: 'Cancelled',
        customerAccountName: 'customer1'
    },
    {
        id: 6,
        products: [
            { id: 4, quantity: 1 },  // Cold Brew Cam Úc
            { id: 13, quantity: 2 }, // Trà Hoa Oải Hương
            { id: 19, quantity: 1 }  // Rose Panna Cotta
        ],
        customerName: 'Daniel Lee',
        customerPhone: '3344556677',
        deliveryMethod: 'express',
        paymentMethod: 'credit-card',
        promoCode: '',
        orderDate: '2024-08-06',
        totalMoney: '245.000',
        status: 'Shipped',
        customerAccountName: 'customer1'
    },
    {
        id: 7,
        products: [
            { id: 6, quantity: 3 },  // Cold Brew Hạnh Nhân
            { id: 15, quantity: 2 }  // Trà Earl Grey
        ],
        customerName: 'Laura Wilson',
        customerPhone: '7788990011',
        deliveryMethod: 'standard',
        paymentMethod: 'paypal',
        promoCode: '',
        orderDate: '2024-08-07',
        totalMoney: '290.000',
        status: 'Delivered',
        customerAccountName: 'customer1'
    },
    {
        id: 8,
        products: [
            { id: 10, quantity: 1 }, // Boozy Whipped Coffee
            { id: 17, quantity: 1 }, // Croissant Kem Dâu
            { id: 20, quantity: 1 }  // Vanilla Dream Crepes
        ],
        customerName: 'Olivia Martinez',
        customerPhone: '8899001122',
        deliveryMethod: 'standard',
        paymentMethod: 'credit-card',
        promoCode: '',
        orderDate: '2024-08-08',
        totalMoney: '220.000',
        status: 'Pending',
        customerAccountName: 'customer1'
    },
    {
        id: 9,
        products: [
            { id: 8, quantity: 1 },  // Coffee Jelly
            { id: 12, quantity: 1 }, // Trà Đá Mận (Maesil)
            { id: 15, quantity: 1 }  // Trà Earl Grey
        ],
        customerName: 'James Taylor',
        customerPhone: '9900112233',
        deliveryMethod: 'express',
        paymentMethod: 'paypal',
        promoCode: 'WINTER25',
        orderDate: '2024-08-09',
        totalMoney: '155.000',
        status: 'Shipped',
        customerAccountName: 'customer1'
    },
    {
        id: 10,
        products: [
            { id: 3, quantity: 2 },  // Cappuccino
            { id: 4, quantity: 1 },  // Cold Brew Cam Úc
            { id: 18, quantity: 1 }  // Matcha Tiramisu
        ],
        customerName: 'Sophia Anderson',
        customerPhone: '2233445566',
        deliveryMethod: 'standard',
        paymentMethod: 'credit-card',
        promoCode: 'SPRING10',
        orderDate: '2024-08-10',
        totalMoney: '180.000',
        status: 'Delivered',
        customerAccountName: 'customer1'
    }
];

// Utility function to get a product by ID
function getProductById(id) {
    return products.find(p => p.id === id);
}

// Utility function to get an order by ID
function getOrderById(id) {
    return orders.find(o => o.id === id);
}

// Group orders by status
function groupOrdersByStatus(orders) {
    return orders.reduce((acc, order) => {
        if (!acc[order.status]) {
            acc[order.status] = [];
        }
        acc[order.status].push(order);
        return acc;
    }, {});
}

// Render orders grouped by status
function renderOrders() {
    const orderList = document.getElementById('order-list');
    if (orderList) {
        orderList.innerHTML = '';

        const groupedOrders = groupOrdersByStatus(orders);

        for (const [status, ordersGroup] of Object.entries(groupedOrders)) {
            const statusSection = document.createElement('div');
            const statusHeader = document.createElement('h2');
            if (status == 'Pending') {
                statusHeader.textContent = `Status: Chờ xử lý (${status})`;
            } else if (status == 'Shipped') {
                statusHeader.textContent = `Status: Đang giao (${status})`;
            } else if (status == 'Delivered') {
                statusHeader.textContent = `Status: Đã giao (${status})`;
            } else {
                statusHeader.textContent = `Status: Bị hủy (${status})`;
            }
            statusSection.appendChild(statusHeader);

            const table = document.createElement('table');
            table.innerHTML = `
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Total Money</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order-list-${status}">
                </tbody>
            `;
            statusSection.appendChild(table);
            orderList.appendChild(statusSection);

            const orderListByStatus = document.getElementById(`order-list-${status}`);
            ordersGroup.forEach(order => {
                const productDetails = order.products.map(productItem => {
                    const product = getProductById(productItem.id);
                    return `
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <img src="../view/${product.img}" style="max-width: 35px; margin-right: 5px;" alt="${product.name}">
                    <span>${product.name} (x${productItem.quantity})</span>
                    </div>
                `;
            }).join('');

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td data-label="Order ID">${order.id}</td>
                    <td data-label="Products">${productDetails}</td>
                    <td data-label="Customer Name">${order.customerName}</td>
                    <td data-label="Order Date">${order.orderDate}</td>
                    <td data-label="Total Money">${order.totalMoney}đ</td>
                    <td data-label="Status">${order.status}</td>
                    <td data-label="Actions">
                        <a href="index.php?act=purchase_history_detail&id=${order.id}">
                            <button>View Details</button>
                        </a>
                    </td>
                `;
                orderListByStatus.appendChild(row);
            });
        }
    }
}


// Load event listener
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('order-list')) {
        renderOrders();
    }
});