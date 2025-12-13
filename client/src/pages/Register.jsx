import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { toast } from "react-toastify";

const Register = () => {
  const navigate = useNavigate();

  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [loading, setLoading] = useState(false);

  const styles = {
    container: { padding: "60px 20px", maxWidth: "400px", margin: "auto" },
    title: { fontSize: "32px", textAlign: "center", marginBottom: "20px" },
    input: {
      width: "100%",
      padding: "12px",
      marginBottom: "14px",
      borderRadius: "4px",
      border: "1px solid #CBD5E1",
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
      opacity: loading ? 0.7 : 1,
    },
    link: {
      display: "block",
      textAlign: "center",
      marginTop: "12px",
      color: "#1FB6D5",
      textDecoration: "none",
    },
  };

  const handleRegister = async () => {
  if (!name || !email || !password) {
    toast.error("Please fill all fields");
    return;
  }

  try {
    setLoading(true);

    const res = await fetch("http://localhost:5000/api/auth/register", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ name, email, password }),
    });

    const data = await res.json();

    if (!res.ok) {
      toast.error(data.message || "Registration failed");
      return;
    }

    localStorage.setItem("user", JSON.stringify(data));
    toast.success("Account created successfully");

    setTimeout(() => {
    navigate("/");
    }, 800);

  } catch (error) {
    toast.error("Server error. Try again later.");
  } finally {
    setLoading(false);
  }
};


  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Register</h1>

      <input
        type="text"
        placeholder="Full Name"
        style={styles.input}
        value={name}
        onChange={(e) => setName(e.target.value)}
      />

      <input
        type="email"
        placeholder="Email"
        style={styles.input}
        value={email}
        onChange={(e) => setEmail(e.target.value)}
      />

      <input
        type="password"
        placeholder="Password"
        style={styles.input}
        value={password}
        onChange={(e) => setPassword(e.target.value)}
      />

      <button
        style={styles.button}
        onClick={handleRegister}
        disabled={loading}
      >
        {loading ? "Creating account..." : "Create Account"}
      </button>

      <Link to="/login" style={styles.link}>
        Already have an account? Login
      </Link>
    </div>
  );
};

export default Register;
