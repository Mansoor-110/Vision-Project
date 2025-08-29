<?php 
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Locator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
            color: #2c1810;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Subtle texture overlay */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(139, 69, 19, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(0, 0, 0, 0.02) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        /* Floating Particles System */
        .particle {
            position: fixed;
            width: 4px;
            height: 4px;
            background: #8B0000;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            z-index: 1000;
            animation: sparkle 2s ease-in-out infinite;
        }

        @keyframes sparkle {
            0% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(0); }
        }

        /* Hero Section */
        .hero {
            padding: 80px 20px 40px;
            text-align: center;
            position: relative;
            background: linear-gradient(135deg, rgba(139, 0, 0, 0.08) 0%, rgba(255, 255, 255, 0.95) 50%, rgba(139, 0, 0, 0.05) 100%);
            z-index: 2;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 2px,
                rgba(0, 0, 0, 0.01) 2px,
                rgba(0, 0, 0, 0.01) 4px
            );
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 300;
            letter-spacing: 3px;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #8B0000, #2c1810);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleFloat 3s ease-in-out infinite;
            position: relative;
            z-index: 3;
        }

        @keyframes titleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.6;
            color: #444;
            position: relative;
            z-index: 3;
        }

        /* Search Section */
        .find-section {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .find-container {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .find-input {
            flex: 1;
            min-width: 250px;
            max-width: 400px;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(139, 0, 0, 0.3);
            border-radius: 10px;
            color: #2c1810;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .find-input:focus {
            outline: none;
            border-color: #8B0000;
            box-shadow: 0 0 20px rgba(139, 0, 0, 0.2);
        }

        .find-input::placeholder {
            color: rgba(44, 24, 16, 0.6);
        }

        .find-btn {
            padding: 15px 30px;
            background: transparent;
            border: 2px solid #8B0000;
            color: #8B0000;
            font-size: 1rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            font-weight: 600;
        }

        .find-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #8B0000;
            transition: left 0.3s ease;
            z-index: -1;
        }

        .find-btn:hover::before {
            left: 0;
        }

        .find-btn:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px 80px;
            position: relative;
            z-index: 2;
        }

        /* Store List */
        .store-list {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 0, 0, 0.1);
            max-height: 600px;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .store-list::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                90deg,
                transparent,
                transparent 1px,
                rgba(0, 0, 0, 0.01) 1px,
                rgba(0, 0, 0, 0.01) 2px
            );
            pointer-events: none;
        }

        .store-list h2 {
            color: #8B0000;
            font-size: 1.8rem;
            margin-bottom: 25px;
            font-weight: 300;
            letter-spacing: 1px;
            position: relative;
            z-index: 3;
        }

        .store-item {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(139, 0, 0, 0.15);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .store-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(139, 0, 0, 0.08), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .store-item:hover::before {
            opacity: 1;
        }

        .store-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
            border-color: #8B0000;
        }

        .store-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #8B0000;
            margin-bottom: 10px;
            position: relative;
            z-index: 3;
        }

        .store-address {
            color: rgba(44, 24, 16, 0.9);
            line-height: 1.6;
            margin-bottom: 10px;
            position: relative;
            z-index: 3;
        }

        .store-contact {
            color: rgba(44, 24, 16, 0.8);
            font-size: 0.9rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 3;
        }

        .store-hours {
            color: rgba(44, 24, 16, 0.7);
            font-size: 0.9rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 3;
        }

        .store-services {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            position: relative;
            z-index: 3;
        }

        .service-tag {
            background: rgba(139, 0, 0, 0.1);
            color: #8B0000;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid rgba(139, 0, 0, 0.2);
            font-weight: 500;
        }

        /* Map Container */
        .map-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 0, 0, 0.1);
            height: 600px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .map-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 3px,
                rgba(0, 0, 0, 0.005) 3px,
                rgba(0, 0, 0, 0.005) 6px
            );
            pointer-events: none;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f8f8, #fff);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: rgba(44, 24, 16, 0.8);
            position: relative;
            z-index: 3;
            border: 2px dashed rgba(139, 0, 0, 0.2);
        }

        .map-placeholder::before {
            content: '🗺️';
            font-size: 4rem;
            margin-bottom: 20px;
            filter: sepia(1) hue-rotate(320deg) saturate(2);
        }

        .map-placeholder p {
            font-size: 1.1rem;
            text-align: center;
            line-height: 1.6;
            color: #8B0000;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-btn {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(139, 0, 0, 0.3);
            color: rgba(44, 24, 16, 0.8);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: rgba(139, 0, 0, 0.1);
            border-color: #8B0000;
            color: #8B0000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 0, 0, 0.2);
        }

        /* Location Info */
        .location-info {
            background: rgba(139, 0, 0, 0.08);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(139, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .location-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(0, 0, 0, 0.01) 2px,
                rgba(0, 0, 0, 0.01) 4px
            );
            pointer-events: none;
        }

        .location-info h3 {
            color: #8B0000;
            font-size: 1.1rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 3;
            font-weight: 600;
        }

        .location-info p {
            color: rgba(44, 24, 16, 0.9);
            line-height: 1.6;
            position: relative;
            z-index: 3;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .find-container {
                flex-direction: column;
                align-items: center;
            }

            .find-input {
                min-width: 300px;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 60px 15px 30px;
            }

            .hero h1 {
                font-size: 2rem;
                letter-spacing: 1px;
            }

            .hero p {
                font-size: 1rem;
            }

            .find-section {
                padding: 30px 15px;
            }

            .main-content {
                padding: 0 15px 60px;
            }

            .store-list, .map-container {
                padding: 20px;
            }

            .map-container {
                height: 400px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .find-input {
                min-width: 250px;
            }

            .store-item {
                padding: 15px;
            }

            .filter-section {
                gap: 10px;
            }

            .filter-btn {
                padding: 8px 16px;
                font-size: 0.8rem;
            }
        }

        /* Custom Scrollbar */
        .store-list::-webkit-scrollbar {
            width: 8px;
        }

        .store-list::-webkit-scrollbar-track {
            background: rgba(139, 0, 0, 0.1);
            border-radius: 10px;
        }

        .store-list::-webkit-scrollbar-thumb {
            background: rgba(139, 0, 0, 0.3);
            border-radius: 10px;
        }

        .store-list::-webkit-scrollbar-thumb:hover {
            background: rgba(139, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <!-- Floating Particles Container -->
    <div id="particles-container"></div>

    <!-- Hero Section -->
    <section class="hero">
        <h1>STORE LOCATOR</h1>
        <p>Find the nearest Lumina boutique and discover our exquisite collections in person</p>
    </section>

    <!-- Search Section -->
    <section class="find-section">
        <div class="find-container">
            <input type="text" class="find-input" placeholder="Enter your city or zip code..." id="findInput">
            <button class="find-btn" onclick="findStores()">FIND STORES</button>
        </div>

        <div class="filter-section">
            <button class="filter-btn active" onclick="filterStores('all')">All Stores</button>
            <button class="filter-btn" onclick="filterStores('jewelry')">Jewelry Only</button>
            <button class="filter-btn" onclick="filterStores('cosmetics')">Cosmetics Only</button>
            <button class="filter-btn" onclick="filterStores('flagship')">Flagship Stores</button>
        </div>

        <div class="location-info">
            <h3>Currently Showing</h3>
            <p id="locationStatus">All Lumina stores worldwide. Use the search above to find stores near you.</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <!-- Store List -->
        <div class="store-list">
            <h2>Our Locations</h2>
            <div id="storeContainer">
                <!-- Store items will be populated by JavaScript -->
            </div>
        </div>

        <!-- Map Container -->
        <div class="map-container">
            <div class="map-placeholder">
                <p>Interactive Map<br>Click on any store to view its location</p>
            </div>
        </div>
    </section>

    <script>
        // Store data
        const storeData = [
            {
                name: "Lumina Flagship - New York",
                address: "Madison Avenue, 1234<br>New York, NY 10021",
                phone: "(212) 555-0123",
                email: "newyork@lumina.com",
                hours: "Mon-Sat: 10AM-8PM<br>Sun: 12PM-6PM",
                services: ["Jewelry", "Cosmetics", "Personal Styling", "Repair Service"],
                type: "flagship"
            },
            {
                name: "Lumina Beverly Hills",
                address: "Rodeo Drive, 456<br>Beverly Hills, CA 90210",
                phone: "(310) 555-0456",
                email: "beverlyhills@lumina.com",
                hours: "Mon-Sat: 10AM-9PM<br>Sun: 11AM-7PM",
                services: ["Jewelry", "Cosmetics", "VIP Consultation"],
                type: "flagship"
            },
            {
                name: "Lumina London",
                address: "Bond Street, 789<br>London W1S 1DX, UK",
                phone: "+44 20 7555 0789",
                email: "london@lumina.com",
                hours: "Mon-Sat: 10AM-7PM<br>Sun: 12PM-5PM",
                services: ["Jewelry", "Cosmetics", "Custom Design"],
                type: "flagship"
            },
            {
                name: "Lumina Jewelry - Chicago",
                address: "Michigan Avenue, 321<br>Chicago, IL 60611",
                phone: "(312) 555-0321",
                email: "chicago@lumina.com",
                hours: "Mon-Sat: 10AM-8PM<br>Sun: 12PM-6PM",
                services: ["Jewelry", "Engagement Rings", "Repair Service"],
                type: "jewelry"
            },
            {
                name: "Lumina Cosmetics - Miami",
                address: "Ocean Drive, 654<br>Miami, FL 33139",
                phone: "(305) 555-0654",
                email: "miami@lumina.com",
                hours: "Mon-Sat: 10AM-9PM<br>Sun: 11AM-7PM",
                services: ["Cosmetics", "Makeup Consultation", "Beauty Workshops"],
                type: "cosmetics"
            },
            {
                name: "Lumina Paris",
                address: "Champs-Élysées, 987<br>75008 Paris, France",
                phone: "+33 1 55 55 09 87",
                email: "paris@lumina.com",
                hours: "Mon-Sat: 10AM-8PM<br>Sun: 2PM-7PM",
                services: ["Jewelry", "Cosmetics", "French Luxury Collection"],
                type: "flagship"
            },
            {
                name: "Lumina Tokyo",
                address: "Ginza District, 246<br>Tokyo 104-0061, Japan",
                phone: "+81 3 5555 0246",
                email: "tokyo@lumina.com",
                hours: "Daily: 10AM-8PM",
                services: ["Jewelry", "Cosmetics", "Japanese Exclusive Items"],
                type: "flagship"
            },
            {
                name: "Lumina Jewelry - Dallas",
                address: "Highland Park, 135<br>Dallas, TX 75205",
                phone: "(214) 555-0135",
                email: "dallas@lumina.com",
                hours: "Mon-Sat: 10AM-7PM<br>Sun: 1PM-6PM",
                services: ["Jewelry", "Wedding Collections", "Appraisal Service"],
                type: "jewelry"
            }
        ];

        let currentFilter = 'all';
        let filteredStores = storeData;

        // Initialize store display
        function displayStores(stores) {
            const container = document.getElementById('storeContainer');
            container.innerHTML = '';

            stores.forEach((store, index) => {
                const storeItem = document.createElement('div');
                storeItem.className = 'store-item';
                storeItem.onclick = () => selectStore(index);

                const servicesHTML = store.services.map(service => 
                    `<span class="service-tag">${service}</span>`
                ).join('');

                storeItem.innerHTML = `
                    <div class="store-name">${store.name}</div>
                    <div class="store-address">${store.address}</div>
                    <div class="store-contact">
                        📞 ${store.phone}<br>
                        ✉️ ${store.email}
                    </div>
                    <div class="store-hours">
                        🕒 ${store.hours}
                    </div>
                    <div class="store-services">
                        ${servicesHTML}
                    </div>
                `;

                container.appendChild(storeItem);
            });
        }

        // Filter stores
        function filterStores(type) {
            currentFilter = type;
            
            // Update filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter stores
            if (type === 'all') {
                filteredStores = storeData;
            } else {
                filteredStores = storeData.filter(store => 
                    store.type === type || store.services.some(service => 
                        service.toLowerCase().includes(type.toLowerCase())
                    )
                );
            }

            displayStores(filteredStores);
            updateLocationStatus();
        }

        // Search stores
        function findStores() {
            const searchTerm = document.getElementById('findInput').value.toLowerCase();
            
            if (searchTerm === '') {
                displayStores(storeData);
                document.getElementById('locationStatus').textContent = 'All Lumina stores worldwide.';
                return;
            }

            const searchResults = storeData.filter(store => 
                store.name.toLowerCase().includes(searchTerm) ||
                store.address.toLowerCase().includes(searchTerm)
            );

            displayStores(searchResults);
            document.getElementById('locationStatus').textContent = 
                `Found ${searchResults.length} store(s) matching "${searchTerm}"`;
        }

        // Select store (for map interaction)
        function selectStore(index) {
            const store = filteredStores[index];
            
            // Highlight selected store
            document.querySelectorAll('.store-item').forEach((item, i) => {
                if (i === index) {
                    item.style.borderColor = '#8B0000';
                    item.style.backgroundColor = 'rgba(139, 0, 0, 0.1)';
                } else {
                    item.style.borderColor = 'rgba(139, 0, 0, 0.15)';
                    item.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
                }
            });

            // Update map placeholder with store info
            const mapPlaceholder = document.querySelector('.map-placeholder');
            mapPlaceholder.innerHTML = `
                <div style="text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 15px;">📍</div>
                    <h3 style="color: #8B0000; margin-bottom: 10px;">${store.name}</h3>
                    <p style="margin-bottom: 10px; color: #2c1810;">${store.address}</p>
                    <p style="color: rgba(44, 24, 16, 0.8);">${store.phone}</p>
                    <p style="font-size: 0.9rem; margin-top: 15px; color: rgba(44, 24, 16, 0.6);">
                        Click to view in Google Maps
                    </p>
                </div>
            `;
        }

        // Update location status
        function updateLocationStatus() {
            const statusElement = document.getElementById('locationStatus');
            let filterText = '';
            
            switch(currentFilter) {
                case 'jewelry':
                    filterText = 'jewelry stores';
                    break;
                case 'cosmetics':
                    filterText = 'cosmetics stores';
                    break;
                case 'flagship':
                    filterText = 'flagship stores';
                    break;
                default:
                    filterText = 'all stores';
            }
            
            statusElement.textContent = `Showing ${filteredStores.length} ${filterText} worldwide.`;
        }

        // Floating Particles System
        const particlesContainer = document.getElementById('particles-container');

        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = x + 'px';
            particle.style.top = y + 'px';
            
            const offsetX = (Math.random() - 0.5) * 20;
            const offsetY = (Math.random() - 0.5) * 20;
            
            particle.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
            
            particlesContainer.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 2000);
        }

        // Create particles on mouse move
        let particleTimer = 0;
        document.addEventListener('mousemove', (e) => {
            if (Date.now() - particleTimer > 100) {
                createParticle(e.clientX, e.clientY);
                particleTimer = Date.now();
            }
        });

        // Create particles on store item hover
        document.addEventListener('DOMContentLoaded', () => {
            displayStores(storeData);
            updateLocationStatus();
        });

        // Search on Enter key
        document.getElementById('findInput').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                findStores();
            }
        });

        // Random ambient particles
        setInterval(() => {
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * window.innerHeight;
            createParticle(x, y);
        }, 2000);
    </script>
</body>
</html>
<?php include "../includes/footer.php";?>