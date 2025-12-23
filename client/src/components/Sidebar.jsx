import React from "react";
import { Link, useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import "./Header.css";

const Sidebar = ({ isOpen, toggleSidebar }) => {
  const navigate = useNavigate();
  const user = JSON.parse(localStorage.getItem("user"));

  const handleLogout = () => {
    localStorage.removeItem("user");
    toast.info("Logged out successfully");

    toggleSidebar();

    setTimeout(() => {
      navigate("/login");
    }, 800);
  };

  return (
    <div className={`sidebar ${isOpen ? "open" : ""}`}>
      <nav>
        <Link to="/" onClick={toggleSidebar}>Home</Link>
        <Link to="/services" onClick={toggleSidebar}>Services</Link>
        <Link to="/about" onClick={toggleSidebar}>About</Link>
        <Link to="/contact" onClick={toggleSidebar}>Contact</Link>
        <Link to="/shopping" onClick={toggleSidebar}>Shopping</Link>
        <Link to="/entertainment" onClick={toggleSidebar}>Entertainment</Link>

        {/* AUTH BASED */}
        {!user ? (
          <Link to="/login" onClick={toggleSidebar}>Login</Link>
        ) : (
          <button className="logout-btn" onClick={handleLogout}>
            Logout
          </button>
        )}
      </nav>
    </div>
  );
};

export default Sidebar;
