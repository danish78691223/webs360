const About = () => {
  const styles = {
    container: { padding: "60px 20px", maxWidth: "900px", margin: "auto" },
    title: { fontSize: "36px", marginBottom: "20px", color: "#1F2A33" },
    text: { lineHeight: "1.7", color: "#475569", fontSize: "16px" },
  };

  return (
    <div style={styles.container}>
      <h1 style={styles.title}>About WEB’S 360</h1>
      <p style={styles.text}>
        WEB’S 360 is a digital service platform created to deliver complete
        end-to-end web solutions. Our goal is to help businesses, startups, and
        individuals establish a strong digital presence using modern and
        reliable technologies.
      </p>
      <br />
      <p style={styles.text}>
        We focus on clean design, scalable development, and long-term support.
        WEB’S 360 follows a 360-degree approach, covering everything from
        development and design to maintenance and consultation.
      </p>
    </div>
  );
};

export default About;
