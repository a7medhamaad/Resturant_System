<?php require "../includes/header.php";?>
<?php require "../libs/App.php";?>
<?php require "../config/config.php";?>
<?php
        if(!isset($_SERVER['HTTP_REFERER'])){
            // redirect them to your desired location
            echo "<script>window.location.href='".APPURL."'</script>";
            exit;
        }
?>
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Pay With PayPal</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pay</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


    <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AYR0C3-uxO9oCZ8j8AbNE0v3mfFhJQshAKIdGSrPivm-YQKLuvxGes9mqFqk_JmTaxthVmFt2ZdMdxME&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '<?php echo $_SESSION['total_price']; ?>' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='delete-cart.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
               
        </div>
<?php require "../includes/footer.php"; ?>