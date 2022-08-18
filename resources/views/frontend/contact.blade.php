@include('frontend.includes.navbar')
<link rel="stylesheet" href="style.css">


    <div class="section-header">
            <h2>Contact Us</h2>
    </div>

    <div class="container">
        <div class="row">

            <div class="contact-info">
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-home"></i>
                    </div>

                    <div class="contact-info-content">
                        <h4>Address</h4>
                        <p>Bagbazar,Kathmandu</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-phone"></i>
                    </div>

                    <div class="contact-info-content">
                        <h4>Phone</h4>
                        <p>9861386886</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="contact-info-content">
                        <h4>Email</h4>
                        <p>carseasy@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <form action="{{route('contact.contactnow')}}"  method="POST">
                    @csrf
                    <h2>Send Message</h2>
                    <div class="input-box">
                        <input type="text" required="true" name="FullName">
                        <span>Full name</span>
                    </div>

                    <div class="input-box">
                        <input type="email" required="true" name="Email">
                        <span>Enter your email</span>

                    </div>

                    <div class="input-box">
                        <textarea required="true" name="Message"></textarea>
                        <span>Drop your message</span>
                    </div>

                    <div class="input-box">
                        <input type="submit" value="Send" name="">
                    </div>
                </form>
            </div>

        </div>
    </div>

