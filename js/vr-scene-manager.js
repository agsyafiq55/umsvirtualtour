document.addEventListener('DOMContentLoaded', function () {
    const sceneFlow = [
        {
            scene: 'outside-mosque',
            nextScene: '0-front-mosque',
            infographics: [
                {
                    id: 'outside-mosque1',
                    position: { x: 0.094, y: 1.029, z: -2.685 },
                    rotation: { x: 0, y: 0, z: 0 },
                    width: 3,
                    height: 2
                },
                {
                    id: 'outside-mosque2',
                    position: { x: 0.491, y: 1.029, z: 2.047 },
                    rotation: { x: -0.050, y: -178.277, z: -0.090 },
                    width: 3,
                    height: 2
                }
            ],
            nextButtonPosition: { x: 7.100, y: 1.957, z: 2.793 },
            nextButtonRotation: { x: 0, y: -109.678, z: 0 },
            backButtonPosition: null,
            backButtonRotation: null,
            cameraRotation: { x: 0, y: -92, z: 0 }
        },
        {
            scene: '0-front-mosque',
            nextScene: '1-front-mosque',
            infographics: [
                {
                    id: 'info-0-front',
                    position: { x: 0, y: 0.600, z: -4.072 },
                    rotation: { x: -12.080, y: 0, z: 0 },
                    width: 4,
                    height: 2.5
                }
            ],
            nextButtonPosition: { x: 6.180, y: 3.610, z: -0.050 },
            nextButtonRotation: { x: -0.810, y: -91.162, z: 0 },
            backButtonPosition: { x: -3.150, y: 0.070, z: -0.005 },
            backButtonRotation: { x: -27.609, y: 95.207, z: -2.723 },
            cameraRotation: { x: 0, y: -90, z: 0 }
        },
        {
            scene: '1-front-mosque',
            nextScene: '2-front-mosque',
            nextButtonPosition: { x: 8.622, y: 3.770, z: 0.122 },
            nextButtonRotation: { x: 0, y: -90.195, z: 0 },
            backButtonPosition: { x: -8.654, y: -1.670, z: 0.004 },
            backButtonRotation: { x: -25.000, y: 90.000, z: 0 },
            cameraRotation: { x: 0, y: -90, z: 0 }
        },
        {
            scene: '2-front-mosque',
            nextScene: 'center-mosque',
            infographics: [
                {
                    id: 'info-2-front',
                    position: { x: 0, y: 0.786, z: -3 },
                    rotation: { x: 0, y: 0, z: 0 },
                    width: 3,
                    height: 2
                }
            ],
            nextButtonPosition: { x: -9.892, y: 1.8, z: 0.498 },
            nextButtonRotation: { x: 0, y: 100.000, z: 0 },
            backButtonPosition: { x: 15.431, y: -3.335, z: -1.247 },
            backButtonRotation: { x: -30.000, y: -90.000, z: 0 },
            cameraRotation: { x: 0, y: 90, z: 0 }
        },
        {
            scene: 'center-mosque',
            nextScene: 'left-mosque',
            infographics: [
                {
                    id: 'interior-masjid',
                    scale: { x: 0.528, y: 0.508, z: 1 },
                    position: { x: 0.026, y: 0.500, z: -1.479 },
                    rotation: { x: -43.774, y: -0.549, z: 0.066 },
                    width: 4,
                    height: 2.5
                },
                {
                    id: 'mimbar-mihrab',
                    scale: { x: 0.699, y: 0.651, z: 1 },
                    position: { x: 1.501, y: 0.570, z: 0.091 },
                    rotation: { x: -42.320, y: -90, z: 0 },
                    width: 3,
                    height: 2
                }
            ],
            nextButtonPosition: { x: -0.011, y: 1.210, z: 10.807 },
            nextButtonRotation: { x: 0, y: 180.000, z: 0 },
            backButtonPosition: { x: -10.415, y: 1.240, z: -0.832 },
            backButtonRotation: { x: 0, y: 90.000, z: 0 },
            cameraRotation: { x: 0, y: -92, z: 0 }
        },
        {
            scene: 'left-mosque',
            nextScene: null,
            nextButtonPosition: null,
            nextButtonRotation: null,
            backButtonPosition: { x: 10.434, y: 1.220, z: 0.661 },
            backButtonRotation: { x: 0, y: -90.000, z: 0 },
            cameraRotation: { x: 0, y: -90, z: 0 }
        }
    ];

    let currentSceneIndex = 0;

    function switchScene(newIndex) {
        currentSceneIndex = newIndex;

        const {
            scene,
            infographics,
            nextButtonPosition,
            nextButtonRotation,
            backButtonPosition,
            backButtonRotation,
            cameraRotation
        } = sceneFlow[currentSceneIndex];

        document.querySelector('#sky').setAttribute('src', `#${scene}`);

        const nextButton = document.getElementById('next-button');
        if (nextButtonPosition) {
            nextButton.setAttribute('visible', true);
            nextButton.setAttribute('position', nextButtonPosition);
            nextButton.setAttribute('rotation', nextButtonRotation);
        } else {
            nextButton.setAttribute('visible', false);
        }

        const backButton = document.getElementById('back-button');
        if (backButtonPosition) {
            backButton.setAttribute('visible', true);
            backButton.setAttribute('position', backButtonPosition);
            backButton.setAttribute('rotation', backButtonRotation);
        } else {
            backButton.setAttribute('visible', false);
        }

        const camera = document.querySelector('a-camera');
        camera.setAttribute('rotation', cameraRotation);

        const existingInfographics = document.querySelectorAll('.infographic');
        existingInfographics.forEach(el => el.parentNode.removeChild(el));

        const sceneEl = document.querySelector('a-scene');
        if (infographics && infographics.length > 0) {
            infographics.forEach(info => {
                const plane = document.createElement('a-plane');
                plane.setAttribute('class', 'infographic');
                plane.setAttribute('material', `src: #${info.id}; transparent: true`);
                plane.setAttribute('position', info.position);
                plane.setAttribute('rotation', info.rotation);
                plane.setAttribute('width', info.width);
                plane.setAttribute('height', info.height);

                if (info.scale) {
                    plane.setAttribute('scale', `${info.scale.x} ${info.scale.y} ${info.scale.z}`);
                }

                plane.setAttribute('visible', true);
                sceneEl.appendChild(plane);
            });
        }
    }

    function addGazeInteraction(buttonId, progressCircleId, callback) {
        const button = document.getElementById(buttonId);
        const progressCircle = document.getElementById(progressCircleId);

        let interval;
        let progress = 0;

        button.addEventListener('raycaster-intersected', () => {
            if (!interval) {
                interval = setInterval(() => {
                    progress += 10;
                    const newRadius = 0.05 + (progress / 100) * 0.45;
                    progressCircle.setAttribute('radius', newRadius);

                    if (progress >= 100) {
                        clearInterval(interval);
                        interval = null;
                        progress = 0;
                        callback();
                    }
                }, 30);
            }
        });

        button.addEventListener('raycaster-intersected-cleared', () => {
            clearInterval(interval);
            interval = null;
            progress = 0;
            progressCircle.setAttribute('radius', 0.05);
        });
    }

    addGazeInteraction('next-button', 'progress-circle-next', () => {
        if (currentSceneIndex < sceneFlow.length - 1) {
            switchScene(currentSceneIndex + 1);
        }
    });

    addGazeInteraction('back-button', 'progress-circle-back', () => {
        if (currentSceneIndex > 0) {
            switchScene(currentSceneIndex - 1);
        }
    });

    switchScene(currentSceneIndex);
});
