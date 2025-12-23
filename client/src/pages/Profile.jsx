import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";

const Profile = () => {
  const navigate = useNavigate();
  const [user, setUser] = useState(null);

  const styles = {
    container: {
      padding: "80px 20px",
      maxWidth: "600px",
      margin: "auto",
    },
    card: {
      background: "#FFFFFF",
      padding: "40px 30px",
      borderRadius: "14px",
      boxShadow: "0 20px 40px rgba(0,0,0,0.1)",
      textAlign: "center",
    },
    avatar: {
      width: "90px",
      height: "90px",
      borderRadius: "50%",
      background: "linear-gradient(135deg, #1FB6D5, #0ea5c6)",
      color: "#fff",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      fontSize: "34px",
      fontWeight: "600",
      margin: "0 auto 20px",
    },
    title: {
      fontSize: "28px",
      marginBottom: "6px",
      color: "#1F2A33",
    },
    subtitle: {
      color: "#64748B",
      marginBottom: "30px",
      fontSize: "14px",
    },
    row: {
      display: "flex",
      justifyContent: "space-between",
      padding: "12px 0",
      borderBottom: "1px solid #E2E8F0",
      fontSize: "15px",
      color: "#475569",
    },
    label: {
      fontWeight: "600",
      color: "#1F2A33",
    },
    value: {
      color: "#475569",
      wordBreak: "break-all",
    },
    button: {
      width: "100%",
      padding: "14px",
      marginTop: "30px",
      background: "#EF4444",
      border: "none",
      color: "#fff",
      fontSize: "16px",
      cursor: "pointer",
      borderRadius: "8px",
      transition: "background 0.3s ease, transform 0.2s ease",
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

  const initials = user.name
    ?.split(" ")
    .map((n) => n[0])
    .join("")
    .toUpperCase();

  return (
    <div style={styles.container}>
      <div style={styles.card}>
        {/* Avatar */}
        <div style={styles.avatar}>{initials}</div>

        <h1 style={styles.title}>{user.name}</h1>
        <p style={styles.subtitle}>WEB’S 360 User Profile</p>

        {/* Details */}
        <div style={styles.row}>
          <span style={styles.label}>Email</span>
          <span style={styles.value}>{user.email}</span>
        </div>

        <div style={styles.row}>
          <span style={styles.label}>User ID</span>
          <span style={styles.value}>{user._id}</span>
        </div>

        <button
          style={styles.button}
          onClick={handleLogout}
          onMouseOver={(e) => (e.target.style.background = "#dc2626")}
          onMouseOut={(e) => (e.target.style.background = "#EF4444")}
        >
          Logout
        </button>
      </div>
    </div>
  );
};

export default Profile;
