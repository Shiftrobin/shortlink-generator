// website link. copy ancor url to clipboard. x.com 
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