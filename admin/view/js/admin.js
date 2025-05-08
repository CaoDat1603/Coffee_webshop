// Mock data with detailed attributes
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

const sales = [
    {
        id: 1,
        title: "GRAND OPENING - COFFEE MONSTER Tp.HỒ CHÍ MINH",
        dateRange: "03.08.2024 - 16.08.2024",
        location: "70 Đ. Tô Ký, P. Tân Chánh Hiệp, Quận 12, Tp. Hồ Chí Minh",
        description: {
            heading: "Coffee MONSTER:",
            content: [
                "Hân hạnh phục vụ những ly cà-phê thơm ngon, đậm vị Việt đến trong một không gian yên tĩnh cùng với góc 'Sống ảo' cho những bức hình cực chill.",
                "Khách hàng ghé thăm cửa hàng mới có cơ hội nhận được những phần quà vô cùng hấp dẫn."
            ]
        },
        detailsImage: "../view/img/grand-opening.jpg",
        detail: {
            content: [
                "Từ ngày 03.08.2024 - 16.08.2024, khi khách hàng ghé thăm cửa hàng và mua hóa đơn từ 200,000₫ sẽ được rút thăm với cơ hội 100% trúng thưởng một trong những phần quà sau:"
            ],
            rewards: [
                "Bình giữ nhiệt",
                "Túi Tote độc đáo",
                "Ly sứ in họa tiết phiên bản giới hạn",
                "Ly giữ nhiệt điêu khắc 100 ngôi sao Monster"
            ]
        },
        notes: [
            "Số lượng quà tặng có hạn, chương trình có thể kết thúc sớm hơn khi hết quà. Khách hàng vui lòng liên hệ đến Fanpage Coffee Monster để được hỗ trợ thêm thông tin về chương trình."
        ],
        status: 'completed' 
    },
    {
        id: 2,
        title: "CHÀO MỪNG BẠN MỚI - ĐẾN VỚI COFFEE MONSTER",
        dateRange: "03.08.2024",
        location: "70 Đ. Tô Ký, P. Tân Chánh Hiệp, Quận 12, Tp. Hồ Chí Minh",
        description: {
            heading: "Coffee MONSTER:",
            content: [
                "Hân hạnh phục vụ những ly cà-phê thơm ngon, đậm vị Việt đến trong một không gian yên tĩnh và cực chill.",
                "Khách hàng ghé thăm cửa hàng hoặc đến với Webshop của Coffee Monster lần đầu sẽ được nhận những ưu đãi cực kỳ hấp dẫn."
            ]
        },
        detailsImage: "../view/img/ban-moi.jpg",
        detail: {
            content: [
                "Từ ngày 03.08.2024, khi khách hàng ghé thăm cửa hàng và mua lần đầu thì sẽ có cơ hội trúng giải thưởng vô cùng hấp dẫn.",
                "Chắc chắn 100% sẽ được nhận mã giảm giá khi đến với Website hoặc cửa hàng của chúng tôi."
            ],
            rewards: [
                "Ly giữ nhiệt Cao Cấp phiên bản giới hạn.",
                "Mã giảm giá: 'WELCOME' giảm 15% tối đa 15,000₫ cho đơn từ 30,000₫"
            ]
        },
        notes: [
            "Số lượng quà tặng có hạn, chương trình có thể kết thúc sớm hơn khi hết quà. Khách hàng vui lòng liên hệ đến Fanpage Coffee Monster để được hỗ trợ thêm thông tin về chương trình."
        ],
        status: 'completed'
    },
    {
        id: 3,
        title: "VÒNG QUAY MAY MẮN - NHẬN PHẦN QUÀ BẤT NGỜ",
        dateRange: "10.08.2024 - 16.08.2024",
        location: "70 Đ. Tô Ký, P. Tân Chánh Hiệp, Quận 12, Tp. Hồ Chí Minh",
        description: {
            heading: "Coffee MONSTER:",
            content: [
                "Hân hạnh phục vụ những ly cà-phê thơm ngon, đậm vị Việt cùng với Vòng Quay bất ngờ cực kỳ thú vị.",
                "Khách hàng ghé thăm cửa hàng mới có thể tham gia sự kiện này."
            ]
        },
        detailsImage: "../view/img/Vong-quay.jpg",
        detail: {
            content: [
                "Từ ngày 10.08.2024 - 16.08.2024, khi khách hàng ghé thăm cửa hàng và mua bất kì sản phẩm gì thì sẽ có 100% cơ hội nhận quà bất ngờ từ Vòng Quay may mắn, với các giải thưởng sau:"
            ],
            rewards: [
                "Ly giữ nhiệt Cao Cấp phiên bản giới hạn.",
                "Bình giữ nhiệt phiên bản giới hạn.",
                "Mã giảm giá: Giảm 20% tối đa 30,000₫ cho đơn từ 200,000₫.",
                "Chọn một sản phẩm bất kỳ trong Menu của cửa hàng."
            ]
        },
        notes: [
            "Số lượng quà tặng có hạn, chương trình có thể kết thúc sớm hơn khi hết quà. Khách hàng vui lòng liên hệ đến Fanpage Coffee Monster để được hỗ trợ thêm thông tin về chương trình."
        ],
        status: 'ongoing'
    },
    {
        id: 4,
        title: "MINI_GAME - CHỤP ẢNH MONSTER RINH QUÀ",
        dateRange: "16.08.2024 - 19.08.2024",
        location: "70 Đ. Tô Ký, P. Tân Chánh Hiệp, Quận 12, Tp. Hồ Chí Minh",
        description: {
            heading: "Coffee MONSTER:",
            content: [
                "Hân hạnh phục vụ những ly cà-phê thơm ngon, đậm vị Việt đến trong một không gian yên tĩnh cùng tiếp tục với góc 'Sống ảo' cho những bức hình cực chill.",
                "Khách hàng ghé thăm cửa hàng mới có cơ hội nhận được những phần quà vô cùng hấp dẫn."
            ]
        },
        detailsImage: "../view/img/mini-game.jpg",
        detail: {
            content: [
                "Từ ngày 16.08.2024 - 19.08.2024, khi khách hàng ghé thăm cửa hàng và mua sẽ được tham gia vào sự kiện Mini Game - Chụp ảnh Monster rinh quà.",
                "Để tham gia sự kiện, khách hàng sẽ chụp ảnh về cửa hàng Monster và đăng lên trang cá nhân với '#Check-in_Monster'.",
                "Các phần quà với từng hạng mục như sau:"
            ],
            rewards: [
                "Giải nhất: Nhận một thẻ vàng trị giá 20 triệu đồng.",
                "Giải ba: Nhận một thẻ bạc trị giá 5 triệu đồng.",
                "Giải khuyến khích: Túi Tote độc đáo (20 phần)."
            ]
        },
        notes: [
            "Cửa hàng sẽ công bố kết quả trực tiếp lên Fanpage Coffee Monster và liên lạc với khách hàng trúng giải để thông báo.",
            "Khách hàng vui lòng liên hệ đến Fanpage Coffee Monster để được hỗ trợ thêm thông tin về chương trình."
        ],
        status: 'ongoing'
    }, 
    {
        id: 5,
        title: "BẢO TRÌ HỆ THỐNG WEBSHOP COFFEE MONSTER",
        dateRange: "20.08.2024 - 21.08.2024",
        location: "70 Đ. Tô Ký, P. Tân Chánh Hiệp, Quận 12, Tp. Hồ Chí Minh",
        description: {
            heading: "Coffee MONSTER:",
            content: [
                "Hân hạnh phục vụ những ly cà-phê thơm ngon, đậm vị Việt đến trong một không gian yên tĩnh cực chill.",
                "Xin trân trọng thông báo về việc bảo trì hệ thống Webshop Coffee Monster."
            ]
        },
        detailsImage: "../view/img/bao-tri.jpg",
        detail: {
            content: [
                "Từ ngày 20.08.2024 - 21.08.2024, hệ thống Webshop Coffee Monster sẽ bảo trì để nâng cấp và hoàn thiện, tạo điều kiện và trải nghiệm tuyệt vời cho khách hàng của cửa hàng.",
                "Quà đền bù bảo trì như sau:"
            ],
            rewards: [
                "Mã giảm giá: 'SUMMER2024' giảm 10% tối đa 100,000₫ cho đơn từ 500,000₫."
            ]
        },
        notes: [
            "Mã chỉ áp dụng trong khoảng thời gian 2 ngày tính từ lúc hệ thống bảo trì xong. Khách hàng vui lòng liên hệ đến Fanpage Coffee Monster để được hỗ trợ thêm thông tin về chương trình."
        ],
        status: 'upcoming'
    }
];

const validCodes = {
    'SUMMER2024': { 
        id: 1,
        discountPercent: 10, 
        maxDiscount: 100000, 
        minOrderAmount: 500000, 
        quantity: 10000,
        status: 'active' // Mã giảm giá đang còn hiệu lực
    },
    'WELCOME': { 
        id: 2,
        discountPercent: 15, 
        maxDiscount: 15000, 
        minOrderAmount: 30000, 
        quantity: null, // Không giới hạn
        status: 'expired' // Mã giảm giá đã hết hạn
    }
};

const notifications = [
    { 
        id: 1, 
        title: 'Chào mừng bạn mới', 
        content: 'Chúng tôi xin chào mừng bạn đến với cửa hàng cà phê của chúng tôi! Hy vọng bạn sẽ có những trải nghiệm tuyệt vời với các sản phẩm và dịch vụ của chúng tôi. Nếu bạn có bất kỳ câu hỏi nào, đừng ngần ngại liên hệ với chúng tôi!', 
        read: false, // thuộc tính tự động gán không cần nhập or chỉnh sửa thêm từ admin
        date: '2024-07-24',
        sender: 'Cửa hàng cà phê', // Đối tượng gửi
        recipient: 'All', // Đối tượng nhận
        sent: true // Status: false = not sent, true = sent
    },
    { 
        id: 2, 
        title: 'Bảo trì hệ thống webshop', 
        content: 'Chúng tôi thông báo rằng hệ thống webshop của chúng tôi sẽ được bảo trì từ ngày 27/07/2024 đến ngày 28/07/2024. Trong thời gian này, trang web có thể không hoạt động ổn định. Chúng tôi xin lỗi vì sự bất tiện này và cảm ơn sự thông cảm của bạn!', 
        read: false, // thuộc tính tự động gán không cần nhập or chỉnh sửa thêm từ admin
        date: '2024-07-25',
        sender: 'Quản trị hệ thống', // Đối tượng gửi
        recipient: 'All', // Đối tượng nhận
        sent: true // Status: false = not sent, true = sent
    },
    { 
        id: 3, 
        title: 'Sản phẩm mới "Boozy Whipped Coffee"', 
        content: 'Chúng tôi rất vui được giới thiệu sản phẩm mới của chúng tôi – "Boozy Whipped Coffee"! Đây là một loại cà phê đặc biệt với hương vị độc đáo, kết hợp giữa cà phê espresso đậm đà và lớp kem whipped nhẹ nhàng, hoàn hảo cho những ai yêu thích sự mới lạ và sáng tạo trong thức uống của mình. Hãy đến thử ngay hôm nay!', 
        read: false, // thuộc tính tự động gán không cần nhập or chỉnh sửa thêm từ admin
        date: '2024-07-26',
        sender: 'Marketing', // Đối tượng gửi
        recipient: 'All', // Đối tượng nhận
        sent: false // Status: false = not sent, true = sent
    }
];

// const accounts = [
//     {
//         name: "admin1",
//         phone: "0901234567",
//         password: "AdminPass1!",
//         role: "admin"
//     },
//     {
//         name: "admin2",
//         phone: "0902345678",
//         password: "AdminPass2!",
//         role: "admin"
//     },
//     {
//         name: "customer1",
//         phone: "0912345678",
//         password: "CustomerPass1!",
//         role: "customer"
//     },
//     {
//         name: "customer2",
//         phone: "0913456789",
//         password: "CustomerPass2!",
//         role: "customer"
//     },
//     {
//         name: "customer3",
//         phone: "0914567890",
//         password: "CustomerPass3!",
//         role: "customer"
//     },
//     {
//         name: "customer4",
//         phone: "0915678901",
//         password: "CustomerPass4!",
//         role: "customer"
//     },
//     {
//         name: "customer5",
//         phone: "0916789012",
//         password: "CustomerPass5!",
//         role: "customer"
//     },
//     {
//         name: "customer6",
//         phone: "0917890123",
//         password: "CustomerPass6!",
//         role: "customer"
//     },
//     {
//         name: "customer7",
//         phone: "0918901234",
//         password: "CustomerPass7!",
//         role: "customer"
//     },
//     {
//         name: "customer8",
//         phone: "0919012345",
//         password: "CustomerPass8!",
//         role: "customer"
//     },
//     {
//         name: "customer9",
//         phone: "0920123456",
//         password: "CustomerPass9!",
//         role: "customer"
//     },
//     {
//         name: "customer10",
//         phone: "0921234567",
//         password: "CustomerPass10!",
//         role: "customer"
//     }
// ];
