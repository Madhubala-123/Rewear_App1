import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import './SelectRole.css';

const translations = {
    en: {
        subtitle: "SELECT YOUR ROLE",
        customerTitle: "Customer",
        customerDesc: "Sell your old clothes and receive instant cash with doorstep pickup.",
        agentTitle: "Pickup Agent",
        agentDesc: "Manage pickup requests and collect clothes from customers.",
        vendorTitle: "Vendor",
        vendorDesc: "Handle clothing stock and send recyclable clothes to industries.",
        footer: "BUILDING A SMARTER & GREENER FUTURE"
    },
    ta: {
        subtitle: "உங்கள் பாத்திரத்தை தேர்ந்தெடுக்கவும்",
        customerTitle: "வாடிக்கையாளர்",
        customerDesc: "பழைய துணிகளை கொடுத்து உடனடி பணம் பெறுங்கள்.",
        agentTitle: "பிக்கப் ஏஜென்ட்",
        agentDesc: "பிக்கப் கோரிக்கைகளை நிர்வகித்து துணிகளை சேகரிக்கவும்.",
        vendorTitle: "விற்பனையாளர்",
        vendorDesc: "துணி சேமிப்பை நிர்வகித்து தொழிற்சாலைகளுக்கு அனுப்பவும்.",
        footer: "சிறந்த மற்றும் பசுமையான எதிர்காலம்"
    },
    te: {
        subtitle: "మీ పాత్రను ఎంచుకోండి",
        customerTitle: "కస్టమర్",
        customerDesc: "పాత బట్టలు అమ్మి వెంటనే డబ్బు పొందండి.",
        agentTitle: "పికప్ ఏజెంట్",
        agentDesc: "పికప్ అభ్యర్థనలను నిర్వహించి బట్టలను సేకరించండి.",
        vendorTitle: "వెండర్",
        vendorDesc: "బట్టల స్టాక్ నిర్వహించి పరిశ్రమలకు పంపండి.",
        footer: "స్మార్ట్ & గ్రీన్ భవిష్యత్తు నిర్మాణం"
    },
    kn: {
        subtitle: "ನಿಮ್ಮ ಪಾತ್ರವನ್ನು ಆಯ್ಕೆಮಾಡಿ",
        customerTitle: "ಗ್ರಾಹಕ",
        customerDesc: "ಹಳೆಯ ಬಟ್ಟೆಗಳನ್ನು ನೀಡಿ ತಕ್ಷಣ ಹಣ ಪಡೆಯಿರಿ.",
        agentTitle: "ಪಿಕಪ್ ಏಜೆಂಟ್",
        agentDesc: "ಪಿಕಪ್ ವಿನಂತಿಗಳನ್ನು ನಿರ್ವಹಿಸಿ ಬಟ್ಟೆಗಳನ್ನು ಸಂಗ್ರಹಿಸಿ.",
        vendorTitle: "ವೆಂಡರ್",
        vendorDesc: "ಬಟ್ಟೆಗಳ ಸಂಗ್ರಹವನ್ನು ನಿರ್ವಹಿಸಿ ಕೈಗಾರಿಕೆಗಳಿಗೆ ಕಳುಹಿಸಿ.",
        footer: "ಸ್ಮಾರ್ಟ್ ಮತ್ತು ಹಸಿರು ಭವಿಷ್ಯ ನಿರ್ಮಾಣ"
    },
    hi: {
        subtitle: "अपनी भूमिका चुनें",
        customerTitle: "ग्राहक",
        customerDesc: "पुराने कपड़े बेचकर तुरंत पैसे प्राप्त करें।",
        agentTitle: "पिकअप एजेंट",
        agentDesc: "पिकअप अनुरोधों को संभालें और कपड़े इकट्ठा करें।",
        vendorTitle: "विक्रेता",
        vendorDesc: "कपड़ों का स्टॉक संभालें और उद्योगों को भेजें।",
        footer: "स्मार्ट और हरित भविष्य का निर्माण"
    }
};

const SelectRole = () => {
    const navigate = useNavigate();
    const [lang, setLang] = useState('en');

    useEffect(() => {
        const storedLang = localStorage.getItem('lang');
        if (storedLang && translations[storedLang]) {
            setLang(storedLang);
        }
    }, []);

    const t = translations[lang];

    return (
        <div className="role-body">
            <div className="glow"></div>
            <div className="container">
                {/* LOGO */}
                <div className="logo">
                    Re<span>Wear</span>
                </div>

                {/* SUBTITLE */}
                <div className="subtitle">
                    {t.subtitle}
                </div>

                {/* ROLE CARDS */}
                <div className="cards">
                    {/* CUSTOMER */}
                    <div className="card" onClick={() => navigate('/customer/login')}>
                        <div className="icon">👤</div>
                        <div className="title">{t.customerTitle}</div>
                        <div className="desc">{t.customerDesc}</div>
                    </div>

                    {/* PICKUP AGENT */}
                    <div className="card" onClick={() => navigate('/agent/login')}>
                        <div className="icon">🚚</div>
                        <div className="title">{t.agentTitle}</div>
                        <div className="desc">{t.agentDesc}</div>
                    </div>

                    {/* VENDOR */}
                    <div className="card" onClick={() => navigate('/vendor/login')}>
                        <div className="icon">🏭</div>
                        <div className="title">{t.vendorTitle}</div>
                        <div className="desc">{t.vendorDesc}</div>
                    </div>
                </div>

                {/* FOOTER */}
                <div className="footer">
                    {t.footer}
                </div>
            </div>
        </div>
    );
};

export default SelectRole;
