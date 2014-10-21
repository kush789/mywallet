<?php

  session_start();


  if( !isset($_SESSION['user_email']) || !isset($_SESSION['user_name']) )
  {
    $_SESSION['message'] = "You must log in first";
    $_SESSION['state'] = "invalid";
    header("Location: index.php");
  }
  else
  {

    echo"
    <html>
    
      <head>
        <title>My transactions</title>
<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>

<link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href='./css/bootstrap.min.css' rel='stylesheet'>
        <link href='./css/siimple.css' rel='stylesheet'>
      </head>

      <body style='background-image:url(./images/homebg.jpg); background-size: cover;'>

          <!-- Static navbar -->
          <div class='navbar navbar-default' role='navigation'>
            <div class='container-fluid'>
              <div class='navbar-header'>
                  <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                  </button>
                  <a class='navbar-brand' href='#' style = 'margin-left:40px;font-size:25px'><span style='color: #000;'>my Wallet</span></a>
                </div>
              <div class='navbar-collapse collapse'>

              <ul class='nav navbar-nav navbar-right'>
                <li ><a href='./'>Home</a></li>
                <li class='active'><a href='./log.php'>Transactions</a></li>
                <li><a href='logout.php'>Logout</a></li>
                <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown Menu<span class='caret'></span></a>
                  <ul class='dropdown-menu' role='menu'>
                      <li><a href='./settings.php'>Settings</a></li>
                      <li><a href='#'>Another action</a></li>
                      <li><a href='#'>Something else here</a></li>
                      <li class='divider'></li>
                      <li class='dropdown-header'>Nav header</li>
                      <li><a href='#'>Separated link</a></li>
                      <li><a href='#'>One more separated link</a></li>
                  </ul>
                  </li>
              </ul>
              </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
      </div>
<div id='wrapper'>


<div class='row'>
        <div class = 'col-md-2'></div>
        <div class='col-md-8 col-md-offset-0'>
            <div class='panel panel-default'>

                <div class='panel-body ativa-scroll' >
                <b>
                <div class = 'row' style = 'text-align:center; font-size:30px;'>
                  DEBIT<br><br>
                </div>


                <div class = 'row' style = 'font-size:25px;'>
                  <div class = 'col-md-1'>Sno.</div>
                  <div class = 'col-md-2'>Amount</div>
                  <div class = 'col-md-2'>Source</div>
                  <div class = 'col-md-2'>Balance</div>
                  <div class = 'col-md-3'>Date and Time</div>
                  <div class = 'col-md-2'>Comment</div>
                </div><br>
                </b>";

    $con = mysql_connect("127.0.0.1","root","kush@1996");
    mysql_select_db('mywallet',$con);
    $query = " SELECT * FROM balance_log WHERE uid LIKE '$_SESSION[uid]' AND type LIKE '1' ";
    $data = mysql_query($query,$con);
    $count = 1;

    while( $row = mysql_fetch_array($data))
    {
      echo "<div class = 'row'>";
      echo "<div class = 'col-md-1'>".$count."</div>";
      $count+=1;
      echo"<div class = 'col-md-2'>".$row['amount']."</div>";
      echo"<div class = 'col-md-2'>".$row['reason']."</div>";
      echo "<div class = 'col-md-2'>".$row['balance']."</div>";
      echo "<div class = 'col-md-3'>".$row['timestamp']."</div>";
      echo "<div class = 'col-md-2'>".$row['comment']."</div>";

      echo"</div>";

    }




echo "
             </div>
            </div>
          </div>

  </div>

</div>

<div id='wrapper'>

<div class='row'>
        <div class = 'col-md-2'></div>
        <div class='col-md-8 col-md-offset-0'>
            <div class='panel panel-default'>
                <div class='panel-body ativa-scroll' >
                <b>
                <div class = 'row' style = 'text-align:center; font-size:30px;'>
                  CREDIT<br><br>
                </div>

                <div class = 'row' style = 'font-size:25px;'>
                  <div class = 'col-md-1'>Sno.</div>
                  <div class = 'col-md-2'>Amount</div>
                  <div class = 'col-md-2'>Reason</div>
                  <div class = 'col-md-2'>Balance</div>
                  <div class = 'col-md-3'>Date and Time</div>
                  <div class = 'col-md-2'>Comment</div>
                </div><br>
                </b>



                ";

    $con = mysql_connect("127.0.0.1","root","kush@1996");
    mysql_select_db('mywallet',$con);
    $query = " SELECT * FROM balance_log WHERE uid LIKE '$_SESSION[uid]' AND type LIKE '0' ";
    $data = mysql_query($query,$con);

    $count = 1;
    while( $row = mysql_fetch_array($data))
    {
      echo "<div class = 'row'>";
      echo "<div class = 'col-md-1'>".$count."</div>";
      $count+=1;
      echo"<div class = 'col-md-2'>".$row['amount']."</div>";
      echo "<div class = 'col-md-2'>";
      if ($row['reason']==0)
      {
        echo "Food";
      }
      if ($row['reason']==1)
      {
        echo "Clothes";
      }
      if ($row['reason']==2)
      {
        echo "Entertainment";
      }
      if ($row['reason']==3)
      {
        echo "Books";
      }
      if ($row['reason']==4)
      {
        echo "Travel";
      }
      if ($row['reason']==5)
      {
        echo "Bills";
      }
      if ($row['reason']==6)
      {
        echo "Miscellaneous";
      }
      echo "</div>";
      echo "<div class = 'col-md-2'>".$row['balance']."</div>";
      echo "<div class = 'col-md-3'>".$row['timestamp']."</div>";
      echo "<div class = 'col-md-2'>".$row['comment']."</div>";

      echo"</div>";

    }




echo "
             </div>
            </div>
          </div>

  </div>

</div>



 
    <script src='./js/jquery-1.10.2.min.js'></script>
    <script src='./js/bootstrap.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script>
  $(document).ready(ajustamodal);
  $(window).resize(ajustamodal);
  function ajustamodal() {
    var altura = $(window).height() - 400; //value corresponding to the modal heading + footer
    $('.ativa-scroll').css({'height':altura,'overflow-y':'auto'});
  }
</script>
  

</body>
</html>

    ";
  }
?>