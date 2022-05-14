<script>
import h337 from 'heatmap.js'
export default {
    data() {
        return {
        }
    },
    mounted: function () {
        var heatmapInstance = h337.create({
            // only container is required, the rest will be defaults
            container: document.querySelector('#heatmap')
        });
        var points = [];
        var max = 0;
        for (let key in this.$page.props.cords) {
            let value = heatmapInstance.getValueAt({
                x: this.$page.props.cords[key].cord_x,
                y: this.$page.props.cords[key].cord_y
            });
            let dataPoint = {
                x: this.$page.props.cords[key].cord_x,
                y: this.$page.props.cords[key].cord_y,
                value: value+1
            };
            points.push(dataPoint);
        }
        var data = {
            max: max,
            data: points
        };
        heatmapInstance.setData(data);

    }
}
</script>

<template>
    <div id="heatmap" style="width: 1920px; height: 40000px">
        <img v-bind:src="$page.props.src" alt="">
    </div>
</template>
