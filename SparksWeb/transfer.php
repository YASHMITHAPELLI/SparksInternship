<?php
include('./connection.php');
$accno=$_GET['Account_num'];
$sql="select * from customers where Account_no=$accno;";
$result=$bud->query($sql);
if(isset($_POST['update']) and $_POST['amount']!='' and $_POST['to']!=''){
    $sqll="select Name from customers where Account_no=$accno;";
    $sqlll="select Ballance from customers where Account_no=$accno;";
    $resulttt=$bud->query($sqlll);
    $rowsss=$resulttt->fetch_assoc();
    $resultt=$bud->query($sqll);
    $rowss=$resultt->fetch_assoc();
    $num=(int)$_POST['amount'];
    if($num<=$rowsss['Ballance'] and $num>0 and $rowss['Name']!=$_POST['to']){
      
   $sql1= "update customers set Ballance=Ballance -".$_POST['amount']." where Account_no=".$accno."; ";
   $bud->query($sql1);
   $sql2= "update customers set Ballance=Ballance +".$_POST['amount']." where Name='".$_POST['to']."'; ";
   $bud->query($sql2);     
   $sq3=$bud->prepare("insert into transsactionhistory(From_account,To_account,Amount) values(?,?,?)");
$sq3->bind_param("ssi",$rowss['Name'],$_POST['to'],$_POST['amount']);
  $e= $sq3->execute();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css?v=<?php echo time();?>">
    <title>Document</title>

    <script >
      function transfer(){
    var a = document.getElementById("to").value;
    var b = document.getElementById("amount").value;
    if(a!="" || b!=""){

        var con=confirm("Proceed to transaction?");

    }
    else{
      alert("Please enter valid information");
    
    }
}


    </script>
    <style>
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
form{
  margin-top: 30px;
  justify-content: space-between;
}
#button{
  padding: 10px;
}
form>input,select{
  padding: 10px;
  border-radius: 20px;
  margin-right: 20px;

}
select{
  margin-right: 20px;
}

  tr:hover{background-color: violet;}
th, td{
    padding: 15px;
}
.footer-section{
  margin-top: 100%;
}
.navbar>ul>li
{
  margin-top: 25px;
}
.form{
  padding: 10px 10px;
}
    </style>
</head>
<body>
  <script>function transfer(){
    var a = document.getElementById("to").value;
    var b = document.getElementById("amount").value;
    if(a!="" && b!=""){
       var con=confirm("Proceed to transaction?");
    var value=con.tostring();
    document.cookie="confirm_value=".concat(con);
    }
    else{
 alert("Please enter valid information");
    
    }
}</script>
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
<center>
          <table>
        <tr>
        <th>Account_no</th>
        <th>Account_holder</th>
        <th>Email</th>
        <th>Account_Ballance</th>
        </tr>
        <?php 
        while($rows=$result->fetch_assoc())
        {?>
<tr>
            <td> <?php echo $rows['Account_no'] ;?></td>
            <td name="namee"> <?php echo $rows['Name']  ;?></td>
            <td> <?php echo $rows['Email'] ; ?></td>
            <td> <?php echo $rows['Ballance']  ; ?></td>
            </tr>
            <?php
        }
        ?>
        <tr> 
        </tr>
    </table></center>
    <br><br><br>
    <center>
    <div class="form">
    <form method="post">
        </select>
        <select name="to" id="to">
        <option value="" disable selected >Select TO</option>    
        <option value="Rushikesh Kulkarni">Rushikesh Kulkarni</option>
            <option value="Atharva Nair">Atharva Nair</option>
            <option value="Vitthal Waghere">Vitthal Waghere</option>
            <option value="Harshal Paratwar">Harshal Paratwar</option>
            <option value="Chaitanya Ambekar">Chaitanya Ambekar</option>
            <option value="Adarsh Pandit">Adarsh Pandit</option>
            <option value="Sandeep Patole">Sandeep Patole</option>
            <option value="Vaibhavi Kate">Vaibhavi Kate</option>
            <option value="Sakshi Mhamuni">Sakshi Mhamuni</option>
            <option value="Manoj Gaikwad">Manoj Gaikwad</option>
        </select>
        <input type="number" name="amount" placeholder="Enter Amount" id="amount">
        <input type="submit" name="update" id="button" value="Transfer" onclick="transfer()"/>
        <!-- <button></button> -->
    </form>
    </div>
    </center>
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