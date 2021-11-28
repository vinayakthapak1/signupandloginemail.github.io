<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive DASHBOARD</title>
    <link rel="stylesheet" href="webCSS.css">
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap'); */
*{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    /* font-family: 'Ubuntu', sans-serif; */
    font-family: sans-serif;
}
:root{
    --blue: #287bff;
    --white: #fff;
    --grey: #f5f5f5;
    --black1: #222;
    --black2: #999;
}
body{
    min-height: 100vh;
    overflow-x: hidden;
    /* transform: none; */
}
/* div{
    white-space: normal;
} */
.container{
    position: fixed;
    width: 100%;
    height: 100vh;
}
.navigation{
    position: fixed;
    width: 300px;
    height: 100%;
    background: var(--blue);
    border-left: 10px solid var(--blue);
    transition: 0.5s;
    overflow: hidden;
}
.navigation.active{
    width: 80px; 

}
.navigation ul{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}
.navigation ul li{
    position: relative;
    width: 100%;
    list-style: none;
    /* margin-bottom: 40px; */
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}
.navigation ul li:hover,
.navigation ul li.hovered
{
    background: var(--white);
}
.navigation ul li:nth-child(1){
    margin-bottom: 40px;
    pointer-events: none;
} 
.navigation ul li a{
    position: relative;
    display: block;
    width: 100%;
    display: flex;
    text-decoration: none;
    color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a{
    color: var(--blue);
}
.navigation ul li a .icon{
    position: relative;
    display: block;
    min-width: 60px;
    height: 60px;
    line-height: 70px; /* changed*/
    text-align: center;
}
.navigation ul li a .icon ion-icon
{
    font-size: 1.75em;
}
.navigation ul li a .title
{
    position: relative;
    display: block;
    padding: 0 10px;
    line-height: 60px; /* Not changed*/
    text-align: start;
    white-space: nowrap;
}
/* coverd outside */
.navigation ul li:hover a::before,
.navigation ul li.hovered a::before
{
    content: '';
    position: absolute;
    right: 0;
    top: -50px;
    width: 50px;
    height: 50px;
    background: transparent;
    border-radius: 50%;
    box-shadow: 35px 35px 0 10px var(--white);
    pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li.hovered a::after
{
    content: '';
    position: absolute;
    right: 0;
    bottom: -50px;
    width: 50px;
    height: 50px;
    background: transparent;
    border-radius: 50%;
    box-shadow: 35px -35px 0 10px var(--white);
    pointer-events: none;
}

/* main */
.main{
    position: absolute;
    width: calc(100% - 300px);
    left: 300px;
    min-height: 100vh;
    background: var(--white);
    transition: 0.5s;
}
.main.active{
    width: calc(100% - 80px);
    left: 80px;
}
.topbar{
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
}
.toggle{
    position: relative;
    /* top: 0; */
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5em;
    cursor: pointer;
}
.search{
    position: relative;
    width: 400px;
    margin: 0 10px;
}
.search label{
    position: relative;
    width: 100%;
}
.search label input{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    padding: 5px 20px;
    padding-left: 35px;
    font-size: 18px;
    outline: none;
    border: 1px solid var(--black2);
}
.search label ion-icon{
    position: absolute;
    top: -1px;
    left: 10px;
    font-size: 1.2em;
} 
.user{
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
}
.user img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.cardsBox{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(4,1fr);
    grid-gap: 15px; 
}
.cardsBox .card{
    position: relative;
    background: var(--white);
    padding: 30px;
    border-radius: 50px;
    display: flex;
    justify-content: space-between;
    cursor: pointer;
    box-shadow: 0 7px 25px rgba(0,0,0, 0.10);
}
.cardsBox .card .numbers{
    position: relative;
    font-weight: 550; 
    font-size: 2.5em;
    color: var(--black1);
}
.cardsBox .card .cardName{
     color: var(--black2);
     font-size: 1.1em;
     margin-top: 5px;
}
.cardsBox .card .iconBox{
    font-size: 2.5em;
    color: var(--black1);
}
.cardsBox .card:hover{
    background: var(--blue);

}
.cardsBox .card:hover .numbers,
.cardsBox .card:hover .cardName,
.cardsBox .card:hover .iconBox{
    color: var(--white);
}
.detail{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-gap: 30px;
    /* margin-top: 10px; */
}
.detail .recentOrders{
    position: relative;
    display: grid;
    min-height: 500px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0,0,0,0.10);
    border-radius: 20px;
}
.cardHeader{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;

}
.cardHeader h2{
    font-weight: 600;
    color: var(--blue);
}
.btn{
    position: relative;
    padding: 5px 10px;
    background: var(--blue);
    text-decoration: none;
    color: var(--white);
    border-radius: 6px;
}
.detail table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}
.detail table thead td{
    font-weight: 780;
}
.detail .recentOrders table tr{
    color: var(--black1);
    border-bottom: 1px solid rgba(0,0,0,0.1);

}
.detail .recentOrders table tbody tr:last-child{
    border-bottom: none;
}

.detail .recentOrders table tbody tr:hover{
    background: var(--blue);
    color: var(--white);
}

.detail .recentOrders table tr td{
    padding: 10px;
} 
.detail .recentOrders table tr td:last-child{
    text-align: end;
}
.detail .recentOrders table tr td:nth-child(2){
    text-align: end;
}
.detail .recentOrders table tr td:nth-child(3){
    text-align: center;
}
.status-delivered{
    padding: 2px 4px;
    background-color: #8de02c;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}
.status-pending{
    padding: 2px 4px;
    background: red;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="logo-apple"></ion-icon>
                        </span>
                       <span class="title"><?php echo ucwords($_SESSION['username']);   ?></span>
                    </a>    
                </li>
           
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
           
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>
           
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                        <span class="title">Messages</span>
                    </a>
                </li>
            
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                        <span class="title">Help</span>
                    </a>
                </li>
            
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
            
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Password</span>
                    </a>
                </li>
           
                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="grid-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- usering -->
                <div class="user">
                    <img src="user.jpg">
                </div>
            </div>

            <!-- cards -->
            <div class="cardsBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">88</div>
                        <div class="cardName">Sales</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">387</div>
                        <div class="cardName">comments</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">$7,877</div>
                        <div class="cardName">Earning</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
            
            <!-- detail list -->
            <div class="detail">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View ALL</a>
                    </div>
                    <table>
                        <thead>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1,123</td>
                                <td>Paid</td>
                                <td><span class="status-delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Air Condition</td>
                                <td>$1200</td>
                                <td>Due</td>
                                <td><span class="status-pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Television</td>
                                <td>$1000</td>
                                <td>Paid</td>
                                <td><span class="status-delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Casual Shoes</td>
                                <td>$500</td>
                                <td>Paid</td>
                                <td><span class="status-paid">Paid</span></td>
                            </tr>
                            <tr>
                                <td>Wall Fan</td>
                                <td>$200</td>
                                <td>Paid</td>
                                <td><span class="status-inprocess">In Process</span></td>
                            </tr>
                            <tr>
                                <td>Shirts</td>
                                <td>$400</td>
                                <td>Due</td>
                                <td><span class="status-pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Laptop</td>
                                <td>$1400</td>
                                <td>Paid</td>
                                <td><span class="status-paid">Paid</span></td>
                            </tr>
                            <tr>
                                <td>Mixer</td>
                                <td>$500</td>
                                <td>Due</td>
                                <td><span class="status-inprocess">In Process</span></td>
                            </tr>
                            <tr>
                                <td>Celling Fan</td>
                                <td>$300</td>
                                <td>Due</td>
                                <td><span class="status-delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>$2000</td>
                                <td>Paid</td>
                                <td><span class="status-paid">Paid</span></td>
                            </tr>
                            <tr>
                                <td>Shirts</td>
                                <td>$200</td>
                                <td>Paid</td>
                                <td><span class="status-inprocess">In Process</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        // add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>