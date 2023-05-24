<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Learning Management System</title>
    <link rel="stylesheet" href="css/style.css"/>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" type="text/css" href="css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Student Testimonial Owl Slider CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/testyslider.css">


    <style>
        .flex-container .flex-item{
        
       
       
        height: 300px;
        display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("image/natu4.jpg");
              width: 350px;
              margin: 5px;
              padding: 5px;
              background-size: cover;
              background-repeat: no-repeat;
             
          }

.flex-container1 .flex-ite1{
 
 
 height: 300px;
 display: flex;
     align-items: center;
     justify-content: center;
     background-image: url("image/natu3.jpg");
       width: 350px;
       margin: 5px;
       padding: 5px;
       background-size: cover;
       background-repeat: no-repeat;

 
    
      
   }
        .div1{
background-image: url("image/natu1.jpg");
    height: 70vh;
    background-position:center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 5;
    padding: 5;
    text-align: center;
    
}

@media screen and ( max-width: 1050px) {

.education{
width: 45vw;
text-align: center;
}
.workExperience{
width: 45vw;
text-align: center;
}
.extraActi{
width:45vw;
text-align: center;
}

.academic{
width:45vw;
text-align: center;
height: 640px;
}
.research{
    width:45vw;

 text-align: center;
}


.lang1{
text-align: center;
width: 40vw;
}
.lang2{
    text-align: center;
width: 45vw;
}
.lang3{
    text-align: center;
width: 45vw;
    
}
.lang4{
    text-align: center;
width: 45vw;
    
}
.lang5{
    text-align: center;
width: 45vw;
    
}
   
.navmenu {
line-height: 50px;

 

        }
        .navnext2{
            margin-left: 10px;
    margin-right:10px ;
        }
  
        .lang1 div{
            height: 90px;
        }

        .lang2 div{
            height: 90px;
        }
        .lang3 div{
            height: 90px;
        }
        .lang4 div{
            height: 90px;
        }
        .lang5 div{
            height: 90px;
        }


        .lang1 button{
margin-bottom: 100px;
        }

        .lang2 button{
            margin-bottom: 100px;
        }

        .lang3 button{
            margin-bottom: 100px;  
        }

        .lang4 button{
            margin-bottom: 100px;  
        }
        .lang5 button{
            margin-bottom: 0px;
        }



        .academic4 button{
    margin-top: 150px;
    width: 40%;
}

.academic4 .three{
    margin-top: 5px;
}

.education{
    height: 750px;
}

.workExperience{
    height: 750px;
}

.extraActi{
    height: 750px;
}


.academic{
    height: 750px;
    margin-top: 50px;
}

.research{
    height: 750px;
    
}



}









        @media screen and ( max-width: 650px) {
     .navbar{
        flex-direction: column;
        }
        .navmenu {
            display: flex;
            flex-direction: column;
            width: 100vw;
line-height: 50px;



        }

        .navlogo{
            width: 100%;
            text-align: center;
        }
        a:hover{
            
        border:none;
        border-radius: 20px;
  
        background-color: hsl(240, 42%, 34%);
      }
    .navheading h1{
        text-align: center;
        color: blue;
        width: 100%;
      }

      .navnext{
    display: flex;
    flex-direction: column;
}
.navnext1{
  width: 100vw;
    text-align:center ;
}
.navnext2{
    width: 95vw;
    text-align:center ;
    margin-left: 30px;
    margin-right:30px ;
    
}
.lang1{
text-align: center;
width: 100vw;
}
.lang2{
    text-align: center;
width: 100vw;
}
.lang3{
    text-align: center;
width: 100vw;
    
}
.lang4{
    text-align: center;
width: 100vw;
    
}
.lang5{
    text-align: center;
width: 100vw;
    
}
.education{
    width: 90vw;
    text-align: center;
}
.workExperience{
    width: 90vw;
    text-align: center;
}
.extraActi{
    width:90vw;
    text-align: center;
}

.academic{
    width:90vw;
    text-align: center;  
}
.research{
    width:90vw;
    text-align: center;   
}


        .lang1 div{
            height: 70px;
        }

        .lang2 div{
            height: 70px;
        }
        .lang3 div{
            height: 70px;
        }
        .lang4 div{
            height: 70px;
        }
        .lang5 div{
            height: 70px;
        }


 
        .lang1 button{
            margin-top: 20px;
margin-bottom: 100px;
        }

        .lang2 button{
            margin-top: 20px;
            margin-bottom: 100px;
        }

        .lang3 button{
            margin-top: 20px;
            margin-bottom: 100px;  
        }

        .lang4 button{
            margin-top: 20px;
            margin-bottom: 100px;  
        }
        .lang5 button{
            margin-top: 20px;
            margin-bottom: 100px;
        }


        .academic4 button{
    margin-top: 5px;
    width: 100%;
}

.academic4 .three{
    margin-top: 5px;
}





      
  }

  
  @media screen and ( max-width: 350px) {

    footer{
   
    
   padding: 20px;
   text-align: center;
   margin-top: 5px;
   font-size: xx-small;

}



  }
 
    </style>
</head>
<body>
   <div class="navbar">


<div class="navlogo">
    <img src="images/logo.png" alt="" width="100px">

</div>
 <div class="navheading">
     <h1>The Outliers</h1>

 </div>
 <div class="navmenu">
   <a href="index.php" style="text-decoration: none;">Home</a> 
   
     <a href="contact.php"style="text-decoration: none;">Contact</a>
     <a href="./courses.php" style="text-decoration: none;">Courses</a>

     <?php 
              
              if (isset($_SESSION['is_login'])){
                echo ' <a href="logout.php" style="text-decoration: none;">Logout</a>
                <a href="./user/userProfile.php" style="text-decoration: none;">My Profile</a>  ';
              } else {
                echo '  <a href="" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none;">Sign Up</a>
                <a href="" data-toggle="modal" data-target="#xampleModal" style="text-decoration: none;">Log In</a> ';
              }
          ?> 
    
     

 </div>


   </div> 