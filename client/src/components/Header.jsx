// Header.jsx
import React from "react";
import { Link } from "react-router-dom";
import "./Header.css";

// ✅ import profile image
import profileImg from "../assets/images/profile.png";

const Header = ({ toggleSidebar, isOpen }) => {
  const user = JSON.parse(localStorage.getItem("user"));

  return (
    <header className="header">
      {/* LEFT: Hamburger / Brand */}
      <div className="header-left">
        <button
          className={`menu-btn ${isOpen ? "open" : ""}`}
          onClick={toggleSidebar}
          aria-label="Toggle Menu"
        >
          {isOpen ? "×" : (
            <>
              <span></span>
              <span></span>
              <span></span>
            </>
          )}
        </button>

        <h1 className="brand-name">WEB’S 360</h1>
      </div>

      {/* RIGHT: Profile / Login */}
      <div className="header-right">
        {user ? (
          <Link to="/profile" className="profile-icon" title="Profile">
            <img
              src={profileImg}
              alt="Profile"
              className="profile-img"
            />
          </Link>
        ) : (
          <Link to="/login" className="login-link">
            Login
          </Link>
        )}
      </div>
    </header>
  );
};

export default Header;
