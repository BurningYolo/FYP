<?php
session_start();
if (isset($_SESSION['session'])) {
    $id = $_SESSION['session'];
}
include("head.php");

$sql = "select * from product_info where user_id = '$id' ";
$result = (mysqli_query($conn, $sql));
?>

<style>
    body {
        background-color: #B0BEC5;

    }

    .verification_success {

        background-color: green;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;



    }

    .verification_error {

        background-color: red;
        color: white;
        width: 100%;
        height: auto;
        text-align: center;
        position: absolute;



    }
</style>
<?php
if (isset($_GET['verification_done'])) {
?>
    <div class="verification_success" id="verification_success">
        <p>Documents Successfully sent for Verification</p>

    </div>
<?php
    unset($_GET['verification_done']);
}
?>
<?php
if (isset($_GET['verification_error'])) {
?>
    <div class="verification_error" id="verification_error">
        <p>Error Submiting Documents</p>

    </div>


<?php
    unset($_GET['verification_error']);
}
?>
<?php
if (isset($_GET['delete_success'])) {
?>
    <div class="verification_success" id="verification_success">
        <p>Product Unlisted Successfully</p>

    </div>



<?php
    unset($_GET['delete_success']);
}
?>
<?php
if (isset($_GET['delete_error'])) {
?>
    <div class="verification_error" id="verification_error">
        <p>Error Unlisting Product</p>

    </div>


<?php
    unset($_GET['delete_error']);
}
?>
<div class="container mt-5 mb-5 ">
    <div class="d-flex justify-content-center row ">
        <div class="col-md-10">
            <div class="row p-2 justify-content-center bg-white border rounded">
                <h2>ACTIVE LISTINGS</h2>
            </div>

        </div>



    </div>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $product_name = $row['name'];
        $product_address = $row['address'];
        $product_location = $row['location'];
        $product_description = $row['description'];
        $product_starting_price = $row['start_price'];
        $product_goal_price = $row['goal_price'];
        $product_id = $row['id'];


    ?>

        <?php
        $sql1 = "Select * from product_images where product_id = '$product_id' Limit 1";
        $result1 = (mysqli_query($conn, $sql1));
        while ($row1 = mysqli_fetch_array($result1)) {
            $product_image = $row1['image'];
        }
        ?>



        <form action="product_page.php?search_result=<?php echo $product_id ?>" method="POST">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="row p-2 bg-white" style="border: 2px solid black ; border-radius:1% ;  ">
                        <div class="col-md-3 mt-1 border-bottom"><img class="img-fluid img-responsive rounded product-image" style="height: 159px; width:200px" src="<?php echo $product_image ?>"></div>
                        <div class="col-md-6 mt-1 border-bottom">
                            <h5><?php echo $product_name ?></h5>
                            <div class="d-flex flex-row">
                                <span><?php echo $product_description ?></span>
                            </div>
                            <br>
                            <div class="mt-1 mb-1 spec-1"><span><?php echo $product_location ?></span><span class="dot"></span></div>
                            <div class="mt-1 mb-1 spec-1"><span><?php echo $product_address ?></span><span class="dot"></span></div>

                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left border-bottom mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1" style="color: green;"><?php echo $product_starting_price ?>rs</h4>
                            </div>
                            <h6 class="text-success">Bid now </h6>
                            <div class="d-flex flex-column mt-4"><button class="btn btn-success btn-sm" type="submit">Details</button>

                            </div>
                            <div class="d-flex flex-column mt-4"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#verify_product<?php echo $product_id ?>" type="button" style="color:white">Verify Product</button>

                            </div>
                            <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button"><a style="color: white; " href="update_product.php?product=<?php echo $product_id ?>"> Update Info </a></button>

                            </div>
                            <div class="d-flex flex-column mt-4"><button class="btn btn-danger btn-sm" type="submit"><a href="php_backend_stuff/backend.php?func=delete_product&product=<?php echo $product_id ?>" style="color: white; ">Delete Product Listing </a></button>
        </form>

</div>
</div>
<div class="col-md-12">
    <?php
        $i = 0;
        $sql4 = "SELECT * from bidding_info where product_id=$product_id";
        $result4 = (mysqli_query($conn, $sql4));
        while ($row4 = mysqli_fetch_array($result4)) {
            $i++;
            $amount = $row4['bid_amount'];
            $bid_by = $row4['buyer_id'];
            $paypal = $row4['paypal'];
            $credit_card = $row4['credit_card'];
            $bank = $row4['bank'];
            $bid_id = $row4['id'];

            $sql5 = "Select * from user_info where id = '$bid_by'";
            $result5 = (mysqli_query($conn, $sql5));
            while ($row5 = mysqli_fetch_array($result5)) {
                $buyer_name = $row5['name'];
                $buyer_image = $row5['image'];
                $buyer_id = $row5['id'];
                $buyer_email = $row5['email'];
            }

            if ($i == 1) {
    ?>
            <center>
                <h6> Bids placed on this product </h6>
            </center>
            <table id="bid_table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Amount</th>
                        <th>Paypal</th>
                        <th>CreditCard</th>
                        <th>Bank</th>
                        <th>Placed By</th>
                        <th>Choose Winner</th>
                    </tr>
                </thead>

            <?php
            }


            if ($i > 0) {
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $paypal ?></td>
                    <td><?php echo $credit_card ?></td>
                    <td><?php echo $bank ?></td>
                    <input type="hidden" id="buyer_name<?php echo $buyer_id ?>" value="<?php $buyer_name ?>"/>
                    <input type="hidden" id="buyer_email<?php echo $buyer_id ?>" value="<?php $buyer_email ?>"/>
                    <td><a href="something.php?to=<?php echo $buyer_id ?>"><img style="height:40px ; width:40px " src="<?php echo $buyer_image ?>"><?php echo $buyer_name ?></a></td>
                    <td><button type="button" onclick="choosewinner(<?php echo $bid_id ?>) " class="btn btn-success btn-sm">Choose this as Winner</button></td>

                </tr>


        <?php


            }
        }
        ?>
            </table>



            <?php
            if ($i == 0) {
            ?>
                <h6>There are no bids placed on this product</h6>
            <?php

            }


            ?>

</div>

</div>
</div>
</div>
</form>


<div id="verify_product<?php echo $product_id ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">PRODUCT INFO</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                <form action="php_backend_stuff/backend.php?func=product_verification" method="POST" enctype="multipart/form-data">
                    <input type="text" value="<?php echo $product_id ?>" hidden name="product_id">

                    <div class="col-md-12"><label class="labels">Description</label><textarea type="text" class="form-control" name="description" id="description" placeholder="Please give information about the documents" required></textarea></div>

                    <div class="col-md-12 p-4">
                        <center><input style="width:90%  ; color: black; cursor: pointer;" id="product_image" class="form-control" name="upload[]" type="file" accept="image/png, image/gif, image/jpeg" multiple required> </center>
                    </div>
                    <center><input class="btn btn-success" type="submit"></center>

                </form>






            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?php

    }
?>
<div class="container mt-5 mb-5 ">
    <div class="d-flex justify-content-center row ">
        <div class="col-md-10">
            <div class="row p-2 justify-content-center bg-white border rounded">
                <h2>ACTIVE BIDS</h2>
            </div>

        </div>



    </div>
    <?php
    $sql = "Select * from bidding_info where buyer_id = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($row1 = mysqli_fetch_array($result)) {
        $product_id = $row1['product_id'];
        $bid_amount = $row1['bid_amount'];

        $sql1 = "SELECT * from product_info where id = '$product_id'";
        $result1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result1)) {
            $product_name = $row['name'];
            $product_address = $row['address'];
            $product_location = $row['location'];
            $product_description = $row['description'];
            $product_starting_price = $row['start_price'];
            $product_goal_price = $row['goal_price'];
            $product_id = $row['id'];
            $winner = $row['winner'];

            $sql9 = "Select * from product_images where product_id = '$product_id' limit 1";
            $result9 = mysqli_query($conn, $sql9);
            while ($row9 = mysqli_fetch_array($result9)) {
                $image = $row9['image'];
            }

            if ($winner != null) {
                $sql3 = "Select * from bidding_info where id = '$winner'";
                $result3 = mysqli_query($conn, $sql3);
                while ($row3 = mysqli_fetch_array($result3)) {
                    $winner = $row3['buyer_id'];
                    $seller_id = $row3['seller_id'];
                }
            }




    ?>
            <form action="product_page.php?search_result=<?php echo $product_id ?>" method="POST">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" style="height: 159px; width:200px" src="<?php echo $image ?>"></div>
                            <div class="col-md-6 mt-1">
                                <h5><?php echo $product_name ?></h5>
                                <div class="d-flex flex-row">
                                    <span><?php echo $product_description ?></span>
                                </div>
                                <br>
                                <div class="mt-1 mb-1 spec-1"><span><?php echo $product_location ?></span><span class="dot"></span></div>
                                <div class="mt-1 mb-1 spec-1"><span><?php echo $product_address ?></span><span class="dot"></span></div>
                                <div class="mt-1 mb-1 spec-1"><a href="something.php?to=<?php echo $seller_id ?>"><span>Chat with seller</span><span class="dot"></span></a></div>

                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1" style="color: green;"><?php echo $bid_amount ?>rs</h4>
                                </div>
                                <h6 class="text-success">Your Bid </h6>
                                <div class="d-flex flex-column mt-4"><button class="btn btn-success btn-sm" type="submit">Details</button>


                                </div>

                                <?php
                                if ($winner == $id) {


                                ?>
                                    <div class="d-flex flex-column mt-4">
                                        <h5><b>You Are the Winner </b></h5></button>



                                    </div>
                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bid_modal<?php echo  $bid_amount ?>" type="button">Add Payment Details</button>


                                    </div>

                                <?php
                                } else {

                                ?>
                                    <div class="d-flex flex-column mt-4">
                                        <h5><b>No Winner has been choosen yet </b></h5></button>

                                <?php

                                }
                            }
                                ?>
                                    </div>

                            </div>
                        </div>
            </form>


            <div id="bid_modal<?php echo $bid_amount ?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <center>
                                <h4 id="NAME" class="modal-title">Payment Module</h4>
                            </center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>



                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <div class="card p-3">
                                            <p class="mb-0 fw-bold h4">Payment Methods</p>
                                        </div>
                                    </div>
                                    <div class="col-4 ">
                                        <center><button style="width: 100%;" type="button" class="btn-primary" value="" onclick="show_credit_card()"> Credit Card</center></button>
                                    </div>
                                    <div class="col-4 justify-content-center">
                                        <center><button type="button" style="width: 100%;" class="btn-primary" value="" onclick="show_paypal()"> Paypal</center></button></center>
                                    </div>
                                    <div class="col-4 justify-content-center">
                                        <center><button type="button" style="width: 100%;" class="btn-primary" value="" onclick="show_bank()"> By Bank</center></button></center>
                                    </div>
                                    <div class="col-12" id="credit_card_form" hidden>
                                        <div class="card p-3">
                                            <div class="card-body border p-0">
                                                <p>
                                                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                        <span class="fw-bold">Credit Card</span>
                                                    </a>
                                                </p>
                                                <div class="col-lg-12">
                                                    <form action="" class="form">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form__div">
                                                                    <input type="text" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">Card Number</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form__div">
                                                                    <input type="text" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">MM / yy</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form__div">
                                                                    <input type="password" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">cvv code</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form__div">
                                                                    <input type="text" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">name on the card</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <center>
                                                                    <div class="btn btn-primary w-100">Sumbit</div>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12" id="paypal_form" hidden>
                                        <div class="card p-3">
                                            <div class="card-body border p-0">
                                                <p>
                                                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                        <span class="fw-bold">Paypal</span>
                                                    </a>
                                                </p>
                                                <div class="col-lg-12">
                                                    <script src="https://www.paypal.com/sdk/js?client-id=AZyyE_EI5umDuTZDf70WTutEiV2EdlYAM-D3QbA8R_n5fD3snXplqS4WSDw70_b1x69HqegCFiiyfC0E"></script>
                                                    <div id="paypal-button-container"></div>
                                                    <script>
                                                        paypal.Buttons({
                                                            createOrder: function(data, actions) {
                                                                // This function sets up the details of the transaction, including the amount and line item details.
                                                                return actions.order.create({
                                                                    purchase_units: [{
                                                                        amount: {
                                                                            value: '<?php echo $product_starting_price ?>'
                                                                        }
                                                                    }]
                                                                });
                                                            }
                                                        }).render('#paypal-button-container');
                                                        //This function displays payment buttons on your web page.
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12" id="bank_form" hidden>
                                        <div class="card p-3">
                                            <div class="card-body border p-0">
                                                <p>
                                                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                        <span class="fw-bold">Manual Bank Payment</span>
                                                    </a>
                                                </p>
                                                <div class="col-lg-12">
                                                    <form action="" class="form">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form__div">
                                                                    <input type="text" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">Card Number</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form__div">
                                                                    <input type="text" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">MM / yy</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form__div">
                                                                    <input type="password" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">cvv code</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form__div">
                                                                    <input type="text" class="form-control" placeholder=" ">
                                                                    <label for="" class="form__label">name on the card</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <center>
                                                                    <div class="btn btn-primary w-100">Sumbit</div>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
















                                </div>
                            </div>
                        </div>





                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
</div>



<?php
    }
?>










<script>
    $(document).ready(function() {
        $('#bid_table').DataTable({
            bFilter: false,
            bInfo: false,
            ordering: false
        });
    });

    // var myHeaders = new Headers();
    // myHeaders.append("apikey", "n2zfeH3ziUuUSThIpMVR7W4tgWVzex9B");

    // var requestOptions = {
    //   method: 'GET',
    //   redirect: 'follow',
    //   headers: myHeaders
    // };

    // fetch("https://api.apilayer.com/exchangerates_data/latest?symbols=USD&base=PKR", requestOptions)
    //   .then(response => response.text())
    //   .then(result => JSON.parse(result))
    //   .then(result => filling_to_php(resutl.rates["USD"])) 
    //    .catch(error => console.log('error', error));
</script>