<?php

    require_once 'connection.php';


    $limit_per_page = 3;

    $page = "";
    $output  = "";

    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 1;
    }

    $offset = ($page - 1) * $limit_per_page;

    $sql = "SELECT * FROM student LIMIT $offset, $limit_per_page";
    $result = $conn->query($sql) or die("Query Unsuccessful.");
    if($result->num_rows > 0){
        $output .= '    <table border="1" width="100%" cellpadding="10px">
                <tr>
                    <th width="100px">Id</th>
                    <th>Name</th>
                </tr>';

                while($row = $result->fetch_assoc()){
                    $output .= '<tr><td align="center">' . $row["id"] . '</td><td>' .$row["name"]. '</td></tr>';
                }
                $output .= "</table>";

                $sql_total = "SELECT * FROM student";
                $records = $conn->query($sql_total) or die("Query Unsuccessful.");
                $total_record = $records->num_rows;
                $total_pages = ceil($total_record/$limit_per_page);
                echo $total_record;
                $output .= '<div id="pagination">';

                for($i=1; $i <= $total_pages;$i++){
                    if($i == $page){
                        $class_name = "active";
                    }else{
                        $class_name = "";
                    }
                    $output .= '<a href="#" class="'.$class_name.'" id="'.$i.'">'.$i.'</a>';
                }
                $output .= '</div>';
                echo $output;
    }else{
        echo "<h2> No Record Found.</h2>";
    }
?>