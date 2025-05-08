
    <?php include "../view/header.php"; 

    if(isset($_GET['act'])){
        switch ($_GET['act']){
            case 'manage-products':
                include "../view/manage-products.php";
                break;
            case 'manage-orders':
                include "../view/manage-orders.php";
                break;
            case 'manage-accounts':
                include "../view/manage-accounts.php";
                break;
            case 'manage-sales':
                include "../view/manage-sales.php";
                break;
            case 'manage-notification':
                include "../view/manage-notification.php";
                break;
            case 'edit_product':
                include "../view/edit_product.php";
                break;
            case 'view_order_detail':
                include "../view/view_order_detail.php";
                break;
            case 'update_order':
                include "../view/update_order.php";
                break;
            case 'edit_account':
                include "../view/edit_account.php";
                break;
            case 'change_password':
                include "../view/change_password.php";
                break;
            default:
                include "../view/index.php";
                break;
        }
    }
    else{
        include "../view/index.php";
    }
        
    include "../view/footer.php";
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Lấy URL hiện tại
            const urlParams = new URLSearchParams(window.location.search);
            const action = urlParams.get('act');

            // Ẩn tất cả các Title
            document.getElementById('Title-admin-d').style.display = 'none';
            document.getElementById('Title-admin-p').style.display = 'none';
            document.getElementById('Title-admin-od').style.display = 'none';
            document.getElementById('Title-admin-ac').style.display = 'none';
            document.getElementById('Title-admin-s').style.display = 'none';
            document.getElementById('Title-admin-n').style.display = 'none';

            // Ẩn tất cả các liên kết trên navbar
            document.getElementById('nav-admin-d').style.display = 'flex';
            document.getElementById('nav-admin-p').style.display = 'flex';
            document.getElementById('nav-admin-od').style.display = 'flex';
            document.getElementById('nav-admin-ac').style.display = 'flex';
            document.getElementById('nav-admin-s').style.display = 'flex';
            document.getElementById('nav-admin-n').style.display = 'flex';

            // Hiển thị Title và Nav tương ứng
            if (!action) {
                document.getElementById('Title-admin-d').style.display = 'block';
                document.getElementById('nav-admin-d').style.display = 'none';
            } else if (action === 'manage-products' || action === 'edit_product') {
                document.getElementById('Title-admin-p').style.display = 'block';
                document.getElementById('nav-admin-p').style.display = 'none';
            } else if (action === 'manage-orders') {
                document.getElementById('Title-admin-od').style.display = 'block';
                document.getElementById('nav-admin-od').style.display = 'none';
            } else if (action === 'manage-accounts') {
                document.getElementById('Title-admin-ac').style.display = 'block';
                document.getElementById('nav-admin-ac').style.display = 'none';
            } else if (action === 'manage-sales') {
                document.getElementById('Title-admin-s').style.display = 'block';
                document.getElementById('nav-admin-s').style.display = 'none';
            } else if (action === 'manage-notification') {
                document.getElementById('Title-admin-n').style.display = 'block';
                document.getElementById('nav-admin-n').style.display = 'none';
            }
        });

        document.getElementById('user').addEventListener('click', function(event) {
            event.preventDefault();
            var subMenu = document.getElementById('subMenu');
            subMenu.style.display = (subMenu.style.display === 'block') ? 'none' : 'block';
        });

        document.getElementById('subMenu').addEventListener('click', function(event) {
            event.stopPropagation();
        });

        document.addEventListener('click', function(event) {
            var userElement = document.getElementById('user');
            var subMenu = document.getElementById('subMenu');
    
            if (!userElement.contains(event.target) && !subMenu.contains(event.target)) {
                subMenu.style.display = 'none';
            }
        });

        document.querySelectorAll('#editaccount').forEach(link => {
            link.addEventListener('click', function(event) {
                sessionStorage.setItem('returnPage', window.location.href);
            });
        });
    </script>
