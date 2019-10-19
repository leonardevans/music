<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactUs.css" />

</head>

<body>

    <div class="contact-title">
        <h1>XFLIX</h1>
        <h2>We are always here to serve you</h2>
    </div>
    <div class="contact-form">
        <form action="contactUsPage/contactUs.php" method="POST" id="contact-form">
            <input type="text" name="name" id="" placeholder="Your Name" class="form-control" required />
            <br />
            <input type="email" name="email" id="" placeholder="Your Email" class="form-control" required />
            <br />
            <textarea name="message" id="" class="form-control" placeholder="Message" rows="4"
                required></textarea><br />
            <input type="submit" value="Send Message" class="form-control submit" />
        </form>
    </div>
</body>

</html>