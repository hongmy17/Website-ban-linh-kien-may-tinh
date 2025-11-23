<body>
    <div class="page-wrapper">
        <?php include './components/header.php'; ?>
        <main>
            <?php
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'home':
                        include './Views/home.php';
                        break;
                    case 'products':
                        include './Views/Products/product.php';
                        break;
                    case 'productDetail':
                        include './Views/Products/product-detail.php';
                        break;
                    case 'contact':
                        include './Views/contact.php';
                        break;
                    case 'cart':
                        include './Views/cart.php';
                        break;
                    case 'bestseller':
                        include './Views/bestseller.php';
                        break;
                    case 'cheackout':
                        include './Views/cheackout.php';
                        break;
                    case '404':
                        include './Views/404-page.php';
                        break;
                }
            } else {
                include './Views/home.php';
            }
            ?>
        </main>

        <?php include './components/footer.php'; ?>
    </div><!-- End .page-wrapper -->
    <!-- <?php include './components/mobile_menu.php'; ?> -->
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wNumb.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-4.js"></script>
</body>