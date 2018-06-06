<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact</title>

    <style type="text/css">
      p.error, p.success {
        font-weight: bold;
        padding: 10px;
        border: 1px solid;
      }
      p.error {
        background: #ffc0c0;
        color: #900;
      }
      p.success {
        background: #b3ff69;
        color: #4fa000;
      }
    </style>
  </head>

  <body id="body-contact">

    <div class="container">

      <div class="row">
        <div id="inside-page" class="col-md-12">
          <h2>Contact</h2>

          <p>If you have any questions, comments or offers of work, please contact me using the form below.</p>

          <form action="sendmailtest.php" method="post">
            <p>
              <label for="name">Name: *</label><br />
                <input type="text" name="name" id="name" />
            </p>
            
            <p>
              <label for="email">E-mail: *</label><br />
                <input type="text" name="email" id="email" />
            </p>
            
            <p>
              <label for="comments">Comments: *</label><br />
                <textarea name="comments" id="comments" rows="5" cols="30"></textarea>
            </p>

            <p>
              <input type="submit" name="submit" id="submit" value="Send" />
            </p>
          </form>
        </div> <!-- /.Inside-Page -->
      </div> <!-- /.Row -->

    </div><!-- /.container -->
  </body>
</html>
