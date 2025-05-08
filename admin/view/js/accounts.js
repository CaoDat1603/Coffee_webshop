// Utility function to get an account by name
// function getAccountByName(name) {
//     return accounts.find(account => account.name === name);
// }
document.getElementById("br").addEventListener("click", function(event) {
    event.preventDefault();
})

// Show the Add Account form
function showAddAccountForm() {
    document.getElementById('addAccountFr').style.display = 'flex';
}

// Hide the Add Account form
function hideAddAccountForm() {
    document.getElementById('addAccountFr').style.display = 'none';
    // Reset form fields
    document.querySelectorAll('#addAccountForm input').forEach(input => input.value = '');
}

function hideAccountYes() {
    document.getElementById('backround-form-buttons').style.display = 'none';
}

function hideAccountYes() {
    document.getElementById('backround-form-buttons').style.display = 'none';
}

// Hàm hiển thị form xác nhận sau khi kiểm tra dữ liệu
function showAccountYes() {
    let isValid = true;

    // Lấy các giá trị từ các trường nhập liệu
    const accountName = document.getElementById('account-name').value;
    const accountPhone = document.getElementById('account-phone').value;
    const accountPassword = document.getElementById('account-password').value;
    const accountRole = document.getElementById('accountRole').value;

    // Kiểm tra Tên tài khoản
    if (!accountName) {
        document.getElementById('name-error').innerText = "Vui lòng nhập tên tài khoản.";
        document.getElementById('name-error').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('name-error').style.display = 'none';
    }

    // Kiểm tra Số điện thoại
    if (!accountPhone || !validatePhone(accountPhone)) {
        document.getElementById('phone-error').innerText = "Vui lòng nhập số điện thoại hợp lệ.";
        document.getElementById('phone-error').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('phone-error').style.display = 'none';
    }

    // Kiểm tra Mật khẩu
    if (!accountPassword || !validatePassword(accountPassword)) {
        document.getElementById('password-error').innerText = "Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái viết hoa, chữ cái viết thường và số.";
        document.getElementById('password-error').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('password-error').style.display = 'none';
    }

    // Kiểm tra Vai trò
    if (!accountRole) {
        document.getElementById('accountRole-error').innerText = "Vui lòng chọn vai trò.";
        document.getElementById('accountRole-error').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('accountRole-error').style.display = 'none';
    }

    // Nếu tất cả các trường đều hợp lệ thì hiển thị form xác nhận
    if (isValid) {
        document.getElementById('backround-form-buttons').style.display = 'flex';
    }
}

// Hàm kiểm tra số điện thoại
function validatePhone(phone) {
    const phoneRegex = /^\d{10}$/; // Kiểm tra xem tất cả các ký tự có phải là chữ số không
    return phoneRegex.test(phone);
}

// Hàm kiểm tra mật khẩu
function validatePassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/; // Kiểm tra điều kiện mật khẩu
    return passwordRegex.test(password);
}

// Ẩn thông báo lỗi khi người dùng bắt đầu nhập liệu lại
document.getElementById('account-name').addEventListener('input', function() {
    document.getElementById('name-error').style.display = 'none';
});
document.getElementById('account-phone').addEventListener('input', function() {
    document.getElementById('phone-error').style.display = 'none';
});
document.getElementById('account-password').addEventListener('input', function() {
    document.getElementById('password-error').style.display = 'none';
});
document.getElementById('accountRole').addEventListener('change', function() {
    document.getElementById('accountRole-error').style.display = 'none';
});

// Ẩn khi hủy
document.getElementById('eixnowbt').addEventListener("click", function() {
    document.getElementById('name-error').style.display = 'none';
    document.getElementById('phone-error').style.display = 'none';
    document.getElementById('password-error').style.display = 'none';
    document.getElementById('accountRole-error').style.display = 'none';
});

// Add a new account
// function addAccount() {
//     const name = document.querySelector('.input-name').value;
//     const phone = document.querySelector('.input-phone').value;
//     const password = document.querySelector('.input-password').value;
//     const role = document.getElementById('accountRole').value;

//     if (name && phone && password && role) {
//         accounts.push({ id: accounts.length + 1, name, phone, password, role });
//         renderAccounts();
//         hideAddAccountForm();
//     } else {
//         alert('Invalid input. Please try again.');
//     }
// }

// // Show the Edit Account form with pre-filled data
// function showEditAccountForm(name) {
//     const account = getAccountByName(name);
//     if (account) {
//         document.querySelector('.edit-input-name').value = account.name;
//         document.querySelector('.edit-input-phone').value = account.phone;
//         document.querySelector('.edit-input-password').value = '...........';
//         document.getElementById('editAccountRole').value = account.role;

//         document.getElementById('editAccountForm').style.display = 'flex';
//         document.getElementById('saveAccountButton').onclick = () => saveAccount(account.id);
//     }
// }

// // Save changes to the edited account
// function saveAccount(id) {
//     const account = accounts.find(account => account.id === id);
//     if (account) {
//         const newName = document.querySelector('.edit-input-name').value;
//         const phone = document.querySelector('.edit-input-phone').value;
//         const password = document.querySelector('.edit-input-password').value;
//         const role = document.getElementById('editAccountRole').value;

//         if (newName && phone && password && role) {
//             account.name = newName;
//             account.phone = phone;
//             account.password = password;
//             account.role = role;
//             renderAccounts();
//             hideEditAccountForm();
//         } else {
//             alert('Invalid input. Please try again.');
//         }
//     }
// }

// // Hide the Edit Account form
// function hideEditAccountForm() {
//     document.getElementById('editAccountForm').style.display = 'none';
//     // Reset form fields
//     document.querySelectorAll('#editAccountForm input').forEach(input => input.value = '');
// }

// Show confirmation modal for deletion
// function showConfirmationModal(id) {
//     document.getElementById('confirmationModal').style.display = 'flex';
//     document.getElementById('confirmDelete').onclick = () => confirmDelete(id);
//     document.getElementById('cancelDelete').onclick = cancelDelete;
// }

// Confirm delete
// function confirmDelete(id) {
//     deleteAccount(id);
//     document.getElementById('confirmationModal').style.display = 'none';
// }

// // Cancel delete
// function cancelDelete() {
//     document.getElementById('confirmationModal').style.display = 'none';
// }

// Delete an account
// function deleteAccount(id) {
//     accounts = accounts.filter(account => account.id !== id);
//     renderAccounts();
// }

// Show the detail account modal with pre-filled data
// function showDetailAccountModal(id) {
//     const account = accounts.find(account => account.id === id);
//     if (account) {
//         document.getElementById('detailAccountModal').innerHTML = `
//             <div class="modal-content">
//                 <h2>Chi tiết Tài Khoản</h2>
//                 <p><strong>Tên:</strong> ${account.name}</p>
//                 <p><strong>Số điện thoại:</strong> ${account.phone}</p>
//                 <p><strong>Mật khẩu:</strong> ...........</p>
//                 <p><strong>Vai trò:</strong> ${account.role}</p>
//                 <button aria-label="Close Details Modal" onclick="hideDetailAccountModal()">Đóng</button>
//             </div>
//         `;
//         document.getElementById('detailAccountModal').style.display = 'flex';
//     }
// }

// Hide the detail account modal
// function hideDetailAccountModal() {
//     document.getElementById('detailAccountModal').style.display = 'none';
// }

// // Utility function to truncate names for display
// function truncateName(name, length = 10) {
//     return name.length > length ? name.substring(0, length) + '...' : name;
// }

// Function to render accounts as separate lists by role
// function renderAccounts() {
//     const container = document.getElementById('account-list');
//     container.innerHTML = ''; // Clear existing content

//     const adminAccounts = accounts.filter(account => account.role === 'admin');
//     const customerAccounts = accounts.filter(account => account.role === 'customer');

//     // Create sections for Admin and Customer accounts
//     const adminSection = document.createElement('div');
//     const customerSection = document.createElement('div');

//     adminSection.innerHTML = `
//         <h2>Tài Khoản (Admin)</h2>
//         <table>
//             <thead>
//                 <tr>
//                     <th>Tên</th>
//                     <th>Số điện thoại</th>
//                     <th>Vai trò</th>
//                     <th>Actions</th>
//                 </tr>
//             </thead>
//             <tbody>
//                 ${adminAccounts.map(account => `
//                     <tr>
//                         <td>${truncateName(account.name)}</td>
//                         <td>${account.phone}</td>
//                         <td>${account.role}</td>
//                         <td>
//                             <button onclick="showDetailAccountModal(${account.id})">View Details</button>
//                             <button onclick="showEditAccountForm('${account.name}')">Edit</button>
//                             <button onclick="showConfirmationModal(${account.id})">Delete</button>
//                         </td>
//                     </tr>
//                 `).join('')}
//             </tbody>
//         </table>
//     `;

//     customerSection.innerHTML = `
//         <h2>Tài Khoản (Khách hàng)</h2>
//         <table>
//             <thead>
//                 <tr>
//                     <th>Tên</th>
//                     <th>Số điện thoại</th>
//                     <th>Vai trò</th>
//                     <th>Actions</th>
//                 </tr>
//             </thead>
//             <tbody>
//                 ${customerAccounts.map(account => `
//                     <tr>
//                         <td>${truncateName(account.name)}</td>
//                         <td>${account.phone}</td>
//                         <td>${account.role}</td>
//                         <td>
//                             <button onclick="showDetailAccountModal(${account.id})">View Details</button>
//                             <button onclick="showEditAccountForm('${account.name}')">Edit</button>
//                             <button onclick="showConfirmationModal(${account.id})">Delete</button>
//                         </td>
//                     </tr>
//                 `).join('')}
//             </tbody>
//         </table>
//     `;

//     container.appendChild(adminSection);
//     container.appendChild(customerSection);
// }

// Initialize rendering on page load
// document.addEventListener('DOMContentLoaded', () => {
//     renderAccounts();
// });

document.querySelectorAll('.overview-item').forEach(item => {
    item.addEventListener('click', function() {
        // Lấy giá trị loại sản phẩm từ thuộc tính data-category
        const category = this.getAttribute('data-category');
        // Tạo URL với tham số lọc
        const url = new URL(window.location.href);
        url.searchParams.set('category_filter', category);
        // Chuyển hướng đến URL mới với tham số lọc
        window.location.href = url;
    });
});