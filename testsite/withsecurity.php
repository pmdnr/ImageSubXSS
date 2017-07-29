<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cross Site Scripting Attacks Test Web Page - With Security">
    <link rel="icon" href="js-css/lt.ico">
    <title>Cross Site Scripting Attacks Test Web Page - With Security</title>
    <link href="js-css/bootstrap.min.css" rel="stylesheet">
    <link href="js-css/jumbotron-narrow.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">ImageSubXSS</h3>
      </div>

      <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 10px;">
        <h3>XSS Test Web Page - With Security</h3>
        <p>The Data submitted through this web page will be filtered to check Cross Site Scripting Attacks.</p>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <h4>User Comments</h4>
          <p></p>
          <form class="form-group" id="userForm" style="margin-bottom: 5px;">
            <label for="comment">Please give your valuable comments</label>
            <textarea class="form-control" rows="5" name="ucomment" id="ucomment"></textarea>
            <input type="submit" class="btn btn-default">
          </form><hr style="margin-top: 0px; margin-bottom: 0px;">
          <p>Your Comment is:</p><p id='response'></p>        
        </div>
      </div>

      <footer class="footer">
        <p>&copy; ImageSubXSS Team</p>
      </footer>

    </div>

    <script src="js-css/jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#userForm').submit(function(){
         
            // show that something is loading
            $('#response').html("<i>Loading comment...</i>");
            $.ajax({
                type: 'POST',
                url: 'securedinputhandler.php', 
                data: $(this).serialize()
            })
            .done(function(data){
                 
                // show the response
                $('#response').html(data);
                 
            })
            .fail(function() {
             
                // just in case posting your form failed
                alert( "Posting failed." );
                 
            });
     
            // to prevent refreshing the whole page page
            return false;
     
        });
    });
    </script>
  </body>
</html>
