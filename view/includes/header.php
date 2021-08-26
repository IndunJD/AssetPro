<style>
    .header{
        display: grid;
        grid-template-columns: 7fr 0.5fr 2fr 0.5fr ;
        height: 12vh;
        border-left: 4px solid #F1F4FF;
    }
    .header >div{
        border: 0px solid green;
    }
    #notificationIcon > img{
        height: 30px;
        width: 30px;
    }
    #notificationIcon{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    #notificationIcon:hover{
        cursor: pointer;
    }
    #userSection{
        display: grid;
        grid-template-columns: 7fr 3fr;
        
        

    }
    #userSection > div{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: right;
        width: 100%;
    }
    #userSection img{
        width: 75px;
        height: 75px;
        border-radius: 50%;
    }
    #username{
        font-size: 20px;
    }
    
</style>

<div class="header">
    <div>
        
    </div>
    <div id="notificationIcon">
        <img src="../../Images/Notification.png" alt="">
    </div>
    <div id="userSection">
        <div id="username">Rocell Bathware</div>
        <div>
            <img src="../../Images/profile.jpg" alt="">
        </div>
    </div>
    <div></div>
</div>
<?php
    include_once("notification.php")
?>



<script>
    var icon = document.getElementById("notificationIcon");
    icon.addEventListener("click",e =>{
        var notification = document.querySelector(".notificationContainer");
        if(notification.style.display ==="none"){
            notification.style.display = "grid";
        }else{
            notification.style.display= "none";
        }
    })
</script>