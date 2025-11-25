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
                        include './products/index.php';
                        break;
                    case 'productDetail':
                        include './products/detail.php';
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
</body>