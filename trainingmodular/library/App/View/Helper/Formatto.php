<?php

/* User Defined Custom View Helper */

class App_View_Helper_Formatto

{
    
    
    function formatto($data){
        if($data){
           return  "<h5 style='color:blue;'>".$data."</h5>"; 
        }else{
           return null; 
            
        }
        
        
    }
    
    
}
