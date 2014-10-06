<?php
/* User Defined Custom View Helper */

class App_View_Helper_Format{
    
    
    function format($data){
        if($data){
           return  "<h1>".$data."</h1>"; 
        }else{
           return null; 
            
        }
        
        
    }
    
    
}