<style>
    /* Container for the fixed position */
    .whatsapp-float-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999; /* Ensures it stays on top of everything */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* The main circular button */
    .whatsapp-float-btn {
        width: 60px;
        height: 60px;
        background-color: #25d366;
        color: white;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        position: relative;
        transition: all 0.3s ease;
    }

    /* Icon styling */
    .whatsapp-float-btn i {
        margin-top: 2px; /* Fine-tuning icon alignment */
    }

    /* Hover effect */
    .whatsapp-float-btn:hover {
        background-color: #128C7E;
        transform: scale(1.1);
    }

    /* The Pulse/Ripple Animation 
       This creates the "incoming call" glowing effect 
    */
    .whatsapp-pulse-animation {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #25d366;
        border-radius: 50%;
        z-index: -1;
        opacity: 0.7;
        animation: whatsapp-pulse-border 2s infinite;
    }

    /* Second pulse layer for a more complex effect */
    .whatsapp-pulse-animation::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #25d366;
        border-radius: 50%;
        z-index: -1;
        opacity: 0.5;
        animation: whatsapp-pulse-border 2s infinite 0.5s; /* 0.5s delay */
    }

    @keyframes whatsapp-pulse-border {
        0% {
            transform: scale(1);
            opacity: 0.7;
        }
        100% {
            transform: scale(2.5); /* Expands outwards */
            opacity: 0; /* Fades out */
        }
    }

    /* Mobile responsiveness adjustments */
    @media (max-width: 768px) {
        .whatsapp-float-container {
            bottom: 20px;
            right: 20px;
        }
        .whatsapp-float-btn {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }
    }
</style>

<div id="whatsapp-widget-wrapper" class="whatsapp-float-container">
    <a href="https://wa.me/916201403690?text=Hi%20SYSTAIO%2C%20I%20am%20interested%20in%20your%20services." 
       class="whatsapp-float-btn" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Chat on WhatsApp">
        
        <div class="whatsapp-pulse-animation"></div>
        
        <i class="fab fa-whatsapp"></i>
    </a>
</div>