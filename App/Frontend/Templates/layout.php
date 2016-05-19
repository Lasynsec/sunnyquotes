<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'My SunnyQuotes' ?>
    </title>
    <meta http-equiv="Content-Type"  content="text/hml" charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  
  <body>
      
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">My SunnyQuotes</a>

            <ul class="nav navbar-nav">
              <li><a href="/">Accueil</a></li>
             <?php if ($user->isAuthenticated()) { ?>
              <li><a href="/admin/">Admin</a></li>
              <li><a href="/admin/news-insert.html">Add new quotes</a></li>
            <?php } ?>
            </ul>
          </div>
        </div>
    </div>

      <div class="jumbotron">
         <div class="container">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
            </div>
      </div>
    
      <footer></footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </body>
</html>