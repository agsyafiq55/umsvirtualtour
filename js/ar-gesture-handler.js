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
