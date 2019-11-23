var getUrl = window.location;
const baseUrl = getUrl.origin + '/' +getUrl.pathname.split('/')[1]; 

$(document).ready(function () {
    

    var key = $("#key").val();
    grecaptcha.ready(function() {
        grecaptcha.execute(key, {action: 'homepage'}).then(function(token) {
            // console.log(token);
            document.getElementById("token").value = token;
        });
    });
    


});

$(".login-button").on("click", function (e) { 
    e.preventDefault();
    var key = $("#key").val();
    grecaptcha.ready(function() {
        grecaptcha.execute(key, {action: 'homepage'}).then(function(token) {
        //console.log(token);
        document.getElementById("token").value = token;
        });
    });
    
    $(".login-response").empty();
    var username = $(".username").val();
    var password = $(".password").val();
    var token = $("#token").val(); 
    if(username === "" && password === ""){
        $(".login-response").html("<span class='text-warning'>fields cannot be empty</span>");
    }
    else if(username === ""){
        $(".login-response").html("<span class='text-warning'>username cannot be empty</span>");
    }
    else if(password === ""){
        $(".login-response").html("<span class='text-warning'>password cannot be empty</span>");
    }
    else{
        
        $(".login-button").attr("disabled", true);
        $(".login-button").html("<i class='fa fa-circle-o-notch fa-spin'></i> Validating");

        $.ajax({
            type: "post",
            url: baseUrl+"/admin/login",
            data: {
                username: username,
                password: password,
                token: token
            },
            dataType: "json",
            success: function (response) {
                
                if(response.data === "incorrect" && response.status === false){
                    $(".login-button").attr("disabled", false);
                    $(".login-button").html("Log-in");
                    
                    $('.login-response').html('<span class="text-center text-danger">Incorrect Credentials</span>');
                }
                
                else if(response.data === "correct" && response.status === true){

                    $(".muqi-icon").attr("src", baseUrl+"/assets/global/img/icon_purple.svg");
                    $(".login-button").attr("disabled", true);
                    $(".login-button").html("<i class='fa fa-circle-o-notch fa-spin'></i> Logging-in");

                    setTimeout(function() {
                        $(location).attr('href', baseUrl+"/admin/dashboard");
                    }, 1700);
                }
                else if(response.data === "bot" && response.status === false){
                    $(".login-button").attr("disabled", false);
                    $(".login-button").html("Log-in");
                    $('.login-response').html('<span class="text-warning">You are suspicious!</span>');

                }
                else if(response.data === "error" && response.status === false){
                    
                    $(".login-button").attr("disabled", false);
                    $(".login-button").html("Log-in");
                    $('.login-response').html('<span class="text-danger">An Error has Occurred!</span>');
                    
                }
                else{
                    console.log(response);
                    $(".login-button").attr("disabled", false);
                    $(".login-button").html("Log-in");
                    $('.login-response').html('<div class="text-center"><span class="text-danger">'+response.data+'</span></div>');
                    
                }
                console.log(response);
                $(".login-button").attr("disabled", false);
            },
            failed:function(response) {
                $(".login-button").attr("disabled", false);
                $(".login-button").html("Log-in");
 

                console.log("Error: "+response);
            }
        });
    }
});