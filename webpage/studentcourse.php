 <?php  
	require_once('connect-db.php');
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Fetch Data from Two or more Table Join using PHP and MySql</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Fetch Data from Two or more Table Join using PHP and MySql</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Brand Name</th>  
                               <th>Product Name</th>  
                          </tr>  
                          <?php  
						  $query = mysql_query("SELECT product.product_name,brand.brand_name FROM product INNER JOIN brand ON product.brand_id = brand.brand_id ORDER BY product.product_id DESC"); 
                          if($query && mysql_num_rows($query)>0)  
                          {  
                               while($row = mysql_fetch_array($query))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["brand_name"];?></td>  
                               <td><?php echo $row["product_name"]; ?></td>  
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html> 