import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";

const Profile = () => {
  const navigate = useNavigate();
  const [user, setUser] = useState(null);

  const styles = {
    container: {
      padding: "60px 20px",
      maxWidth: "600px",
      margin: "auto",
    },
    card: {
      background: "#FFFFFF",
      padding: "30px",
      borderRadius: "8px",
      boxShadow: "0 6px 16px rgba(0,0,0,0.08)",
    },
    title: {
      fontSize: "32px",
      marginBottom: "20px",
      textAlign: "center",
      color: "#1F2A33",
    },
    row: {
      marginBottom: "14px",
      fontSize: "16px",
      color: "#475569",
    },
    label: {
      fontWeight: "600",
      color: "#1F2A33",
    },
    button: {
      width: "100%",
      padding: "12px",
      marginTop: "20px",
      background: "#EF4444",
      border: "none",
      color: "#fff",
      fontSize: "16px",
      cursor: "pointer",
      borderRadius: "4px",
    },
  };

  useEffect(() => {
    const storedUser = localStorage.getItem("user");

    if (!storedUser) {
      navigate("/login");
    } else {
      setUser(JSON.parse(storedUser));
    }
  }, [navigate]);

  const handleLogout = () => {
  localStorage.removeItem("user");
  toast.info("Logged out successfully");

    setTimeout(() => {
    navigate("/login");
    }, 800);

};


  if (!user) return null;

  return (
    <div style={styles.container}>
      <div style={styles.card}>
        <h1 style={styles.title}>My Profile</h1>

        <div style={styles.row}>
          <span style={styles.label}>Name:</span> {user.name}
        </div>

        <div style={styles.row}>
          <span style={styles.label}>Email:</span> {user.email}
        </div>

        <div style={styles.row}>
          <span style={styles.label}>User ID:</span> {user._id}
        </div>

        <button style={styles.button} onClick={handleLogout}>
          Logout
        </button>
      </div>
    </div>
  );
};

export default Profile;
