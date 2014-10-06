<?php

class Custom_Color{
    
    
    function color($data){
        if($data){
           return  "<h1 style='color:red;'>".$data."</h1>"; 
        }else{
           return null; 
            
        }
        
        
    }
    
    
}