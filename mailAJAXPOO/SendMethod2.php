<?php  

function sendEmail2 ($client,$sujet,$message)  {
    
        if(mail($client,$sujet,$message))  {
            echo "message envoyé!";
        }
        else  {
            echo "Failed to send the message...";
        }
   
       
    
}

?>