function login_validation() 
{

}

function signup_validation()
{
    var username= document.getElementById("username").value ; 
    var usernamelength = username.length ; 
    var email = document.getElementById("email").value ; 
    var password = document.getElementById("password").value ; 
    var repassword = document.getElementById("confirm_password").value ; 
    var passwordlength = password.length ; 
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    document.getElementById("username_error").innerHTML = " ";
    document.getElementById("email_error").innerHTML = " ";
    document.getElementById("password_error").innerHTML = " ";
    document.getElementById("username_error").innerHTML = " ";

    if(usernamelength <= 3 ) 
    {
        console.log("Username Length should be more than 3 Characters") ; 
        document.getElementById("username").focus() ;
        document.getElementById("username_error").innerHTML = "(Enter a Valid Username)";
        document.getElementById("username").style.border = "solid 1px red"; 
        return false; 
    }
    if(email.match(mailformat))
    {
        console.log("good") 
        
    
    }
    else
    {
        console.log("bad")
        document.getElementById("email").focus() ;
        document.getElementById("email_error").innerHTML = "(Enter a Valid Email Address)";
        document.getElementById("email").style.border = "solid 1px red"; 
        return false; 
     
    
    }
    if(passwordlength <= 6) 
    {
        console.log("passwordlength too low"); 
        document.getElementById("password").focus() ;
        document.getElementById("password_error").innerHTML = "(Password too weak)";
        document.getElementById("password").style.border = "solid 1px red"; 
        
        return false; 
       
    }

    if(password != repassword)
    {
        console.log("password doesen't match") 
        document.getElementById("password_error").innerHTML = "(Password dosen't match)";
        document.getElementById("password").focus() ;
        return false ; 
    }
    

    

}

function update_profile_validation()
{
    var username = document.getElementById("username").value; 
    var email = document.getElementById("email").value; 
    var mobile = document.getElementById("mobile").value ;  
    var mobilelength = mobile.length; 
    var usernamelength = username.length; 
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    document.getElementById("username_error").innerHTML = " ";
    document.getElementById("email_error").innerHTML = " ";
    document.getElementById("mobile_error").innerHTML = " ";
    document.getElementById("username").style.border = "solid 1px green"; 
    document.getElementById("email").style.border = "solid 1px green"; 
    document.getElementById("mobile").style.border = "solid 1px green"; 
    if(usernamelength <= 3 ) 
    {
        console.log("Username Length should be more than 3 Characters") ; 
        document.getElementById("username_error").innerHTML = "(Enter a Valid Username)";
        document.getElementById("username").style.border = "solid 1px red"; 
        return false; 
    }
    if(email.match(mailformat))
    {
        console.log("good") 
        
    
    }
    else
    {
        console.log("bad") 
        document.getElementById("email").focus() ;
        document.getElementById("email_error").innerHTML = "(Enter a Valid Email Address)";
        document.getElementById("email").style.border = "solid 1px red"; 
        return false; 
    }
    if(mobilelength <= 10 )
    {
        console.log("mobile length error") 
        document.getElementById("mobile").focus() ;
        document.getElementById("mobile_error").innerHTML = "(Enter a Valid Email Address)";
        document.getElementById("mobile").style.border = "solid 1px red"; 
        return false; 

    }


}







function product_register_validation()
{
    var check = true
    var name = document.getElementById("name").value 
    console.log(name)
   
    var address = document.getElementById("address").value 
    var location = document.getElementById("location").value 
    var description = document.getElementById("description").value 
    var starting_price = document.getElementById("starting_price").value 
    var goal_price = document.getElementById("goal_price").value 
    var ending_time = document.getElementById("ending_time").value 
    console.log(name) 
    if(name.length<=3)
    {
        document.getElementById("name_error").innerHTML = "(Enter a Valid Username)";
        document.getElementById("name").style.border = "solid 1px red" 

        
    }
    
    
    // console.log(location)
    if(location.length<=3)
    {
        document.getElementById("location_error").innerHTML = "(Enter a Valid Location)";
        document.getElementById("location").style.border = "solid 1px red"
        check = false

    }

    
    console.log(address)
    if(address.length<=3)
    {
        document.getElementById("address_error").innerHTML = "(Enter a Valid Address)";
        document.getElementById("address").style.border = "solid 1px red"
        check = false
    }

    
    console.log(description)
    if(description.length<=3)
    {
        document.getElementById("description_error").innerHTML = "(Enter a Valid Description)";
        document.getElementById("description").style.border = "solid 1px red"
        check = false
    }
  
    console.log(starting_price)

   
    console.log(goal_price)
    if(starting_price >= goal_price)
    {
        document.getElementById("starting_price_error").innerHTML = "(Starting Price is not Valid )";
        document.getElementById("starting_price").style.border = "solid 1px red"
        check = false
    }
   
  
    var today=todays_date_formatting() 
    var days= calculate_difference(today,ending_time)

    if(days<10)
    {
        document.getElementById("ending_time_error").innerHTML = "(Should be minimum of 10 days)";
        document.getElementById("ending_time").style.border = "solid 1px red"
        check = false
    }
    
     if(today>=ending_time)
     {
        document.getElementById("ending_time_error").innerHTML = "(Please Enter Valid Date)";
        document.getElementById("ending_time").style.border = "solid 1px red"
        check = false
     }

    






    return check
    
}

function place_bid_validation(starting_price)
{
    console.log(starting_price)
    var paypal = 0 
    var credit_card = 0 
    var bank  = 0 
    var check = 0 
    document.getElementById("id_error").hidden=true; 
    document.getElementById("bid_amount_error").hidden = true 
    user_id=document.getElementById("user_id").value
    product_id=document.getElementById("product_id").value
    product_user_id=document.getElementById("product_user_id").value
    bid=document.getElementById("bid_amount").value
    if(document.getElementById("paypal1").checked == true)
    {
        var paypal = 1 
    }
    if(document.getElementById("credit_card1").checked == true)
    {
        var credit_card = 1 
    }
    if(document.getElementById("bank1").checked == true)
    {
        var bank = 1 
    }
    if(user_id == product_user_id) 
    {
        document.getElementById("id_error").hidden=false; 
        check ++
        
    }
    if(bid <= starting_price)
    {
        document.getElementById("bid_amount_error").hidden=false ; 
        check ++ 
    }

    if(check != 0 )
    {
        return false
    }
    else if(check == 0 )
    {
        return true 
    }

    

}



function product_update_validation()
{
    var check = true
    
    var name = document.getElementById("name").value 
    var address = document.getElementById("address").value
    var location = document.getElementById("location").value
    var description = document.getElementById("description").value 
     var starting_price = document.getElementById("starting_price").value 
     var goal_price = document.getElementById("goal_price").value 
     var ending_time = document.getElementById("ending_time").value 

     var start = parseInt(starting_price);
     var goal = parseInt(goal_price)
    console.log(address , name ,location , description , starting_price , goal_price , ending_time) 
    back_to_normal()
   
    if(name.length<=3)
    {
        document.getElementById("name_error").innerHTML = "(Enter a Valid productname)";
        document.getElementById("name").style.border = "solid 1px red" 
        check= false 

        
    }
    
    console.log(location)
    if(location.length<=3)
    {
        document.getElementById("location_error").innerHTML = "(Enter a Valid Location)";
        document.getElementById("location").style.border = "solid 1px red"
        check = false

    }

    
    console.log(address)
    if(address.length<=3)
    {
        document.getElementById("address_error").innerHTML = "(Enter a Valid Address)";
        document.getElementById("address").style.border = "solid 1px red"
        check = false
    }

    
    console.log(description)
    if(description.length<=3)
    {
        document.getElementById("description_error").innerHTML = "(Enter a Valid Description)";
        document.getElementById("description").style.border = "solid 1px red"
        check = false
    }
  
    console.log(starting_price)

   
    console.log(goal_price)
    if(start > goal)
    {
        document.getElementById("starting_price_error").innerHTML = "(Starting Price is not Valid )";
        document.getElementById("starting_price").style.border = "solid 1px red"
        check = false
    }
   
    

  return check  

    
    }



    












function todays_date_formatting()
{
    const today = new Date();
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();
    
    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;
    
    var formattedToday = yyyy + '-' + mm + '-' + dd   ;

    return formattedToday

}

function calculate_difference( formattedToday , ending_time)
{
    var date1 = new Date(formattedToday);
    var date2 = new Date(ending_time);
  

var Difference_In_Time = date2.getTime() - date1.getTime();
  

var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

return Difference_In_Days
  


}

function back_to_normal()
{
    document.getElementById("name_error").innerHTML = " ";
    document.getElementById("name").style.border = "solid 1px silver"
    document.getElementById("location_error").innerHTML = " ";
    document.getElementById("location").style.border = "solid 1px silver"
    document.getElementById("address_error").innerHTML = " ";
    document.getElementById("address").style.border = "solid 1px silver"
    document.getElementById("description_error").innerHTML = " ";
    document.getElementById("description").style.border = "solid 1px silver"
    document.getElementById("starting_price_error").innerHTML = " ";
    document.getElementById("starting_price").style.border = "solid 1px silver"
    document.getElementById("goal_price_error").innerHTML = " ";
    document.getElementById("goal_price").style.border = "solid 1px silver"
    document.getElementById("ending_time_error").innerHTML = " ";
 
    document.getElementById("ending_time").style.border = "solid 1px silver"

    return false ; 
}


