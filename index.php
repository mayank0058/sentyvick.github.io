<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>home</title>
<link rel="stylesheet" href="style1.css">
 </head>
<body  vlink="white">
<div class="bgimage">
     <div class="nav-bar">
	 <div class="leftmenu">
    	 <h3>HELTHCARE & LOGISTIC</h3>
		 </div>
		 
        
         <div class="menu-right" >
             <span onClick="myFunction()">&#9776;</span>
             <ul id="menu" >
		    <li id="flist">Home</li>
		    <li><a href="m-login.php" class="text-light" >manager</a></li>
		    <li><a href="t-login.php" class="text-light">Technician</a></li>
		    <li><a href="u-login.php" class="text-light">user</a></li>
		  </ul>
         </div>
     
    
     </div>   
    
    <script>
        function myFunction(){
           var x = document.getElementById("menu"); 
            
            if(x.style.display == "block")
            {
                x.style.display = "none";
            }
            else{
                x.style.display = "block";
            }
        }
    </script>
	</div>
</body>
</html>






