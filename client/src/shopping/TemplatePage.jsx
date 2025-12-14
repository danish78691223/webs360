import React from "react";
import { useParams, Link } from "react-router-dom";

const TemplatePage = () => {
  const { type } = useParams();

  const styles = {
    container: {
      padding: "60px 20px",
      maxWidth: "900px",
      margin: "auto",
    },
    title: {
      fontSize: "36px",
      marginBottom: "20px",
      textTransform: "capitalize",
    },
    text: {
      lineHeight: "1.7",
      color: "#475569",
      marginBottom: "30px",
    },
    button: {
      padding: "12px 24px",
      background: "#1FB6D5",
      border: "none",
      color: "#fff",
      fontSize: "16px",
      cursor: "pointer",
      borderRadius: "4px",
      textDecoration: "none",
    },
  };

  return (
    <div style={styles.container}>
      <h1 style={styles.title}>{type} Website Template</h1>

      <p style={styles.text}>
        This page showcases the {type} website template. Users can preview the
        design, understand features, and request this template for their
        project.
      </p>

      <Link to="/contact" style={styles.button}>
        Request This Template
      </Link>
    </div>
  );
};

export default TemplatePage;
