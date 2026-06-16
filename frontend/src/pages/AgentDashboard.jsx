import React from 'react';
import { useNavigate } from 'react-router-dom';
import './AgentDashboard.css';

const AgentDashboard = () => {
    const navigate = useNavigate();

    // Mock data based on PHP template
    const name = 'Customer';
    const address = 'Chennai';
    const phone = '9876543210';
    const time = '10:30 AM';
    const clothes = 'Clothes';

    const handleAccept = () => {
        alert("Pickup Accepted!");
        // We'll stay on the dashboard for now or navigate away in a real app
    };

    return (
        <div className="agent-dashboard-body">
            <div className="container agent-container">
                {/* TOP */}
                <div className="top">
                    <div className="logo">
                        Re<span>Wear</span>
                    </div>
                    <div className="status">
                        <h3>Pickup Status</h3>
                        <p>ON THE WAY</p>
                    </div>
                </div>

                {/* CONTENT */}
                <div className="content">
                    {/* LEFT */}
                    <div className="left-box">
                        <h1>{name}</h1>

                        <div className="info">
                            📍 <span>Address: </span> {address}
                        </div>
                        <div className="info">
                            📞 <span>Phone: </span> +91 {phone}
                        </div>
                        <div className="info">
                            🕒 <span>Pickup Time: </span> {time}
                        </div>
                        <div className="info">
                            🧺 <span>Clothes Count: </span> 12 Items
                        </div>
                        <div className="clothes">
                            {clothes}
                        </div>

                        <div className="buttons">
                            <button className="btn accept-pickup-btn" onClick={handleAccept}>
                                Start Pickup
                            </button>
                            <button className="btn" onClick={() => alert("Marked as Completed")}>
                                Mark Completed
                            </button>
                        </div>
                    </div>

                    {/* RIGHT (MAP) */}
                    <div className="map-box">
                        <div className="map-title">Customer Location Map</div>
                        <iframe
                            className="map"
                            src={`https://maps.google.com/maps?q=${encodeURIComponent(address)}&t=&z=13&ie=UTF8&iwloc=&output=embed`}
                            title="Customer Map"
                        ></iframe>
                    </div>
                </div>

                {/* BACK */}
                <div className="back">
                    <button onClick={() => navigate(-1)} className="back-btn">
                        ← Back
                    </button>
                </div>
            </div>
        </div>
    );
};

export default AgentDashboard;
