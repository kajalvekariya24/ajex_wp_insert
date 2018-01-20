<?php
include('config.php');

$item_per_page      = 3; //item to display per page


//Get page number from Ajax
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}

//get total number of records from database
$results = mysql_query("SELECT COUNT(*) FROM employee");
$row = mysql_fetch_row($results); 
$get_total_rows = $row[0];  
//break records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page);

//position of records
$page_position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 
$results = mysql_query("SELECT * FROM employee ORDER BY id ASC LIMIT $page_position, $item_per_page");
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>id</th>  
<th>First_name</th>
<th>last_name</th>
<th>job_title</th>
<th>salary</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysql_fetch_assoc($results)) {  
?>  
            <tr>  
            <td><?php echo $row["id"]; ?></td>  
            <td><?php echo $row["first_name"]; ?></td>  
			<td><?php echo $row["last_name"]; ?></td>  
			<td><?php echo $row["job_title"]; ?></td>  
			<td><?php echo $row["salary"]; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>
<?php
echo '<div align="center">';
// To generate links, we call the pagination function here. 
echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
echo '</div>';

function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active"><a href="#">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active"><a href="#">'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><a href="#">'.$current_page.'</a></li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}