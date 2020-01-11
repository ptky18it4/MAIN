$(document).ready(function() {
    if (!$('#myCanvas').tagcanvas({
            textColour: '#393B3B',
            outlineColour: '#D10024',
            reverse: true,
            depth: 0.8,
            maxSpeed: 0.1
        }, 'tags')) {
        $('#myCanvasContainer').hide();
    }
});