<!DOCTYPE html>
<?php $con=mysqli_connect( "localhost", "root", "<pass-word>", "cs"); if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); } ?>
<html>

<head>
    <meta charset='UTF-8'>

    <title>cs database</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->

    <!--[if !IE]><!-->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font: 14px/1.4 Georgia, Serif;
        }
        #page-wrap {
            margin: 50px;
        }
        p {
            margin: 20px 0;
        }
        /* 
	Generic Styling, for Desktops/Laptops 
	*/
        
        table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 100%;
        }
    }
    /* Zebra striping */
    
    
    th {
        background: #333;
        color: white;
        font-weight: bold;
    }
    td,
    th {
        padding: 6px;
        border: 1px solid #ccc;
        text-align: left;
    }
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {
        /* Force table to not be like tables anymore */
        
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }
        /* Hide table headers (but not display: none;, for accessibility) */
        
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr {
            border: 1px solid #ccc;
        }
        td {
            /* Behave  like a "row" */
            
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }
        td:before {
            /* Now like a table header */
            
            position: absolute;
            /* Top/left values mimic padding */
            
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }
    }
    /* Smartphones (portrait and landscape) ----------- */
    
    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
        body {
            padding: 0;
            margin: 0;
            width: 320px;
        }
    }
    /* iPads (portrait and landscape) ----------- */
    
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        body {
            width: 495px;
        }
    }
    </style>
    <!--<![endif]-->

</head>
<body>
   <div id="page-wrap">
        <h1>Members Register in cs</h1>
        <?php $sql="SELECT * FROM `cs`" ; ?>
        <table>

            <thead>
                <tr>
                    <?php if ($result=mysqli_query($con,$sql)) { $count=0; $button=- 1; // Get field information for all fields while ($fieldinfo=mysqli_fetch_field($result)) { $count++; ?>
                    <th>
                        <?php $name=$ fieldinfo->name; printf("%s\n",$name); if($name == "file_path") { $button=$count; } ?>

                    </th>
                    <?php } // Free result set $n=$count; mysqli_free_result($result); } ?>
                </tr>
            </thead>
            <tbody>
                <?php $sql="SELECT * FROM `cs`" ; $result=mysqli_query($con,$sql); $fieldinfo=mysqli_fetch_field($result); while($row=mysqli_fetch_array($result)) { ?>
                <tr>
                    <?php $count=0; while($count !=$ n) { ?>
                    <td>
                        <?php if($count==$ button-1) { ?>
                        <form method="get" action="/<?php echo $row[$count]; ?>">
                            <button type="submit">Download!</button>
                        </form>
                        </form>
                        <?php } else echo $row[$count];?>
                    </td>
                    <?php $count++; } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php mysqli_close($con); ?>
    </div>
</body>

</html>