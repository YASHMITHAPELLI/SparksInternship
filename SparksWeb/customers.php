<?php
include('./connection.php');
$sql="select * from customers;";
$result=$bud->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css?v=<?php echo time();?>">
    <title>Document</title>
    <style>
        .allcust{
            text-align: center;
        }
  table, th, td {
  border: 2px solid;
  text-align: center;
  margin-top: 20px;
  background-color:#ffdb4d;
  margin-left: auto;
  margin-right: auto;
  font-size: larger;
  font-weight: 500;
}
.copy-right{
  font-size: larger;
  font-weight: 400;
  padding: 10px;
}
li:hover{
background-color:#ff5c33;
}
body{
    background-color:#00001a;
}
button{
    padding: 10px;
    font-weight: 600;
}
button:hover{
    background-color:#ff6600;
}
  tr:hover{background-color:#ac00e6;}
th, td{
    padding: 10px;
}
.navbar>ul>li
{
  margin-top: 30px;

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
            <br><br>
    <div class="allcust">
    <form action="transfer.php">    
    <center><table>
        <tr>
        <th>Account_no</th>
        <th>Name</th>
        <th>Email</th>
        <th>Account Ballance</th>
        </tr>
        <?php 
        while($rows=$result->fetch_assoc())
        {
echo " <tr>
            <td> ". $rows['Account_no'] ."</td>
            <td> ". $rows['Name']  ."</td>
            <td> ". $rows['Email'] ."</td>
            <td> ". $rows['Ballance']  ."</td>
            <td><a href='transfer.php?Account_num=".$rows['Account_no']."'><button type='button'>Transfer Money</button>
            </a></td>            
            </tr>";
        }
        ?>
        <tr> 
        </tr>
    </table></center>
    </form></div><br><br>
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
