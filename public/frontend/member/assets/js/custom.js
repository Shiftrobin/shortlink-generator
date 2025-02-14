//custom js
//share your profile. copy text from input to clipboard
function shareYourProfile() {
    // Get the input field
    var input = document.getElementById('webUrl');
    // Select the text in the input field
    input.select();
    input.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input field
    document.execCommand('copy');

    // Show toaster notification
    var toast = document.getElementById('toast');
    toast.className = "toast show";
    setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 3000);
}
// mobile phone text copy
function copyPhoneNumber() {
    // Get the anchor element
    var anchor = document.getElementById('phone');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.innerText;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast2');
    toast.className = "toast2 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
} 
// social link. copy ancor url to clipboard. facebook.com 
function facebookCom() {
    // Get the anchor element
    var anchor = document.getElementById('facebook_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}
// social link. copy ancor url to clipboard. x.com 
function xCom() {
    // Get the anchor element
    var anchor = document.getElementById('x_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}
// social link. copy ancor url to clipboard. whatsapp.com 
function whatsAppCom() {
    // Get the anchor element
    var anchor = document.getElementById('whatsapp_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}
// social link. copy ancor url to clipboard. linkedin.com 
function LinkedinCom() {
    // Get the anchor element
    var anchor = document.getElementById('linkedin_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}
// social link. copy ancor url to clipboard. instagram.com 
function InstagramCom() {
    // Get the anchor element
    var anchor = document.getElementById('Instagram_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}
// social link. copy ancor url to clipboard. youtube.com 
function youtubeCom() {
    // Get the anchor element
    var anchor = document.getElementById('youtube_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}
// social link. copy ancor url to clipboard. messenger.com 
function messengerCom() {
    // Get the anchor element
    var anchor = document.getElementById('messenger_com_url');
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = anchor.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the input element
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Show toaster notification
    var toast = document.getElementById('toast3');
    toast.className = "toast3 show";
    setTimeout(function() {
        toast.className = toast.className.replace("show", "hide");
    }, 3000);
}










