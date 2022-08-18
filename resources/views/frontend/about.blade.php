
@include('frontend.includes.navbar')
<style>
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.section {
    width: 100%;
    min-height: 100vh;
    background-color: #ddd;
}

.container {
    width: 80%;
    display: block;
    margin: auto;
    padding-top: 100px;
}

.content-section {
    float: left;
    width: 55%;
}

.image-section {
    float: right;
    width: 40%;
}

.image-section img {
    width: 100%;
    height: auto;
}

.content-section .title {
    text-transform: uppercase;
    font-size: 28px;
}

.content-section .content h3 {
    margin-top: 20px;
    color: #181717;
    font-size: 21px;
}

.content-section .content p {
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 18px;
    line-height: 1.5;
}

.content-section .content .button {
    margin-top: 30px;
}

.content-section .content .button a {
    background-color: #3d3d3d;
    padding: 12px 40px;
    text-decoration: none;
    color: #fff;
    font-size: 25px;
    letter-spacing: 1.5px;
}

.content-section .content .button a:hover {
    background-color: #a52a2a;
    color: #fff;
}

.content-section .social {
    margin: 40px 40px;
}

.content-section .social i {
    color: #e20b0b;
    font-size: 30px;
    padding: 0px 10px;
}

.content-section .social i:hover {
    color: #3d3d3d;
}

@media screen and (max-width: 768px) {
    .container {
        width: 80%;
        display: block;
        margin: auto;
        padding-top: 50px;
    }

    .content-section {
        float: none;
        width: 100%;
        display: block;
        margin: auto;
    }

    .image-section {
        float: none;
        width: 100%;

    }

    .image-section img {
        width: 100%;
        height: auto;
        display: block;
        margin: auto;
    }

    .content-section .title {
        text-align: center;
        font-size: 19px;
    }

    .content-section .content .button {
        text-align: center;
    }

    .content-section .content .button a {
        padding: 9px 30px;
    }

    .content-section .social {
        text-align: center;
    }

}
    </style>
<div class="section">
    <div class="container">
        <div class="content-section">
            <div class="title">
                <h1>About Us</h1>
            </div>
            <div class="content">
                <h3>Easy Cars</h3>
                <p>Get great deals on a car rental and save big
                    Trying to find the best car rental deal?
                    There is no need to look further – you can always find a special offer and save big on
                    EconomyBookings.com!

                    Cooperating with hundreds of global and local car rental suppliers, we provide a wide choice of
                    vehicles of all classes and find the perfect car for your journey. EconomyBookings.com is ready
                    to assist you whatever your question is and wherever you are in the world.</p>

            </div>
            <div class="social">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="image-section">
            <img src="{{asset('images/carlogo.png')}}">
        </div>
    </div>
</div>
