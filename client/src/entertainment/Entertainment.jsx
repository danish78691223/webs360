import React from "react";
import "./Entertainment.css";

const Entertainment = () => {
  return (
    <div className="entertainment-page">
      {/* HERO */}
      <section className="entertainment-hero">
        <h1>Entertainment Hub</h1>
        <p>
          Discover digital entertainment, media platforms, and creative
          experiences powered by WEB’S 360.
        </p>
      </section>

      {/* CONTENT */}
      <section className="entertainment-list">
        <div className="entertainment-card">
          <h3>Streaming Platforms</h3>
          <p>
            Access recommendations for popular streaming and OTT platforms.
          </p>
        </div>

        <div className="entertainment-card">
          <h3>Gaming Content</h3>
          <p>
            Explore casual and competitive gaming experiences and tools.
          </p>
        </div>

        <div className="entertainment-card">
          <h3>Creative Media</h3>
          <p>
            Digital art, design inspiration, and creative resources.
          </p>
        </div>

        <div className="entertainment-card">
          <h3>Interactive Experiences</h3>
          <p>
            Web-based interactive content and engaging digital experiences.
          </p>
        </div>
      </section>
    </div>
  );
};

export default Entertainment;
