<?php 
include "connection.php";
include "css.php";
include "uheader.php";
if (isset($_REQUEST['feedback']))
{

    $date=$_REQUEST['feedback_date'];
    $userid=$_SESSION['sessionuser'];
   
    $des=$_REQUEST['feedback_description'];
    
    
   

    $ins="insert into feedback (feedback_date,cus_id,feedback_description)
             values ('$date','$userid','$des')";
    
    $ex=$con->query($ins);
    if ($ex) 
    {
        ?>
        <script type="text/javascript"> 
            alert("feedback Added");
            window.location.href="feedback.php";
        </script> <?php
    }
    else
    { ?>
        <script type="text/javascript">
            alert("feedback NOT Added");
            window.location.href="feedback.php";
        </script>
        <?php
    }
}
?>
 <div class="sufee-login d-flex align-content-center flex-wrap" style=" position: absolute; top: 150px">
    <div style=" position: absolute; top: 230px; left: 150px" >
    <form method="post" style=" position: absolute;  left: 250px; width: 500px; background-color: #f69">
        <div class="container" >
            <div class="login-content  col-md-10">
                                <h1 align="center">ADD FEEDBACK</h1><br>

                <div class="login-form">
                   

                    <form method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label> date</label>
                            <input type="date" class="form-control" placeholder="Date" 
                            name="feedback_date" required="">
                        </div>
                        <div class="form-group">
                            <label>feedback description</label>
                            <input type="text" class="form-control" placeholder="Enter feedback"  name="feedback_description" pattern="[a-zA-Z ]{2,30}" title="enter only character value a to z" value="<?php echo $record->feedback_description;?>">
                        </div>
                         
                        <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="feedback" value="add feedback">
                       
                    
                        <br>
                        <br>
                        <input type="reset" name="clear" class="btn btn-danger btn-sm"  value="Clear">
                    </form>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>


