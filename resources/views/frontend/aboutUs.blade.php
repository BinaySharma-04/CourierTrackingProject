<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About_Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset("css/aboutUs.css")}}">
</head>
<body>
    <div class="heads">
        @include("header.nav");
        
        <h1>About Us</h1>
        <p>Welcome to Bee Trio Trackers , your trusted partner for real-time courier tracking.</p>
    </div>
    <div class="section1">
        <div class="sec">
            <div class="design"></div>
            <h2>Who are we?</h2>
            <p>We are a passionate team of logistics experts who believe in the power of seamless delivery. Like a trio of busy bees, we work together tirelessly to ensure that your packages reach their destination safely and efficiently. Our dedication to precision, tracking, and customer service sets us apart in the world of couriers.</p>
        </div>
        <div class="sec">
            <div class="design"></div>
            <h2>Our Mission</h2>
            <p>Our mission is to revolutionize the courier and logistics industry by providing fast, reliable, and transparent delivery solutions that exceed customer expectations. We aim to bridge the gap between senders and receivers through innovative technology, eco-friendly practices, and exceptional customer service, ensuring every package is delivered with care and precision.</p>
        </div>
        <div class="sec">
            <div class="design"></div>
            <h2>What we do?</h2>
            <p>At Bee Trio Trackers, we specialize in providing top-notch courier and logistics solutions tailored to meet the diverse needs of our clients. From local businesses to international enterprises, our wide range of services ensures that your packages are delivered swiftly, securely, and with the highest level of precision. We are committed to making every delivery a seamless experience, whether it’s across town or across the globe.</p>
        </div>
    </div>
    <div class="section2">
        <div class="slot1">
            <img src="images/trophy.jpg" alt="file not found" width="500px" height="500px">
        </div>
        <div class="slot2">
            <h2>Why Choose us</h2>
            <p>At Bee Trio Trackers, we make tracking your shipments effortless and reliable. Our cutting-edge technology provides real-time updates, ensuring you’re always informed about your package’s location. With a user-friendly interface and dedicated customer support, we prioritize your peace of mind. Trust us to deliver accuracy, transparency, and exceptional service every time.</p>
            <br>
            <p>Accuracy and transparency are at the core of our service. We work with trusted carriers and utilize cutting-edge technology to ensure the tracking information you receive is both precise and up-to-date. In addition, our dedicated customer support team is always ready to assist you with any questions or concerns, ensuring you have a positive experience from start to finish.</p>
        </div>
    </div>
    <h2 id="team">Our Team</h2>
<div class="row">
    <div class="column">
        <img src="images/buyeee.jpg" alt="Founder/Designer">
        <p class="role">Founder/Designer</p>
    </div>
    <div class="column">
        <img src="images/bital.JPG" alt="Co-Founder">
        <p class="role">Co-Founder</p>
    </div>
    <div class="column">
        <img src="images/biswas.jpg" alt="Co-Founder/Chief">
        <p class="role">Co-Founder/Chief</p>
    </div>
</div>
@include('footer.footer')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navigation = document.querySelector('.navigation');

    hamburger.addEventListener('click', () => {
        // Toggle the 'active' class on both hamburger and navigation
        hamburger.classList.toggle('active');
        navigation.classList.toggle('active');
    });

    // Optional: Close the menu when a navigation link is clicked
    const navLinks = document.querySelectorAll('.navigation a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navigation.classList.remove('active');
        });
    });
}); 
    </script>
</body>
</html>