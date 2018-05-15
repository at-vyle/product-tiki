const pre = document.getElementById('rate-item').innerHTML;
function changeType ( type ) {
    if(type == 0) {
        document.getElementById('rate-item').innerHTML = '';
    }
    else {
        document.getElementById('rate-item').innerHTML = pre;
    }
}