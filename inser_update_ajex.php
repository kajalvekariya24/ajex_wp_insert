account.php
fresh data 

<?php $userId = get_current_user_id();?>
								<ul class="social_icn">
									<li>
										 <?php echo get_user_meta($userId,'name',true); ?>  
									</li>
									<li>
										<?php echo get_user_meta($userId,'city',true); ?> 
									</li>
									<li>
										 <?php echo get_user_meta($userId,'number',true); ?> 
									</li>
									 
								</ul>






<script type="text/javascript" src="<?php echo get_template_directory_uri().'/assets/css/alert/alert.js' ?>"></script>
<script type="text/javascript">
    function printVehicleDetails(url) {
       var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
        printWindow.addEventListener('load', function(){
            printWindow.print();
            printWindow.close();
        }, true);
    }
$(document).ready(function(){
//info 
$('form#infod').submit(function(e){
            e.preventDefault();
            
        var name = $("input[name=name]").val();
        var city = $("input[name=city]").val();
        var number = $("input[name=number]").val();

      $.ajax({
                type:'POST',
                dataType: "json",
                data:{
                    action:'addinfo',
                    name:name,
                    city:city,
                    number:number,
                     
                },
                url:ajaxurl,
                beforeSend:function(){
                    $.alert("Please wait while we are updating your information",{
                        autoClose: true,
                        type: 'info',
                        position: ['top-right'],
                        isOnly: true,
                    });
                },
                success:function(response){
                    if(response == '1' || response == 1){
                        $.alert("Successfully updated.",{
                            autoClose: true,
                            type: 'success',
                            position: ['top-right'],
                            isOnly: true,
                        });
                    }     
                }
            });

});
 
//


}
</script>
===============
function.php
================

short code create
function infodet()
 {

  $userId = get_current_user_id();
    ?>
    
<form method="post" id="infod">
  <div class="row">


  <div class="col-sm-12">
  <div class="form-group">
  <label>name:</label><span> <input type="text" name="name" value="<?php echo get_user_meta($userId,'name',true); ?> " class="form-control"></span>
 </div>
  </div>

  <div class="col-sm-12">
  <div class="form-group">
          <label>city:</label><span> <input type="text" name="city" value=" <?php echo get_user_meta($userId,'city',true);?>" class="form-control"></span>
        </div>
  </div>
    <div class="col-sm-12">
  <div class="form-group">
          <label>number:</label><span> <input type="text" name="number" value=" <?php echo get_user_meta($userId,'number',true); ?> " class="form-control" ></span>
        </div>
  </div>
   
 <div class="form-group">
        <input type="submit" name="submit" value="Submit"> 
  </div>

</div>
</form>
<?php
 }
add_shortcode( 'infodet', 'infodet' );



================
function addinfo()
{
   global $current_user;
      get_currentuserinfo();
      $userId = get_current_user_id();
   
    $name=$_POST['name'];
    $city=$_POST['city'];
    $number=$_POST['number'];

   $getUserMetaname = get_user_meta($userId,'name',true);
   if(empty($getUserMetaname)){
            $name = add_user_meta($userId,'name',$name);
      } else {
            $name = update_user_meta($userId,'name',$name);
      }
   $getUserMetacity = get_user_meta($userId,'city',true);
   if(empty($getUserMetacity)){
            $city = add_user_meta($userId,'city',$city);
      } else {
            $city = update_user_meta($userId,'city',$city);
      }
   $getUserMetanumber = get_user_meta($userId,'number',true);
   if(empty($getUserMetanumber)){
            $number = add_user_meta($userId,'number',$number);
      } else {
            $number = update_user_meta($userId,'number',$number);
      }

}
add_action('wp_ajax_addinfo', 'addinfo');
add_action('wp_ajax_nopriv_addinfo', 'addinfo');


