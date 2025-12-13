import React from "react";
import "./Services.css";

const Services = () => {
  return (
    <div className="services-page">
      {/* PAGE HEADER */}
      <section className="services-hero">
        <h1>Our Services</h1>
        <p>
          At WEB’S 360, we provide complete digital solutions designed to help
          businesses grow, scale, and succeed in the digital world.
        </p>
      </section>

      {/* SERVICES LIST */}
      <section className="services-list">
        <div className="service-box">
          <h3>Web Development</h3>
          <p>
            We build fast, secure, and scalable websites using modern
            technologies such as MERN Stack and PHP. Our solutions are tailored
            to meet real business needs.
          </p>
        </div>

        <div className="service-box">
          <h3>UI / UX Design</h3>
          <p>
            Our UI/UX designs focus on usability, accessibility, and visual
            appeal to ensure better user engagement and satisfaction.
          </p>
        </div>

        <div className="service-box">
          <h3>Business & Portfolio Websites</h3>
          <p>
            Professional websites for businesses, startups, freelancers, and
            individuals to establish a strong online presence.
          </p>
        </div>

        <div className="service-box">
          <h3>Website Maintenance</h3>
          <p>
            Regular updates, performance optimization, security checks, and
            technical support to keep your website running smoothly.
          </p>
        </div>

        <div className="service-box">
          <h3>Custom Web Solutions</h3>
          <p>
            Tailor-made web applications based on your specific requirements,
            including admin panels, dashboards, and management systems.
          </p>
        </div>

        <div className="service-box">
          <h3>Digital Consultation</h3>
          <p>
            Expert guidance to help you choose the right technology stack and
            digital strategy for your business goals.
          </p>
        </div>
      </section>
    </div>
  );
};

export default Services;
