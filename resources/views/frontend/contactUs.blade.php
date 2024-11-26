<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset("css/contact.css")}}">
</head>
<body>
    <div class="heads">
        @include("header.nav");
        
        <h1>Contact Us</h1>
        <h6>Contact Us, We're Listening</h6>
    </div>  

    <div class="container">
        <form action="/addcontact" id="emailForm" class="contactform" method="POST" onsubmit="return validateForm()">
            @csrf 
            <h2>NEED HELP?</h2>
            <h4>Fill in and submit the form below:</h4>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name"><br>
            <span id="forname" class="error"></span>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <span id="error-message" class="error"></span>
            
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required>
            <span id="error-phone" class="error"></span>
            
            <label for="message">Message:</label>
            <textarea name="msg" id="message" placeholder="Type your message" required></textarea>
            <span id="error-message-text" class="error"></span>
            
            <button type="submit">Send Message</button>
        </form>

        <div class="contactimage">
            <h2>Get in touch</h2>
            <ul>
                <li>Phone:
                    <br>+977-9800000000
                    <dd>Available Monday to Friday, 9 AM to 6 PM</dd>
                </li>
                <li>Email:
                    <br>support@beetriotrackers.com
                    <dd>We respond within 24 hours</dd>
                </li>
                <li>Address:
                    <br>Bee Trio Trackers
                    <dd>Gaindakot-2, Nawalpur</dd>
                </li>
            </ul>
            <div class="p">
                <p>
                    For support-related queries, contact us at support@beetriotrackers.com or call +977-9800000000
                </p>
                <p>
                    We look forward to hearing from you!
                </p>
            </div>
        </div>
    </div>
    @include('footer.footer')
<!-- Validation and Hamburger Script -->
    <script>
        function validateForm(){
            let isValid = true;

            // Validate Name
            var name = document.getElementById('name');
            var lbl = document.getElementById('forname');

            if(name.value.trim() === ""){
                lbl.innerHTML = "Name field is required.";
                lbl.style.color = "red";
                name.style.borderColor = "red";
                isValid = false;
            }
            else{
                lbl.innerHTML = "";
                name.style.borderColor = "green";
            }

            // Validate Email
            var email= document.getElementById("email").value;
            var errorMessage = document.getElementById("error-message");

            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                errorMessage.textContent = "Please enter a valid email address.";
                errorMessage.style.color = "red";
                isValid = false;
            } else {
                errorMessage.textContent = ""; 
            }

            // Validate Phone
            var phone = document.getElementById('phone').value;
            var errorPhone = document.getElementById('error-phone');
            var phonePattern = /^\+?[0-9]{10,15}$/; // Simple phone validation
            if (!phonePattern.test(phone)) {
                errorPhone.textContent = "Please enter a valid phone number.";
                errorPhone.style.color = "red";
                isValid = false;
            } else {
                errorPhone.textContent = "";
            }

            // Validate Message
            var message = document.getElementById('message').value;
            var errorMessageText = document.getElementById('error-message-text');
            if(message.trim() === ""){
                errorMessageText.textContent = "Message field is required.";
                errorMessageText.style.color = "red";
                isValid = false;
            } else {
                errorMessageText.textContent = "";
            }

            return isValid;
        }

        // Hamburger menu toggle
        const hamburger = document.querySelector('.hamburger');
        const navigation = document.querySelector('.navigation');

        hamburger.addEventListener('click', () => {
            navigation.classList.toggle('active');
        });
    </script>
</body>
</html>
