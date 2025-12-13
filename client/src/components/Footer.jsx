import React from "react";
import "./Footer.css";

const Footer = () => {
  return (
    <footer className="footer">
      <div className="footer-content">
        <div>
          <h3>WEB’S 360</h3>
          <p>
            Complete digital solutions for modern businesses. We build,
            design, and manage digital platforms that grow your brand.
          </p>
        </div>

        <div>
          <h4>Services</h4>
          <ul>
            <li>Web Development</li>
            <li>UI / UX Design</li>
            <li>Business Websites</li>
            <li>Maintenance</li>
          </ul>
        </div>

        <div>
          <h4>Company</h4>
          <ul>
            <li>About Us</li>
            <li>Contact</li>
            <li>Privacy Policy</li>
          </ul>
        </div>
      </div>

      <div className="footer-bottom">
        © {new Date().getFullYear()} WEB’S 360. All rights reserved.
      </div>
    </footer>
  );
};

export default Footer;
