$(document).ready(function () { 

    
    
    executeFunctions[0,1,2,3];

    
    var key = $("#key").val();
    grecaptcha.ready(function() {
        grecaptcha.execute(key, {action: 'homepage'}).then(function(token) {
            // console.log(token);
            document.getElementById("token").value = token;
        });
    });
    

});


var getUrl = window.location;
const baseUrl = getUrl.origin + '/' +getUrl.pathname.split('/')[1]; 


$("#login-button").on('click', function(e){
    e.preventDefault();

    var key = $("#key").val();

    $("#login-button").attr("disabled", true);
    $("#login-button").html("<i class='fa fa-circle-o-notch fa-spin'></i> Validating");
 
    grecaptcha.ready(function() {
        grecaptcha.execute(key, {action: 'homepage'}).then(function(token) {
        // console.log(token);
        document.getElementById("token").value = token;
        });
    });
 
   

    var username = $(".username").val();  
    var password = $(".password").val(); 
    var token = $("#token").val(); 

    if(username == "" || username == null && password == "" || password == null){
        $('.login-result').html('<div class="text-center"><span class="text-warning">Fields cannot be empty</span></div>');
        $(".username").focus();
        
         $("#login-button").attr("disabled", false);
         $("#login-button").html("Log-in");
 
    }
    else if(password == "" || password ==  null){
        $('.login-result').html('<div class="text-center"><span class="text-warning">Password cannot be empty</span></div>');
        $(".password").focus();
        
        $("#login-button").attr("disabled", false);
        $("#login-button").html("Log-in");
    }
    else if(username == null && username == null ){
        $('.login-result').html('<div class="text-center"><span class="text-warning">Fields cannot be empty</span></div>');
        $(".username").focus();
        
        $("#login-button").attr("disabled", false);
        $("#login-button").html("Log-in");
    }
    else{
        $("#login-button").attr("disabled", true);
        $("#login-button").html("<i class='fa fa-circle-o-notch fa-spin'></i> Validating");
 
        
        $('.login-result').html('<div class="text-center"></div>');
        $.ajax({
            type: 'post',
            url: baseUrl+"/inspector/login",
            data: {
                username:username,
                password:password,
                token:token,
            },
            dataType: 'json',
            success:function(response) {
                if(response.data === "incorrect" && response.status === false){
                    initReplace(username, password, response.status);
                    $("#login-button").attr("disabled", false);
                    $("#login-button").html("Log-in");
                    
                    $('.login-result').html('<span class="text-center text-danger">Incorrect Credentials</span>');
                }
                
                else if(response.data === "correct" && response.status === true){

                   
                    initReplace(username, password, response.status);

                    $("#login-button").attr("disabled", true);
                    $("#login-button").html("<i class='fa fa-circle-o-notch fa-spin'></i> Logging-in");

                    setTimeout(function() {
                        $(location).attr('href', baseUrl+"/inspector/dashboard");
                    }, 1000);
                }
                else if(response.data === "bot" && response.status === false){
                    $("#login-button").attr("disabled", false);
                    $("#login-button").html("Log-in");
                    $('.login-result').html('<div class="text-center"><span class="text-warning">You are suspicious!</span></div>');

                }
                else if(response.data === "error" && response.status === false){
                    
                    $("#login-button").attr("disabled", false);
                    $("#login-button").html("Log-in");
                    $('.login-result').html('<div class="text-center"><span class="text-danger">An Error has Occurred!</span></div>');
                    
                }
                else{
                    console.log(response);
                    $("#login-button").attr("disabled", false);
                    $("#login-button").html("Log-in");
                    $('.login-result').html('<div class="text-center"><span class="text-danger">'+response.data+'</span></div>');
                    
                }
                console.log(response);
                
            $("#login-button").attr("disabled", false);
            },
            failed:function(response) {
                $("#login-button").attr("disabled", false);
                $("#login-button").html("Log-in");
 

                console.log("Error: "+response);

            }
        })
    }

});


function initReplace($username, $password, $status){


    if($status === true){
        $(".input-username").replaceWith(''+
        '<div class="input-group input-username">'+
            '<span class="input-group-addon">'+
                '<i class="material-icons">face</i>'+
            '</span>'+
            '<div class="form-group label-floating has-success">'+
                '<label for="username" class="control-label">username'+
                '</label>'+
                '<input name="username" type="text" value="'+$username+'" class="form-control username" disabled>'+
                '<span class="form-control-feedback">'+
                    '<i class="material-icons">done</i>'+
                '</span>'+
            '</div>'+
        '</div>'+
        '');

        $(".input-password").replaceWith(''+
        '<div class="input-group input-password">'+
            '<span class="input-group-addon">'+
                '<i class="material-icons">lock_outline</i>'+
            '</span>'+
            '<div class="form-group label-floating has-success">'+
                '<label for="password" class="control-label">Password'+
                '</label>'+
                '<input name="password" type="password" value="'+$password+'" class="form-control password" disabled>'+
                '<span class="form-control-feedback">'+
                    '<i class="material-icons">done</i>'+
                '</span>'+
            '</div>'+
        '</div>'+
        '');
    }
    else if($status === false){
        $(".input-username").replaceWith(''+
        '<div class="input-group input-username">'+
            '<span class="input-group-addon">'+
                '<i class="material-icons">face</i>'+
            '</span>'+
            '<div class="form-group label-floating has-error">'+
                '<label for="email" class="control-label">username'+
                '</label>'+
                '<input name="email" type="text" value="'+$username+'" class="form-control username">'+
                '<span class="form-control-feedback">'+
                    '<i class="material-icons">error_outline</i>'+
                '</span>'+
            '</div>'+
        '</div>'+
        '');

        $(".input-password").replaceWith(''+
        '<div class="input-group input-password">'+
            '<span class="input-group-addon">'+
                '<i class="material-icons">lock_outline</i>'+
            '</span>'+
            '<div class="form-group label-floating has-error">'+
                '<label for="password" class="control-label">Password'+
                '</label>'+
                '<input name="password" type="password" value="'+$password+'" class="form-control password">'+
                '<span class="form-control-feedback">'+
                    '<i class="material-icons">error_outline</i>'+
                '</span>'+
            '</div>'+
        '</div>'+
        '');
    }
    

}





const executeFunctions = [

    initLoginTextAnim(),
    initFitText(".title-greet", 1.2, '50px', '20px'),
    initFitText(".title-desc", 1.2, '30px', '6vw'),
    initValidate()
];

function validateusername($username) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String($username).toLowerCase());
}

function initFitText($class/*example: .header-text*/, $aggression/*example: 0.8*/, $maxSize/*example:20px*/, $minSize/*example: 10px*/){

    $($class).fitText($aggression, { minFontSize: $minSize, maxFontSize: $maxSize });;
}

function initLoginTextAnim(){

    var TxtRotate = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
        };
    
        TxtRotate.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];
    
        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }
    
        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
    
        var that = this;
        var delta = 300 - Math.random() * 100;
    
        if (this.isDeleting) { delta /= 2; }
    
        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }
    
        setTimeout(function() {
            that.tick();
        }, delta);
        };
    
        window.onload = function() {
        var elements = document.getElementsByClassName('txt-rotate');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-rotate');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
        document.body.appendChild(css);
        };
}



function initValidate(){


    var $validator = $('#loginForm').validate({
        //onkeyup: false,
        rules: {
            username:{
                    required: true
                    
            },
            password: {
                required: true
            }

        },
        messages:
        {   
            username:{
               required: "<span class='text-danger'>Please enter your username address.</span>",
               username: "<span class='text-danger'>Please enter a valid username address.</span>",
            },
            password:{
                required: "<span class='text-danger'>Please enter your password.</span>",
            }
        },

    });
}





    