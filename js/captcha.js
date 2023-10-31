
function createCaptcha() 
{
    //clear the contents of captcha div first 
    // document.getElementById('captcha1').innerHTML = "";
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%&";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++)
    {
        //below code will not allow Repetition of Characters
        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
        if (captcha.indexOf(charsArray[index]) == -1)
        captcha.push(charsArray[index]);
        else i--;
    }
    code = captcha.join("");
    document.getElementById("captcha").innerHTML= code;
    // document.getElementById("captcha1").innerHTML= code; // adds the canvas to the h2 element
}
    

function validateCaptcha() 
{
    if (document.getElementById("cpatchaTextBox").value == code) 
    {
        
    }
    else
    {
        alert("Captcha do not match. Try Again");
        createCaptcha();
        return false;
    }
}