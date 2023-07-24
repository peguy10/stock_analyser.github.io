<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>STOCK ANALYSER</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<?php
$num = rand(1000, 9999);
$fact = "INV" . $num;
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    include('../inc/connect.php');
    $sql = "SELECT * FROM sales,customer,product_list WHERE sales.product_id=product_list.id AND sales.id_client=customer.id_c AND sales.id_client=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $sql2 = "SELECT * FROM customer WHERE id_c=:id";

    $stmt2 = $pdo->prepare($sql);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
    $customers = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    if ($customers) {
        $customer = $customers[0];
    }
}



?>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <?php include('../components/header2.php') ?>
        <?php include('../components/sidebar2.php') ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Sale Details</h4>
                        <h6>View sale details</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-sales-split">
                            <h2>Sale Detail : <?php echo $customer['name_customer']; ?></h2>
                            <ul>
                                <li>
                                    <a href="javascript:void(0);"><img src="../assets/img/icons/edit.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../assets/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../assets/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
                                <tbody>
                                    <tr class="top">
                                        <td colspan="6" style="padding: 5px;vertical-align: top;">
                                            <table style="width: 100%;line-height: inherit;text-align: left;">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Customer Info</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $customer['name_customer']; ?></font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3a4d5b565117535417594f494e55575f487a5f425b574a565f14595557"><?php echo $customer['email_customer']; ?></a></font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $customer['phone_customer']; ?></font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?php echo $customer['city_customer']; ?> - <?php echo $customer['country_customer']; ?></font>
                                                            </font><br>
                                                        </td>
                                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Company Info</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> STOCK ANALYSER </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ffefbf2f6f1dffae7fef2eff3fab1fcf0f2">stockanalyser@gmail.com</a></font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">678-56-37-71</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Douala - Cameroon</font>
                                                            </font><br>
                                                        </td>
                                                        <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Invoice Info</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Reference </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Payment Status</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Status</font>
                                                            </font><br>
                                                        </td>
                                                        <td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?php echo $fact; ?> </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> Paid</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> Completed</font>
                                                            </font><br>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr class="heading " style="background: #F3F2F7;">
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            Product Name
                                        </td>
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            QTY
                                        </td>
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            Unit Price
                                        </td>
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            Subtotal
                                        </td>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    foreach ($clients as $client) : ?>
                                        <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                                            <td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
                                                <img src="<?php echo $client['product_image']; ?>" alt="img" class="me-2" style="width:40px;height:40px;">
                                                <?php echo $client['product_name']; ?>
                                            </td>
                                            <td style="padding: 10px;vertical-align: top; ">
                                                <?php echo $client['quantity_sale']; ?>
                                            </td>
                                            <td style="padding: 10px;vertical-align: top; ">
                                                <?php echo number_format($client['sale_price'], '0', ',', ' '); ?> FCFA
                                            </td>
                                            <td style="padding: 10px;vertical-align: top; ">
                                                <?php
                                                echo number_format($client['quantity_sale'] * $client['sale_price'], '0', ',', ' ');
                                                $total = $total + ($client['quantity_sale'] * $client['sale_price']);
                                                ?> FCFA
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" name="discount">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Shipping</label>
                                    <input type="text" name="discount">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="discount">
                                        <option>Choose Status</option>
                                        <option>Completed</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="total-order w-100 max-widthauto m-auto mb-4">
                                        <ul>

                                            <li>
                                                <h4>Discount </h4>
                                                <h5>0.00</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="total-order w-100 max-widthauto m-auto mb-4">
                                        <ul>
                                            <li>
                                                <h4>Shipping</h4>
                                                <h5>0.00</h5>
                                            </li>
                                            <li class="total">
                                                <h4>Grand Total</h4>
                                                <h5><?php echo number_format($total, '0', '', ' ') ?> FCFA</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Update</a>
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>