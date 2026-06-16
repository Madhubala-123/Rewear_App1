import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import './Language.css';

const Language = () => {
    const navigate = useNavigate();
    const [selectedLanguage, setSelectedLanguage] = useState('ta');

    const languages = [
        { code: 'ta', name: 'Tamil' },
        { code: 'te', name: 'Telugu' },
        { code: 'hi', name: 'Hindi' },
        { code: 'kn', name: 'Kannada' },
        { code: 'en', name: 'English' }
    ];

    const handleContinue = () => {
        // We can save the language to context or localStorage here if needed
        localStorage.setItem('lang', selectedLanguage);
        navigate('/select-role');
    };

    return (
        <div className="lang-body">
            {/* STARS */}
            <div className="star" style={{ top: '12%', left: '15%' }}></div>
            <div className="star" style={{ top: '25%', right: '16%' }}></div>
            <div className="star" style={{ bottom: '20%', left: '18%' }}></div>
            <div className="star" style={{ bottom: '15%', right: '10%' }}></div>

            {/* MAIN */}
            <div className="container">
                <div className="logo-box">
                    👕
                </div>

                <div className="logo">
                    Re<span>Wear</span>
                </div>

                <div className="subtitle">
                    Select your language to continue
                </div>

                {languages.map((lang) => (
                    <div
                        key={lang.code}
                        className={`lang-option ${selectedLanguage === lang.code ? 'active' : ''}`}
                        onClick={() => setSelectedLanguage(lang.code)}
                    >
                        {lang.name} {selectedLanguage === lang.code && '✓'}
                    </div>
                ))}

                {/* BUTTON */}
                <button className="continue-btn" onClick={handleContinue}>
                    Continue →
                </button>
            </div>
        </div>
    );
};

export default Language;
