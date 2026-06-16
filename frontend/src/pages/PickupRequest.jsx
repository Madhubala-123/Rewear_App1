import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import './PickupRequest.css';

const PickupRequest = () => {
    const navigate = useNavigate();
    const [previews, setPreviews] = useState([]);
    const [aiResult, setAiResult] = useState({ text: 'Upload cloth image for AI analysis', status: null });

    const handleFileUpload = (e) => {
        const files = Array.from(e.target.files);
        
        // Preview images
        const newPreviews = files.map(file => URL.createObjectURL(file));
        setPreviews(newPreviews);

        // Simulate AI Analysis
        if (files.length === 0) {
            setAiResult({ text: 'Upload cloth image', status: null });
            return;
        }

        const random = Math.floor(Math.random() * 3);
        if (random === 0) {
            setAiResult({ text: 'This cloth is reusable and can be used again.', status: 'reusable' });
        } else if (random === 1) {
            setAiResult({ text: 'This cloth can be recycled into new materials.', status: 'recyclable' });
        } else {
            setAiResult({ text: 'This cloth is too damaged and cannot be reused.', status: 'damaged' });
        }
    };

    const handleSubmit = () => {
        // In a real app, we'd POST data to backend here
        alert("Pickup Scheduled Successfully!");
        // We will just navigate to dashboard for now, or a success page if it existed
        navigate('/customer/dashboard');
    };

    return (
        <div className="pickup-body">
            <div className="container pickup-container">
                {/* LEFT PANEL */}
                <div className="left-panel">
                    <div className="title">
                        Re<span>Wear</span> Pickup
                    </div>

                    <div className="grid">
                        <div className="input-box">
                            <label>Customer Name</label>
                            <input type="text" placeholder="Enter your name" />
                        </div>
                        <div className="input-box">
                            <label>Phone Number</label>
                            <input type="text" placeholder="Enter phone number" />
                        </div>
                        <div className="input-box">
                            <label>Pickup Date</label>
                            <input type="date" />
                        </div>
                        <div className="input-box">
                            <label>Pickup Time</label>
                            <select>
                                <option>09:00 AM</option>
                                <option>10:30 AM</option>
                                <option>12:00 PM</option>
                                <option>03:00 PM</option>
                            </select>
                        </div>

                        <div className="input-box full">
                            <label>Clothes Type</label>
                            <select>
                                <option>Select Clothes Type</option>
                                <option>Shirts</option>
                                <option>Jeans</option>
                                <option>Hoodies</option>
                                <option>Sarees</option>
                                <option>Kids Wear</option>
                            </select>
                        </div>

                        <div className="input-box full">
                            <label>Other Clothes Details</label>
                            <textarea placeholder="Example: cotton shirts, damaged jeans"></textarea>
                        </div>

                        <div className="input-box full">
                            <label>Pickup Address</label>
                            <textarea placeholder="Enter full pickup address"></textarea>
                        </div>
                    </div>

                    {/* UPLOAD */}
                    <div className="upload-box">
                        <div className="upload-title">📸 Upload Clothes Photos</div>
                        <input
                            type="file"
                            multiple
                            accept="image/*"
                            onChange={handleFileUpload}
                        />
                        <div className="preview-container">
                            {previews.map((src, index) => (
                                <img key={index} src={src} alt="Preview" />
                            ))}
                        </div>
                    </div>

                    <button className="submit-btn submit-request-btn" onClick={handleSubmit}>
                        Schedule Pickup →
                    </button>
                </div>

                {/* RIGHT PANEL */}
                <div className="right-panel">
                    <div className="ai-box">
                        <div className="ai-title">👕 AI Cloth Analysis</div>
                        <div className="ai-result">
                            {aiResult.text}
                        </div>

                        <div className="status-box">
                            <div className={`status-item reusable ${aiResult.status === 'reusable' ? 'active' : ''}`}>
                                ✅ Reusable Cloth
                            </div>
                            <div className={`status-item recyclable ${aiResult.status === 'recyclable' ? 'active' : ''}`}>
                                ♻️ Recyclable Cloth
                            </div>
                            <div className={`status-item damaged ${aiResult.status === 'damaged' ? 'active' : ''}`}>
                                ❌ Damaged Cloth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default PickupRequest;
