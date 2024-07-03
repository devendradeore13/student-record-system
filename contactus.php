<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <button><a href="landingpage.php">HOME</a></button>
    <div class="contactUs">
        <div class="title">
            <h2>Get In Touch</h2>
        </div>
        <div class="box">
            
            <!--form-->
            <div class="contact form">
                <h3>Send message</h3>
                <form>
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>First Name</span>
                                <input type="text" >
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span>
                                <input type="text" >
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" placeholder="@gmail.com">
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span>
                                <input type="text" placeholder="0000000000">
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <span>Messages</span>
                                <textarea placeholder="Enter message"></textarea>
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--infoBox-->
            <div class="contact info">
                <h3>Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <span><ion-icon name="location"></ion-icon></span>
                        <p>Eklahareshivar, Near Odhagaon, Opp Nashik-Aurangabad Highway, Nashik, Maharashtra 422105<br>INDIA</p>
                    </div>
                    <div>
                        <span><ion-icon name="mail"></ion-icon></span>
                        <a href="info@matoshri.edu.in">info@matoshri.edu.in</a>
                    </div>
                    
                    <div>
                        <span><ion-icon name="call"></ion-icon></span>
                        <a href="tel:+9102532406600">+9102532406600</a>
                    </div>
                    <!--Social media-->
                    <ul class="sci">
                        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                    </ul>
                </div>
            </div>
            
            <!--map-->
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.4301296913477!2d73.90802507500206!3d19.
                    990454281411612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddc0eac0935aab%3A0xbf2108ae5c1a3118!2sMatoshri%20College%20Of%20Engineering%20%26%20Research%20Centre%2C%20Eklhare%2C%20Nashik!5e0!3m2!1sen!2sin!4v1704517826492!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>