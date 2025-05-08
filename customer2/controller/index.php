<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['mySession']);
?>

<?php include "../view/header.php"; ?>
    <?php
    if(isset($_GET['act'])){
        switch ($_GET['act']){
            case 'product':
                include "../view/product.php";
                break;
            case 'sale':
                include "../view/sale.php";
                break;
            case 'sign_up':
                header('location: ../view/sign_up.php');
                break;
            case 'sign_in':
                header('location: ../view/sign_in.php');
                break;
            case 'notification':
                include "../view/notification-detail.php";
                break;
            case 'checkout':
                include "../view/checkout.php";
                break;
            case 'purchase_history':
                include "../view/purchase_history.php";
                break;
            case 'purchase_history_detail':
                include "../view/purchase_history-detail.php";
                break;  
            case 'product-detail':
                include "../view/product-detail.php";
                break;  
            case 'edit_account':
                include "../view/edit_account.php";
                break; 
            case 'change_password':
                include "../view/change_password.php";
                break;  
            case 'view_order_detail':
                include "../view/view_order_detail.php";
                break;  
            case 'sale_detail':
                include "../view/sale-detail.php";
                break;  
            default:
                include "../view/home.php";
                break;
        }
    }
    else{
        include "../view/home.php";
    }
        
    ?>
    <?php include "../view/footer.php"; ?>
    <script type="text/javascript" src="../view/js/script.js"></script>
</body>
</html>
<script>
        document.getElementById('user').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

            // Kiểm tra trạng thái đăng nhập
            var isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

            if (!isLoggedIn) {
                var sub2Menu = document.getElementById('sub2-menu');
                sub2Menu.classList.toggle('activesup');
            } else {
                var sub3Menu = document.getElementById('sub3-menu');
                sub3Menu.classList.toggle('activesup');
            }
        });

        document.getElementById('cartIcon').addEventListener('click', function(event) {
            event.preventDefault();
            var subCart = document.getElementById('cart-items-sup');
            subCart.style.display = (subCart.style.display === 'block') ? 'none' : 'block';
        });

        document.getElementById('noice').addEventListener('click', function(event) {
            event.preventDefault();
            var subEv = document.getElementById('envelope-items');
            subEv.style.display = (subEv.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            var evIcon = document.getElementById('noice');
            var subEv = document.getElementById('envelope-items');
    
            if (!evIcon.contains(event.target)) {
                subCart.style.display = 'none';
            }
        });
</script>
