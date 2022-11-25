<?php
    session_start();
    require_once('products.php');

    if(isset($_POST['btnProcess'])) {

        if(isset($_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']]))
            $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] += $_POST['txtQuantity']; 
        else
            $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] = $_POST['txtQuantity']; 

        $_SESSION['totalQuantity'] += $_POST['txtQuantity'];
        header("location: confirm.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Online Sneaker Store</title>
</head>
<body>
    <form method="post">
        <div class="container">
            <div class="row mt-5">
                <div class="col-10">
                    <h1><i class="fa fa-store"></i>Online Sneaker Store</h1>
                </div>
                <div class="col-2 text-right">
                    <a href="cart.php" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <span class="badge badge-light">
                            <?php echo (isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] : "0"); ?>
                        </span>
                    </a>
                </div>            
            </div>
            <hr>

            <div class="row">
                <?php if(isset($_GET['k']) && isset($arrProducts[$_GET['k']])): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="product-grid2 card">
                            <div class="product-image2">
                                <a href="">
                                    <img class="pic-1" src="img/<?php echo $arrProducts[$_GET['k']]['photo1']; ?>">
                                    <img class="pic-2" src="img/<?php echo $arrProducts[$_GET['k']]['photo2']; ?>">
                                </a>                            
                            </div>                        
                        </div>
                    </div>           
                         
                    <div class="col-md-8 col-sm-6 mb-4">                
                        <h3 class="title">
                            <?php echo $arrProducts[$_GET['k']]['name']; ?>
                            <span class="badge badge-dark">₱ <?php echo $arrProducts[$_GET['k']]['price']; ?></span>
                        </h3>
                        <p><?php echo $arrProducts[$_GET['k']]['description']; ?></p>                    
                             <hr>

                        <input type="hidden" name="hdnKey" value="<?php echo $_GET['k']; ?>">
                            <h3 class="title">Select Size:</h3>
                                <input type="radio" name="radSize" id="radSize1" value="7" checked>
                                    <label for="radSize1" class="pr-3">7</label>

                                <input type="radio" name="radSize" id="radSize2" value="7.5">
                                    <label for="radSize2" class="pr-3">7.5</label>

                                <input type="radio" name="radSize" id="radSize3" value="8">
                                    <label for="radSize3" class="pr-3">8</label>

                                <input type="radio" name="radSize" id="radSize4" value="8.5">
                                    <label for="radSize4" class="pr-3">8.5</label>

                                <input type="radio" name="radSize" id="radSize5" value="9">
                                    <label for="radSize5" class="pr-3">9</label> 

                                <input type="radio" name="radSize" id="radSize6" value="9.5">
                                    <label for="radSize6" class="pr-3">9.5</label> 

                                <input type="radio" name="radSize" id="radSize7" value="10">
                                    <label for="radSize7" class="pr-3">10</label> 

                                <input type="radio" name="radSize" id="radSize8" value="10.5">
                                    <label for="radSize8" class="pr-3">10.5</label>   

                                <input type="radio" name="radSize" id="radSize9" value="11">
                                    <label for="radSize9" class="pr-3">11</label>    

                                <input type="radio" name="radSize" id="radSize10" value="11.5">
                                    <label for="radSize10" class="pr-3">11.5</label>  

                                <input type="radio" name="radSize" id="radSize11" value="12">
                                     <label for="radSize11" class="pr-3">12</label>       
                                               
                        <hr>
                        <h3 class="title">Enter Quantity:</h3>
                        <input type="number" name="txtQuantity" id="txtQuantity" class="form-control" placeholder="0" min="1" max="100" required>
                        <br>
                        <button type="submit" name="btnProcess" class="btn btn-dark btn-lg"><i class="fa fa-check-circle"></i> Confirm Product Purchase</button>
                        <a href="/Online_Sneaker_Shop_Cart/" class="btn btn-danger btn-lg"><i class="fa fa-arrow-left"></i> Cancel / Go Back</a>
                    </div>                                
                <?php else: ?>
                    <div class="col-12 card p-5">
                        <h3 class="text-center text-danger">No Product Found!</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>