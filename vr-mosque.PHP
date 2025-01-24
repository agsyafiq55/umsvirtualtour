<!DOCTYPE html>
<html>
<head>
    <title>UMS Mosque Virtual Tour</title>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
    </style>
</head>
<body>
    

    <a-scene>    
        <!-- Asset Management System -->
        <a-assets>
            <img id="outside-mosque" src="assets/vr/outside_mosque.jpg">
            <img id="0-front-mosque" src="assets/vr/0_front_mosque.jpg">
            <img id="1-front-mosque" src="assets/vr/1_front_mosque.jpg">
            <img id="2-front-mosque" src="assets/vr/2_front_mosque.jpg">
<<<<<<< HEAD
            <img id="center-mosque" src="assets/vr/center_mosque.png">
=======
            <video id="center-mosque" src="assets/vr/center_mosque.mp4" autoplay loop crossorigin="anonymous" playsinline></video>
>>>>>>> fac75aa90445425002f319efcaa9e944806f4538
            <img id="left-mosque" src="assets/vr/left_mosque.jpg">
            <!--Infographics Assets-->
            <img id="outside-mosque1" src="assets/vr/infographics/outside-mosque1.png">
            <img id="outside-mosque2" src="assets/vr/infographics/outside-mosque2.png">
            <img id="info-0-front" src="assets/vr/infographics/0-front-mosque.png">
            <img id="info-2-front" src="assets/vr/infographics/2-front-mosque.png">
            <img id="mimbar-mihrab" src="assets/vr/infographics/mimbar-mihrab.png">
            <img id="interior-masjid" src="assets/vr/infographics/interior-mosque.png">
            <audio id="background-audio" src="assets/vr/Azan Maghrib TV3 2018 Malaysia.mp3"></audio>
        </a-assets>

        <!-- Background Audio -->
        <a-sound src="#background-audio" autoplay="true" loop="true" volume="0.5" position="0 1.6 0"></a-sound>

        <!-- Sky to display 360° content -->
        <a-sky id="sky" src="#outside-mosque"></a-sky>

        <!-- Buttons -->
        <a-entity id="next-button" class="clickable"
                  position="0 1.6 -3"
                  rotation="0 0 0"
                  geometry="primitive: circle; radius: 0.5"
                  material="color: #007bff; opacity: 0.8"
                  visible="true">
            <a-circle id="progress-circle-next" position="0 0 0.01" radius="0.05" material="color: green; opacity: 0.8"></a-circle>
            <a-text value="Next" align="center" color="#ffffff" position="0 0 0.1"></a-text>
        </a-entity>

        <a-entity id="back-button" class="clickable"
                  position="-1 1.6 -3"
                  rotation="0 0 0"
                  geometry="primitive: circle; radius: 0.5"
                  material="color: #007bff; opacity: 0.8"
                  visible="false">
            <a-circle id="progress-circle-back" position="0 0 0.01" radius="0.05" material="color: green; opacity: 0.8"></a-circle>
            <a-text value="Back" align="center" color="#ffffff" position="0 0 0.1"></a-text>
        </a-entity>

        <a-plane id="infographic" visible="false" 
                position="0 2 -3" 
                rotation="0 0 0" 
                width="3" 
                height="2" 
                material="transparent: true;">
        </a-plane>


        <!-- Camera -->
        <a-camera position="0 1.6 0" fov="80" look-controls>
            <a-entity id="cursor"
                    cursor="fuse: true; fuseTimeout: 3000"
                    raycaster="objects: .clickable"
                    position="0 0 -2"
                    geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03"
                    material="color: yellow; shader: flat">
            </a-entity>
        </a-camera>

    </a-scene>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Define scene transitions
            const sceneFlow = [
                //Scene 1
                {
                    scene: 'outside-mosque',
                    nextScene: '0-front-mosque',
                    infographics: [
                        {
                            id: 'outside-mosque1',
                            position: { x: 0.094, y: 1.029, z: -2.685}, // Default position
                            rotation: { x: 0, y: 0, z: 0 },  // Default rotation
                            width: 3,
                            height: 2
                        },
                        {
                            id: 'outside-mosque2',
                            position: { x: 0.491, y: 1.029, z: 2.047 }, // Default position
                            rotation: { x: -0.050, y: -178.277, z: -0.090 },  // Default rotation
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
                //Scene 2
                {
                    scene: '0-front-mosque',
                    nextScene: '1-front-mosque',
                    infographics: [
                        {
                            id: 'info-0-front',
                            position: { x: 0, y: 0.600, z: -4.072 }, // Default position
                            rotation: { x: -12.080, y: 0, z: 0 },    // Default rotation
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
                //Scene 3
                {
                    scene: '1-front-mosque',
                    nextScene: '2-front-mosque',
                    nextButtonPosition: { x: 8.622, y: 3.770, z: 0.122 },
                    nextButtonRotation: { x: 0, y: -90.195, z: 0 },
                    backButtonPosition: { x: -8.654, y: -1.670, z: 0.004 },
                    backButtonRotation: { x: -25.000, y: 90.000, z: 0 },
                    cameraRotation: { x: 0, y: -90, z: 0 }
                },
                //Scene 4
                {
                    scene: '2-front-mosque',
                    nextScene: 'center-mosque',
                    infographics: [
                        {
                            id: 'info-2-front',
                            position: { x: 0, y: 0.786, z: -3 }, // Default position
                            rotation: { x: 0, y: 0, z: 0 },  // Default rotation
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
                //Scene 5
                {
                    scene: 'center-mosque',
                    nextScene: 'left-mosque',
                    infographics: [
                        {
                            id: 'interior-masjid',
                            scale: { x: 0.528, y: 0.508, z: 1 },
                            position: { x: 0.026, y: 0.500, z: -1.479 }, // Default position
                            rotation: { x: -43.774, y: -0.549, z: 0.066 },  // Default rotation
                            width: 4,
                            height: 2.5
                        },
                        {
                            id: 'mimbar-mihrab',
                            scale: { x: 0.699, y: 0.651, z: 1 },
                            position: { x: 1.501, y: 0.570, z: 0.091 }, // Default position
                            rotation: { x: -42.320, y: -90, z: 0 },  // Default rotation
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
                //Scene 6
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

                // Update the skybox image or video
                document.querySelector('#sky').setAttribute('src', `#${scene}`);

                // Update the Next Button
                const nextButton = document.getElementById('next-button');
                if (nextButtonPosition) {
                    nextButton.setAttribute('visible', true);
                    nextButton.setAttribute('position', nextButtonPosition);
                    nextButton.setAttribute('rotation', nextButtonRotation);
                } else {
                    nextButton.setAttribute('visible', false);
                }

                // Update the Back Button
                const backButton = document.getElementById('back-button');
                if (backButtonPosition) {
                    backButton.setAttribute('visible', true);
                    backButton.setAttribute('position', backButtonPosition);
                    backButton.setAttribute('rotation', backButtonRotation);
                } else {
                    backButton.setAttribute('visible', false);
                }

                // Update the Camera Rotation
                const camera = document.querySelector('a-camera');
                camera.setAttribute('rotation', cameraRotation);

                // Clear existing infographics
                const existingInfographics = document.querySelectorAll('.infographic');
                existingInfographics.forEach(el => el.parentNode.removeChild(el));

                // Add new infographics for the current scene
                const sceneEl = document.querySelector('a-scene');
                if (infographics && infographics.length > 0) {
                    infographics.forEach(info => {
                        const plane = document.createElement('a-plane');
                        plane.setAttribute('class', 'infographic'); // Class for identification
                        plane.setAttribute('material', `src: #${info.id}; transparent: true`);
                        plane.setAttribute('position', info.position);
                        plane.setAttribute('rotation', info.rotation);
                        plane.setAttribute('width', info.width);
                        plane.setAttribute('height', info.height);

                        // Apply the scale if provided
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
    </script>
</body>
</html>
