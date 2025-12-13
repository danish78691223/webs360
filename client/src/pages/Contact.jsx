const Contact = () => {
  const styles = {
    container: { padding: "60px 20px", maxWidth: "600px", margin: "auto" },
    title: { fontSize: "32px", marginBottom: "20px", textAlign: "center" },
    input: {
      width: "100%",
      padding: "12px",
      marginBottom: "14px",
      borderRadius: "4px",
      border: "1px solid #CBD5E1",
    },
    textarea: {
      width: "100%",
      padding: "12px",
      height: "120px",
      borderRadius: "4px",
      border: "1px solid #CBD5E1",
      marginBottom: "14px",
    },
    button: {
      width: "100%",
      padding: "12px",
      background: "#1FB6D5",
      border: "none",
      color: "#fff",
      fontSize: "16px",
      cursor: "pointer",
      borderRadius: "4px",
    },
  };

  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Contact Us</h1>

      <input type="text" placeholder="Your Name" style={styles.input} />
      <input type="email" placeholder="Your Email" style={styles.input} />
      <textarea placeholder="Your Message" style={styles.textarea}></textarea>

      <button style={styles.button}>Send Message</button>
    </div>
  );
};

export default Contact;
