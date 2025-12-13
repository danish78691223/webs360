import React from "react";
import { Link } from "react-router-dom";
import "./Home.css";

const Home = () => {
  const user = JSON.parse(localStorage.getItem("user"));

  return (
    <div className="home">
      {/* HERO SECTION */}
      <section className="hero">
        <h1>Your Complete Digital Solution</h1>
        <p>
          WEB’S 360 is a modern digital service platform delivering complete
          end-to-end solutions for businesses, startups, and individuals.
        </p>

        <div className="hero-buttons">
          {/* Show Get Started ONLY if user is NOT logged in */}
          {!user && (
            <Link to="/login" className="primary-btn">
              Get Started
            </Link>
          )}

          <Link to="/services" className="secondary-btn">
            Our Services
          </Link>
        </div>
      </section>

      {/* ABOUT SECTION */}
      <section className="about">
        <h2>About WEB’S 360</h2>
        <p>
          WEB’S 360 is designed to provide a 360-degree approach to digital
          solutions. From website development to branding and online growth,
          we focus on delivering reliable, scalable, and result-oriented
          services using modern technologies.
        </p>
      </section>

      {/* SERVICES SECTION */}
      <section className="services">
        <h2>What We Provide</h2>

        <div className="service-grid">
          <div className="service-card">
            <h3>Web Development</h3>
            <p>
              Responsive, secure, and scalable websites using modern
              technologies such as MERN stack and PHP-based systems.
            </p>
          </div>

          <div className="service-card">
            <h3>UI / UX Design</h3>
            <p>
              Clean and user-friendly interface designs focused on better
              user experience and brand identity.
            </p>
          </div>

          <div className="service-card">
            <h3>Business Websites</h3>
            <p>
              Professional websites for businesses, startups, and service
              providers to establish strong online presence.
            </p>
          </div>

          <div className="service-card">
            <h3>Maintenance & Support</h3>
            <p>
              Ongoing website maintenance, updates, and technical support
              to ensure smooth performance.
            </p>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Home;
