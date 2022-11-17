function refreshTime() {
    document.getElementById('date-time').innerHTML=new Date().toLocaleTimeString();
}
setInterval(refreshTime, 1000);