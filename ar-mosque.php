<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiro Marker with UMS Pink Mosque</title>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/jeromeetienne/ar.js/aframe/build/aframe-ar.min.js"></script>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- AR Scene -->
    <a-scene embedded arjs="debugUIEnabled: false;">
        <!-- Hiro marker -->
        <a-marker preset="hiro">
            <!-- 3D Model -->
            <a-entity
                id="mosque-model"
                gltf-model="assets/models/UMS Pink Mosque.glb"
                scale="0.02 0.02 0.02"
                position="0 0 0"
                rotation="0 0 0"
                gesture-handler>
            </a-entity>
        </a-marker>
        <a-entity camera></a-entity>
    </a-scene>

    <!-- Gesture Handler Script -->
    <script>
        AFRAME.registerComponent('gesture-handler', {
            schema: {
                enabled: { default: true }
            },
            init: function () {
                this.handleRotation = this.handleRotation.bind(this);
                this.startRotation = this.startRotation.bind(this);
                this.endRotation = this.endRotation.bind(this);

                this.startX = 0;
                this.startY = 0;
                this.isDragging = false;

                // Mouse and touch events
                this.el.sceneEl.canvas.addEventListener('mousedown', this.startRotation);
                this.el.sceneEl.canvas.addEventListener('touchstart', this.startRotation);

                this.el.sceneEl.canvas.addEventListener('mousemove', this.handleRotation);
                this.el.sceneEl.canvas.addEventListener('touchmove', this.handleRotation);

                this.el.sceneEl.canvas.addEventListener('mouseup', this.endRotation);
                this.el.sceneEl.canvas.addEventListener('touchend', this.endRotation);
            },
            startRotation: function (event) {
                this.isDragging = true;
                this.startX = event.touches ? event.touches[0].clientX : event.clientX;
                this.startY = event.touches ? event.touches[0].clientY : event.clientY;
            },
            handleRotation: function (event) {
                if (!this.isDragging) return;

                const model = this.el;
                const currentRotation = model.getAttribute('rotation');

                const clientX = event.touches ? event.touches[0].clientX : event.clientX;
                const clientY = event.touches ? event.touches[0].clientY : event.clientY;

                const deltaX = clientX - this.startX;
                const deltaY = clientY - this.startY;

                model.setAttribute('rotation', {
                    x: currentRotation.x - deltaY * 0.1,
                    y: currentRotation.y + deltaX * 0.1,
                    z: currentRotation.z
                });

                this.startX = clientX;
                this.startY = clientY;
            },
            endRotation: function () {
                this.isDragging = false;
            }
        });
    </script>
</body>
</html>
