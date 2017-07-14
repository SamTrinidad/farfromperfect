<link rel="stylesheet" href="/farfromperfect/public/styles/contact.css">
<section id="a0">
    <div id="message"><?php if(isset($data['message'])) echo $data['message']; ?></div>
    <form name="contactform" method="post" action="mail">
        <div class="formblock"><h2>Contact Us</h2></div>
        <div class="formblock">
            <label for="name">Name: </label>
            <input  type="text" name="name" maxlength="50" size="30" required>
        </div>
        <div class="formblock">
            <label for="email">Email Address: </label>
            <input  type="text" name="email" maxlength="80" size="30" required>
        </div>
        <div class="formblock">
            <label for="message">Message: </label>
            <textarea  name="message" maxlength="1000" cols="35" rows="6" required></textarea>
        </div>
        <div class="formblock">
            <input type="submit" value="Submit">
        </div>
    </form>
</section>