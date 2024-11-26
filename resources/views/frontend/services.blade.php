<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
  
    <link rel="stylesheet" href="{{asset("css/services.css")}}">
</head>
<body>
    <div class="heads">
        @include("header.nav")

        <h1>Services</h1>
        <h6>Our services for you</h6>
    </div>
    
    <div class="servicecontainer">
        <div class="service">
            <div class="design"></div>
            <h2>Package Tracking</h2>
            <p>Stay informed with our real-time tracking system, which allows you to monitor yours shipments every step of the way. you can check the ststus of your packages anytime.</p>
            <ul>
                    <li>Access tracking information anytime, from any device, whether you're at home or on the go.</li>
                    <li>With our reliable tracking system, you'll always know where your package is, reducing anxiety and uncertinity about your delivery.</li>
            </ul>
        </div>
        <div class="service">
            <div class="design"></div>
            <h2>E-Commerce Solutions</h2>
            <p>Introducing fast and reliable delivery services for your online store, ensuring your products reach customers on time, every time</p>
            <ul>
                <li>Easily integrate our courier services with your e-commerce platform, ensuring smooth order processing and fulfillment.</li>
                <li>With our reliable tracking system, you’ll always know where your package is, reducing anxiety and uncertainty about your delivery.</li>
            </ul>
        </div>
        <div class="service">
            <div class="design"></div>
            <h2>Insurance and Security</h2>
            <p>We understand the value of your shipments, which is why we offer comprehensive insurance options to protect your packages against loss or damage.</p>
            <ul>
                <li>Provides real-time updates for added security and transparency.</li>
                <li>Protects the full value of your shipments against loss or damage.</li>
            </ul>
        </div>
    </div>
    @include('footer.footer')
    <script href="script.js"></script>
</body>
</html>