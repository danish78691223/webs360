import React from "react";
import { Link } from "react-router-dom";
import "./Header.css";

const Header = ({ toggleSidebar }) => {
  const user = JSON.parse(localStorage.getItem("user"));

  return (
    <header className="header">
      {/* LEFT: Hamburger + Brand */}
      <div className="header-left">
        <button className="menu-btn" onClick={toggleSidebar}>
          <span></span>
          <span></span>
          <span></span>
        </button>

        <h1 className="brand-name">WEB’S 360</h1>
      </div>

      {/* RIGHT: Profile / Login */}
      <div className="header-right">
        {user ? (
          <Link to="/profile" className="profile-icon" title="Profile">
            👤
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
