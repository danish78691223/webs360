import React from "react";
import { useNavigate } from "react-router-dom";
import "./WebsiteTemplates.css";

const templates = [
  { title: "Business Website", slug: "business" },
  { title: "Portfolio Website", slug: "portfolio" },
  { title: "E-commerce Website", slug: "ecommerce" },
  { title: "Blog Website", slug: "blog" },
  { title: "Restaurant Website", slug: "restaurant" },
  { title: "Startup Landing Page", slug: "startup" },
];

const WebsiteTemplates = () => {
  const navigate = useNavigate();

  return (
    <section className="templates-section">
      <h2>Website Templates</h2>

      <div className="templates-grid">
        {templates.map((template, index) => (
          <div
            key={index}
            className="template-card"
            onClick={() => navigate(`/templates/${template.slug}`)}
          >
            <h3>{template.title}</h3>
            <p>Click to view template</p>
          </div>
        ))}
      </div>
    </section>
  );
};

export default WebsiteTemplates;
