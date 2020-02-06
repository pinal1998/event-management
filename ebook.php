<?php
include "connection.php";
include "css.php";
session_start();
//$de="delete from ebooking where cus_id='$cid'";
//$dex=$con->query($de);

include "uheader.php";
if (isset($_REQUEST['ebook']))
{
    $eid=$_REQUEST['event_id'];
    $cateid=$_REQUEST['cate_name'];
    $cid= $_SESSION['sessionuser'];
    $decoid=$_REQUEST['deco_name'];
    $placeid=$_REQUEST['place_name'];
    $p=$_REQUEST['person'];
    $t=$_REQUEST['total'];
    $fd=$_REQUEST['first_date'];
    $ld=$_REQUEST['second_date'];
   // $bprice=$_REQUEST['book_price'];

    $ins="insert into ebooking (cus_id,e_id,cate_id,deco_id,place_id,person,total,first_date,last_date)
                      values('$cid','$eid','$cateid','$decoid','$placeid','$p','$t','$fd','$ld')";
    //echo $ins;exit;
    $ex=$con->query($ins);
    if($ex)
    {
        ?>
        <script type="text/javascript">
            alert("booking added");
            window.location.href="event_booking.php";
        </script> <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert("not");
        </script>
        <?php
    }

}
?>
        <div class="sufee-login d-flex align-content-center flex-wrap" style="margin-top:300px;margin-left: 10%; margin-right: 10%; background-color: grey">
        <div class="container">
            <div class="login-content" >
                <h1>ADD BOOKING</h1><br>

                <div class="login-form">
                <?php 
                 if(isset($_REQUEST['ebid']))
                {
                    $id=$_REQUEST['ebid'];
                    $sel="select * from event where e_id=$id";
                    $ex=$con->query($sel);
                    $rec=$ex->fetch_object();
                  //  print_r($rec);exit;
                }
                ?>

                    <form method="post" enctype="multipart/form-data" style="margin-top: 50px; margin-left: 50px;">
                     <div class="input-group">
                        <input type="text" name="event" value="<?php echo $rec->e_name;?>" class="form-control">
                        <input type="hidden" name="event_id" value="<?php echo $rec->e_id;?>">
                    </div>
                   
                    <div class="input-group">
                    <select class="form-control" name="cate_name" onchange="getprice(this.value)">
                        <option>choose your catering</option>
                        <?php
                        $sel="select * from catering";
                        $ex=$con->query($sel);
                        $total=0;
                        while ($recode=$ex->fetch_object()) {
                           // print_r($recode);exit;
                            ?>
                            <option value="<?php echo $recode->cate_id;?>"><?php echo $recode->cate_name;?> </option>
                            <?php 
                            $final=$total+$recode->cate_price;
                        }
                            ?>
                        }
                    </select>
                    <br>
                        
                    </div>
                    <div class="input-group" id="priceid">
                    </div>    
                    
                    <br>


                    <div class="input-group">
                    <select class="form-control" name="deco_name" >
                        <option>choose your decoration</option>
                        <?php
                        $sel="select * from decoration";
                        $ex=$con->query($sel);
                        while($recode=$ex->fetch_object()) {
                            ?>
                            <option value="<?php echo $recode->deco_id;?>"><?php echo $recode->deco_name;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Price: <?php echo $recode->deco_price;?></option>
                            <?php }
                            ?>
                        }
                    </select>
                    </div>
    
                      
                    <div class="input-group">
                    <select class="form-control" name="place_name">
                        <option>choose your place</option>
                        <?php
                        $sel="select * from place";
                        $ex=$con->query($sel);
                        while ($recode=$ex->fetch_object()) {
                            ?>
                            <option value="<?php echo $recode->place_id;?>"><?php echo $recode->place_name;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Price: <?php echo $recode->place_price;?></option>
                            <?php }
                            ?>
                        }
                    </select>
                    </div>
                    <div class="input-group">
                    <label>No Of. person</label>
                        <input type="text" name="person" class="form-control" id="person">
                    </div>    
                      <div class="input-group">
                    <label>Total Dish Price with number of person</label>
                        <input type="text" name="total" class="form-control" onfocus="gettotaldish()" id="persontotal">
                    </div>    
                  
                    <div class="input-group">
                    <label>Starting Date</label>
                        <input type="date" name="first_date" class="form-control">
                    </div>    
                      
                    <div class="input-group">
                    <label>Ending Date</label>
                        <input type="date" name="second_date" class="form-control">
                    </div>    
                    
                        <div class="input-group">
                            <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="ebook" value="ADD booking">
                        <br>
                        <br>
                        <input type="reset" name="clear" class="btn btn-danger btn-sm"  value="Clear">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function getprice(catid)
    {
      // alert(catid);
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("priceid").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ebook_get_price.php?catid="+catid, true);
        xmlhttp.send();
    
    }
    function gettotaldish()
    {
        var dish=document.getElementById('dish_price').value;
        var person=document.getElementById('person').value;
        var t=dish*person;
        document.getElementById('persontotal').value=t;
    }
</script>
