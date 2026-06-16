import React from 'react';
import { useNavigate } from 'react-router-dom';
import './Splash.css';

const Splash = () => {
    const navigate = useNavigate();

    return (
        <div className="splash-body">
            {/* STARS */}
            <div className="star" style={{ top: '10%', left: '15%' }}></div>
            <div className="star" style={{ top: '20%', right: '18%' }}></div>
            <div className="star" style={{ top: '75%', left: '20%' }}></div>
            <div className="star" style={{ bottom: '18%', right: '12%' }}></div>
            <div className="star" style={{ bottom: '28%', left: '10%' }}></div>

            {/* MAIN */}
            <div className="container">
                <div className="logo-box">
                    👕
                </div>

                <div className="logo">
                    Re<span>Wear</span>
                </div>

                <div className="subtext">
                    Your Old Clothes.<br />
                    Your New Cash.
                </div>

                <div className="platform">
                    AI POWERED SUSTAINABLE<br />
                    FASHION PLATFORM
                </div>

                <div className="loading">
                    <div className="loading-fill"></div>
                </div>

                <div className="green">
                    ♻ BUILDING A GREENER<br />
                    TOMORROW
                </div>

                <div className="future">
                    ENTERING SUSTAINABLE FUTURE...
                </div>

                <button className="start-btn" onClick={() => navigate('/language')}>
                    Get Started →
                </button>
            </div>
        </div>
    );
};

export default Splash;
