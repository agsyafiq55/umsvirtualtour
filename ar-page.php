
<title>AR and VR Experience</title>

<div class="content-section">
    <h2>What is AR/VR?</h2>
    <p>
        Augmented Reality (AR) and Virtual Reality (VR) are immersive technologies that transform how we interact with digital content. 
        While VR creates a completely virtual environment that users can explore, AR enhances our real world by overlaying digital 
        information onto it. These technologies offer exciting new possibilities for education, allowing students to experience 
        virtual campus tours, interactive learning environments, and hands-on training simulations in a safe and controlled setting.
    </p>
</div>

<div class="split-section">
    <div class="left-content">
        <h2>Experience AR/VR Today!</h2>
        <p>Explore the iconic UMS Pink Mosque in both Augmented Reality and Virtual Reality!</p>
        <a href="ar-mosque.php" class="btn">AR Mosque</a>
        <a href="vr-mosque.php" class="btn">VR Mosque</a>
    </div>
    <div class="right-content">
        <div class="video-box">
            <video controls autoplay muted loop>
                <source src="../img/vr-showcase.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>



<style>
    .image-container {
        position: relative;
        width: 100%;
        height: 50vh;
        overflow: hidden;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
    }

    .overlay h1 {
        color: white;
        font-size: 3rem;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .content-section {
        max-width: 800px;
        margin: 4rem auto;
        padding: 0 2rem;
        text-align: center;
    }

    .content-section h2 {
        color: #333;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .content-section p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.6;
        text-align: justify;
    }

    .split-section {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
        display: flex;
        gap: 4rem;
        align-items: center;
    }

    .left-content, .right-content {
        flex: 1;
    }

    .left-content h2 {
        color: #333;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .left-content p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .video-box {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
    }

    .video-box video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        .split-section {
            flex-direction: column;
            gap: 2rem;
        }

        .left-content {
            text-align: center;
        }
    }
</style>