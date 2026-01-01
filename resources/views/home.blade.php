<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header & Navigation */
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: "🎓";
            font-size: 2rem;
        }

        .login-btn {
            background: white;
            color: #667eea;
            padding: 0.7rem 2rem;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.95;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border-color: #667eea;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .feature-card p {
            color: #666;
            line-height: 1.8;
        }

        /* Quick Links Section */
        .quick-links {
            background: #f8f9fa;
            padding: 3rem 2rem;
            margin-top: 3rem;
        }

        .quick-links h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .link-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            border: 2px solid #e0e0e0;
        }

        .link-card:hover {
            border-color: #667eea;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }

        .link-card span {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }

        footer p {
            opacity: 0.9;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            nav {
                flex-direction: column;
                gap: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">School Management System</div>
            <a href="{{ route('login') }}" class="login-btn">Login</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Welcome to Our School</h1>
        <p>Empowering education through innovative management solutions</p>
    </section>

    <div class="container">
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">🏫</div>
                <h3>World-Class Facilities</h3>
                <p>State-of-the-art classrooms, laboratories, sports facilities, and library equipped with modern technology to enhance learning experiences.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📢</div>
                <h3>Latest Notices</h3>
                <p>Stay updated with school announcements, events, exam schedules, and important notifications through our centralized notice board.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Admissions Open</h3>
                <p>Applications are now open for the new academic year. Simple online admission process with transparent guidelines and support.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">👨‍🏫</div>
                <h3>Expert Faculty</h3>
                <p>Learn from experienced and dedicated teachers committed to nurturing academic excellence and character development.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <h3>Comprehensive Curriculum</h3>
                <p>Well-rounded education program designed to develop critical thinking, creativity, and practical skills for future success.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Student Support</h3>
                <p>Personalized guidance, counseling services, and mentorship programs to help every student reach their full potential.</p>
            </div>
        </div>
    </div>

    <section class="quick-links">
        <h2>Quick Access</h2>
        <div class="links-grid">
            <a href="#" class="link-card">
                <span>📅</span>
                <strong>Academic Calendar</strong>
            </a>
            <a href="#" class="link-card">
                <span>💳</span>
                <strong>Fee Payment</strong>
            </a>
            <a href="#" class="link-card">
                <span>📊</span>
                <strong>Results</strong>
            </a>
            <a href="#" class="link-card">
                <span>📞</span>
                <strong>Contact Us</strong>
            </a>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 School Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
