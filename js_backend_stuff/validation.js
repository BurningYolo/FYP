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
    var category = document.getElementById("category").value
    var address = document.getElementById("address").value 
    var location = document.getElementById("location").value 
    var description = document.getElementById("description").value 
    var starting_price = document.getElementById("starting_price").value 
    var goal_price = document.getElementById("goal_price").value 
    var ending_time = document.getElementById("ending_time").value 
    back_to_normal() 
    console.log(name) 
    if(name.length<=3)
    {
        document.getElementById("name_error").innerHTML = "(Enter a Valid Username)";
        document.getElementById("name").style.border = "solid 1px red" 

        
    }
    
    console.log(category)
    
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
    if(category=="base")

    {
        document.getElementById("category_error").innerHTML = "(Please Choose a Category)";
        document.getElementById("category").style.border = "solid 1px red"
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
    document.getElementById("category_error").innerHTML = " ";
    document.getElementById("category").style.border = "solid 1px silver"
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
}


