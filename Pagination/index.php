<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <style>
        .active{
            color:blue;
        }
        a{
            color:black;
            font-size:24px;
            margin:30px;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>PHP & Ajax Pagination</h1>
        </div>

        <div id="table-data">
        
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        function loadTable(page){
            $.ajax({
                url: "ajax-pagination.php",
                type:"POST",
                data: {page_no: page},
                success: function (data){
                    $('#table-data').html(data);
                }
            });
        }

        loadTable();

        //Pagination Code
        $(document).on("click", "#pagination a",function(e){
            e.preventDefault();

            var page_id = $(this).attr("id");
            loadTable(page_id);
        })
    })
</script>
</body>
</html>