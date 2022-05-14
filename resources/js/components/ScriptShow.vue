<script>
export  default {
    props: {
        id: Number
    }
}
</script>
<template>
    <pre class="script-code" v-if="id">
const arrData = {
	id: {{id}},
	click_info: []
};
document.addEventListener("DOMContentLoaded", function(){
    document.onclick = function (event) {
        event = event || window.event;
        const tempData = {
            "cords": {
                "x": event.x,
                "y": event.y
            },
            "date": new Date().toISOString()
        }
        arrData.click_info.push(tempData);
    }
});
window.onunload = function() {
    navigator.sendBeacon('http://localhost:8000/api/click/add', JSON.stringify(arrData));
}</pre>
</template>
