// Utility function to get a notification by ID
function getNotificationById(id) {
    return notifications.find(n => n.id === id);
}

// Show the Add Notification form
function showAddNotificationForm() {
    document.getElementById('addNotificationForm').style.display = 'flex';
}

// Hide the Add Notification form
function hideAddNotificationForm() {
    document.getElementById('addNotificationForm').style.display = 'none';
}

// Add a new notification
function addNotification() {
    const id = notifications.length ? notifications[notifications.length - 1].id + 1 : 1;
    const title = document.getElementById('notificationTitle').value;
    const content = document.getElementById('notificationContent').value;
    const date = document.getElementById('notificationDate').value;
    const sender = document.getElementById('notificationSender').value;
    const recipient = document.getElementById('notificationRecipient').value;

    if (title && content && date && sender && recipient) {
        notifications.push({ id, title, content, date, sender, recipient });
        renderNotifications();
        hideAddNotificationForm();
    } else {
        alert('Invalid input. Please try again.');
    }
}

// Show the Edit Notification form with pre-filled data
function showEditNotificationForm(id) {
    const notification = getNotificationById(id);
    if (notification) {
        document.getElementById('editNotificationTitle').value = notification.title;
        document.getElementById('editNotificationContent').value = notification.content;
        document.getElementById('editNotificationDate').value = notification.date;
        document.getElementById('editNotificationSender').value = notification.sender;
        document.getElementById('editNotificationRecipient').value = notification.recipient;

        document.getElementById('editNotificationForm').style.display = 'flex';
        document.getElementById('saveNotificationButton').onclick = () => saveNotification(id);
    }
}

// Save changes to the edited notification
function saveNotification(id) {
    const notification = getNotificationById(id);
    if (notification) {
        const title = document.getElementById('editNotificationTitle').value;
        const content = document.getElementById('editNotificationContent').value;
        const date = document.getElementById('editNotificationDate').value;

        if (title && content && date) {
            notification.title = title;
            notification.content = content;
            notification.date = date;
            renderNotifications();
            hideEditNotificationForm();
        } else {
            alert('Invalid input. Please try again.');
        }
    }
}

// Hide the Edit Notification form
function hideEditNotificationForm() {
    document.getElementById('editNotificationForm').style.display = 'none';
}

// Show confirmation modal for deletion
function showConfirmationModal(id) {
    document.getElementById('confirmationModal').style.display = 'flex';
    document.getElementById('confirmDelete').onclick = () => confirmDelete(id);
    document.getElementById('cancelDelete').onclick = cancelDelete;
}

// Confirm delete
function confirmDelete(id) {
    deleteNotification(id);
    document.getElementById('confirmationModal').style.display = 'none';
}

// Cancel delete
function cancelDelete() {
    document.getElementById('confirmationModal').style.display = 'none';
}

// Utility function to truncate content to 50 characters
function truncateContent(content, length = 50) {
    return content.length > length ? content.substring(0, length) + '...' : content;
}

// Function to render notifications as separate lists by status
function renderNotifications() {
    const container = document.getElementById('notification-list');
    container.innerHTML = ''; // Clear existing content

    const sentNotifications = notifications.filter(notification => notification.sent);
    const notSentNotifications = notifications.filter(notification => !notification.sent);

    // Create sections for Sent and Not Sent notifications
    const sentSection = document.createElement('div');
    const notSentSection = document.createElement('div');

    sentSection.innerHTML = `
        <h2>Thông báo (Đã gửi)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ${sentNotifications.map(notification => `
                    <tr>
                        <td>${notification.id}</td>
                        <td>${notification.title}</td>
                        <td>${truncateContent(notification.content)}</td>
                        <td>${notification.date}</td>
                        <td>
                            <button onclick="showDetailNotificationModal(${notification.id})">View Details</button>
                            <button onclick="showEditNotificationForm(${notification.id})">Edit</button>
                            <button onclick="showConfirmationModal(${notification.id})">Delete</button>
                        </td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;

    notSentSection.innerHTML = `
        <h2>Thông báo (Chưa gửi)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ${notSentNotifications.map(notification => `
                    <tr>
                        <td>${notification.id}</td>
                        <td>${notification.title}</td>
                        <td>${truncateContent(notification.content)}</td>
                        <td>${notification.date}</td>
                        <td>
                            <button onclick="showDetailNotificationModal(${notification.id})">View Details</button>
                            <button onclick="showEditNotificationForm(${notification.id})">Edit</button>
                            <button onclick="showConfirmationModal(${notification.id})">Delete</button>
                        </td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;

    container.appendChild(sentSection);
    container.appendChild(notSentSection);
}

// Show the detail notification modal with pre-filled data
function showDetailNotificationModal(id) {
    const notification = getNotificationById(id);
    if (notification) {
        document.getElementById('detailNotificationTitle').textContent = notification.title;
        document.getElementById('detailNotificationContent').textContent = notification.content;
        document.getElementById('detailNotificationDate').textContent = notification.date;
        document.getElementById('detailNotificationSender').textContent = notification.sender;
        document.getElementById('detailNotificationRecipient').textContent = notification.recipient;

        document.getElementById('detailNotificationModal').style.display = 'flex';
    }
}

// Hide the detail notification modal
function hideDetailNotificationModal() {
    document.getElementById('detailNotificationModal').style.display = 'none';
}

// Initialize rendering on page load
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('notification-list')) {
        renderNotifications();
    }
});
