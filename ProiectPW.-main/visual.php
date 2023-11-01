<?php
session_start();

$username = ""; 
$email = "";   

$conn =  mysqli_connect('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE user_role = 0 or  user_role = 1 "  ;
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizualizare Clienti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <style>
        body{
    margin: 0;
    padding: 0;
}
h1{
    font-size: 50px;
    color: rgb(4, 13, 18);
    padding: 0;
    margin: 0;
}
h4{
    padding: 0;
    margin: 0;
    font-size: 24px;
}

p{
    font-size: 16px;
    color: #000000;
}

/*Header Section*/

.header{
    display: flex;
    justify-content: space-between;
    text-align: center;
    padding: 20px 80px;
    background: rgb(147, 177, 166);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    z-index: 1;
    position: sticky;
    top: 0;
    left: 0;
}
#navbar{
    display: flex;
    padding-top: 15px;
    align-items: center;
    justify-content: center;
    
}

li{
    list-style: none;
    padding: 0px 20px;
}

li a{
    text-decoration: none;
    font-size: 19px;
    font-weight: 900;
    color: rgb(4, 13, 18);
    transition: 0.3s;
}

li a::after{
    content: '';
    width: 0%;
    height: 2px;
    background-color:rgb(92, 131, 116);
    color: rgb(92, 131, 116);
    display: block;
    margin: auto;
    transition: 0.5s;
}

li a:hover::after{
    width: 100%;
}
.responsive{
    display: none;
}
#close{
    display: none;
}
        table {
    border-collapse: collapse;
    width: 50%;
    margin: 70px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}
footer{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    margin-bottom: 80px;
}

footer .col{
    display: flex;
    align-items: flex-start;
    flex-direction: column;
}

footer img{
    margin-bottom: 30px;
}

footer h4{
    font-size: 25px;
    padding-bottom: 20px;
}

footer p{
    font-size: 15px;
    margin:  0 0 10px 0;
}

footer a{
    font-size: 15px;
    text-decoration: none;
    color: rgb(24, 61, 61);
    margin-bottom: 10px;
}

.media{
    margin-top: 20px;
}

.media i {
    color:rgb(24, 61, 61);
    padding-right: 5px;
}

.install .cards img{
    border:1px rgb(24, 61, 61) solid;
    border-radius: 7px;
    cursor: pointer;
    margin-top: 10px;
}
.titlu{
    margin-top: 100px;
    margin-left:100px;
}

    </style>
</head>
<body>
<section class="header"> 

<a href="#"><img class="logo" src="poze/facebook_cover_photo_2.png" alt="logo image" width="250" height="100"></a>

<div>
    <ul id="navbar">
        <li><a href="index.html">Home</a></li>
        <li><a href="shop.html">Shop</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
        <li id="lg-bag"><a href="http://localhost/Proiect/ProiectPW.-main/add_item.php"><i class="fa-solid fa-plus"></i></a></li>
        <li id="lg-bag"><a href="visual.php"><i class="fa-regular fa-user"></i></a></li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
    </ul>
</div>

<div class="responsive">
    
    <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
    <i id="bar" class="fas fa-outdent"></i>
   
</div>


</section>
<h1 class="titlu">Users</h1>
<?php
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID </th><th> Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nu există utilizatori conectați.";
}

$conn->close();
?>

<footer>
        <div class="col">
            <img src="poze/facebook_cover_photo_2.png" width="200">
            <h4>Contact</h4>
            <p><b>Adress: </b> Aleea Ripensia , nr.33, Timisoara</p>
            <p><b>Phone:</b> 0751 890 995</p>
            <p><b>Program:</b> 9:00-17:00, Monday-Friday</p>
            <h4>Follow Us</h4>
            <div class="media">

                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="">About Us</a>
            <a href="">Delivery Information</a>
            <a href="">Privacy Policy</a>
            <a href="">Terms & Conditions</a>
            <a href="">Contact Us</a>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="">My Account</a>
            <a href="">Sign In</a>
            <a href="">View Cart</a>
            <a href="">My Wishlist</a>
            <a href="">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>Form App Store or Google Play</p>
            <div class="cards">
                <img src="poze/app.jpg" alt="">
                <img src="poze/play.jpg" alt="">
            </div>
                <p>Secured Payments</p>
                <img src="poze/pay.png" alt="">
            
        </div>
    

</body>
</html>
