let arrData = [];
document.addEventListener("DOMContentLoaded", function(){
    document.onclick = function (event) {
    event = event || window.event;
    const tempData = {
        "cords": {
            "x": event.x,
            "y": event.y
        },
        "date": new Date().toISOString(),
        "id": {{$siteid}}
    }
    arrData.push(tempData);
}
});
window.onunload = function() {
    navigator.sendBeacon('http://localhost:8000/api/test', JSON.stringify(arrData));
}
