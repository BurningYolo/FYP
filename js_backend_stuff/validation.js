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
    var name = document.getElementById("name").value 
    console.log(name) 
    var category = document.getElementById("category").value
    console.log(category)
    var location = document.getElementById("location").value 
    console.log(location)
    var address = document.getElementById("address").value 
    console.log(address)
    var description = document.getElementById("description").value 
    console.log(description)
    var starting_price = document.getElementById("starting_price").value 
    console.log(starting_price)
    var goal_price = document.getElementById("goal_price").value 
    console.log(goal_price)
    var ending_time = document.getElementById("ending_time").value 
    console.log(ending_time)
    var i = 0 
    
    var head1 = document.getElementById("heading1")
    if(head1)
    {
         var heading1 = document.getElementById("heading1").value 
         console.log(heading1)
         var detail1 = document.getElementById("detail1").value 
         console.log(detail1)
         var head2 = document.getElementById("heading2")

         if(head2)
         {
             var heading2 = document.getElementById("heading2").value 
            console.log(heading2)
            var detail2 = document.getElementById("detail2").value 
            console.log(detail2)
            var head3 = document.getElementById("heading3")
            if(head3)
            {
                var heading3 = document.getElementById("heading3").value 
                console.log(heading3)
                var detail3 = document.getElementById("detail3").value 
                console.log(detail3)
                var head4 = document.getElementById("heading4")
                if(head4)
                {
                    var heading4 = document.getElementById("heading4").value 
                    console.log(heading4)
                    var detail4 = document.getElementById("detail4").value 
                    console.log(detail4)

                }




            }



         }
    }
    
  
   
    return false 



    



}