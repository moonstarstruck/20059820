<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <link rel="icon" href="media/SDG Logo/favicon.png" type="image/x-icon">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/index.css">

</head>

<body>

  <?php include 'nav.php'; ?>

  <!-- Contact Us -->
  <main class="form-bg">
    <!-- Contact Us container-->
    <div class="contact-form">
      <h3 class='form-title'>Contact Us</h3>
      <form id="cform" autocomplete="off">

        <!-- Name -->
        <div class="input-group">
          <label for="name">Name</label>
          <br>
          <input type="text" name="name" placeholder="Your name.." id="contact-name" onkeyup="validateName()">
                  <!-- validation message -->
          <span id="name-error"></span>
          <br>
        </div>

        <!-- Email -->
        <div class="input-group">
          <label for="email">Email</label>
          <br>
          <input type="email" name="email" placeholder="Your email.." id="contact-email" onkeyup="validateEmail()">
                  <!-- validation message -->
          <span id="email-error"></span>
          <br>
        </div>

        <!-- Message -->
        <div class="input-group">
          <label for="message">Message</label>
          <br>
          <textarea name="message" placeholder="Message.." row="4" id="contact-message" onkeyup="validateMessage()"></textarea>
                    <!-- validation message -->
          <span id="message-error"></span>
          <br>
        </div>

        <!-- Submit Button -->
        <button class="submit-form" onclick=" return validateForm()">Submit</button>
        <!-- validation message -->
        <span id="submit-error"></span>
      </form>
    </div>
  </main>

  <!-- javascript validation -->
  <script src="contact.js"></script>

</body>
</html>
