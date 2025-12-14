import React from "react";
import { useNavigate } from "react-router-dom";
import "./Shopping.css";

const Shopping = () => {
  const navigate = useNavigate();

  return (
    <div className="shopping-page">
      {/* HERO */}
      <section className="shopping-hero">
        <h1>Shopping Zone</h1>
        <p>
          Explore trending products, digital tools, and online services
          carefully curated by WEB’S 360.
        </p>
      </section>

      {/* PRODUCTS */}
      <section className="shopping-list">
        {/* Website Templates */}
        <div
          className="shopping-card"
          onClick={() => navigate("/templates")}
        >
          <h3>Website Templates</h3>
          <p>
            Ready-to-use modern website templates for businesses and
            portfolios.
          </p>
        </div>

        {/* Digital Tools */}
        <div
          className="shopping-card"
          onClick={() => navigate("/digital-tools")}
        >
          <h3>Digital Tools</h3>
          <p>
            Productivity and marketing tools to grow your online presence.
          </p>
        </div>

        {/* E-Commerce Solutions */}
        <div
          className="shopping-card"
          onClick={() => navigate("/ecommerce-solutions")}
        >
          <h3>E-Commerce Solutions</h3>
          <p>
            Complete online store solutions with payment and order
            management.
          </p>
        </div>

        {/* Custom Packages */}
        <div
          className="shopping-card"
          onClick={() => navigate("/custom-packages")}
        >
          <h3>Custom Packages</h3>
          <p>
            Customized digital packages based on your business requirements.
          </p>
        </div>
      </section>
    </div>
  );
};

export default Shopping;
