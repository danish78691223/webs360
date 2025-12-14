import React from "react";
import "./Dashboards.css";

const Dashboards = () => {
  return (
    <div className="dashboards-page">
      {/* HERO */}
      <section className="dashboards-hero">
        <h1>Explore Dashboards</h1>
        <p>
          Choose from a variety of dashboards designed for different business
          needs. Our dashboards help you visualize data, track performance,
          and manage operations efficiently.
        </p>
      </section>

      {/* DASHBOARD LIST */}
      <section className="dashboards-list">
        <div className="dashboard-card">
          <h3>Business Dashboard</h3>
          <p>
            Track sales, revenue, customers, and overall business growth
            from a single place.
          </p>
        </div>

        <div className="dashboard-card">
          <h3>Admin Dashboard</h3>
          <p>
            Manage users, roles, content, and system settings with a
            secure admin panel.
          </p>
        </div>

        <div className="dashboard-card">
          <h3>Analytics Dashboard</h3>
          <p>
            Visualize data with charts and reports to make data-driven
            decisions.
          </p>
        </div>

        <div className="dashboard-card">
          <h3>E-Commerce Dashboard</h3>
          <p>
            Monitor orders, products, inventory, and customer activity
            in real time.
          </p>
        </div>

        <div className="dashboard-card">
          <h3>Finance Dashboard</h3>
          <p>
            Track expenses, income, profits, and financial performance
            efficiently.
          </p>
        </div>

        <div className="dashboard-card">
          <h3>Custom Dashboard</h3>
          <p>
            Get a fully customized dashboard built according to your
            specific business requirements.
          </p>
        </div>
      </section>
    </div>
  );
};

export default Dashboards;
