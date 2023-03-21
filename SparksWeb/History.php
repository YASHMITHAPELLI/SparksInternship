<?php
include('./connection.php');
$sql="select * from transsactionhistory;";
$result=$bud->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css?v=<?php echo time();?>">
    <style>
        table, th, td {
  border: 1px solid;
  width: 50%;
  text-align: center;
  padding: 10px;
    background-color: #ffdb4d;
}
.navbar>ul>li
{
  margin-top: 25px;

}

.footer-section{
  /*margin-top: 100%;*/
}
    </style>
</head>
<body>
<div class="navbar">
          <div class="right">
            <h1>SPARKLE<span class="maja">$</span>BANK</h1>
          </div>
              <ul>
                <li><a href="./History.php">HISTORY</a></li>
                <li><a href="./customers.php">CUSTOMER</a></li>
                <li><a href="./index.html"> HOME</a></li>
              </ul>
            </div>
            <br><br><br><br>
    <form action="" id="history">
    </form>
    <center>
    <table>
        <tr>
        <th>Transaction id</th>
        <th>From Account</th>
        <th>To account</th>
        <th>Amount</th>
        </tr>
        <?php 
        while($rows=$result->fetch_assoc())
        {?>
<tr>
            <td> <?php echo $rows['TransactionID'] ;?></td>
            <td name="namee"> <?php echo $rows['From_account']  ;?></td>
            <td> <?php echo $rows['To_account'] ; ?></td>
            <td> <?php echo $rows['Amount']  ; ?></td>
            </tr>
            <?php
        }
        ?>
        <tr> 
        </tr>
    </table></center><br><br>
    <div class="footer-section">
        <div class="social-container">
          <img src="./images/icon-facebook.svg" alt="">
          <img src="./images/icon-instagram.svg" alt="">
          <img src="./images/icon-twitter.svg" alt="">
          <img src="./images/icon-pinterest.svg" alt="">
        </div>
      <div class="copy-right">
        <p>&copy;SPARKLE$BANK All rights reserved.</p>
      </div>
<div class="menu">
  <a href="#">About</a>
  <a href="#">Carriers</a>
  <a href="#">Policy</a>
  <a href="#">Contact</a>
  <a href="#">Supports</a>
</div>
    </div>
</body>
</html>