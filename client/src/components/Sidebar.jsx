import React from "react";
import "./Header.css";

const Sidebar = ({ isOpen, toggleSidebar }) => {
  return (
    <div className={`sidebar ${isOpen ? "open" : ""}`}>
      <button className="close-btn" onClick={toggleSidebar}>× WEB'S 360</button>

      <nav>
        <a href="/">Home</a>
        <a href="/services">Services</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/shopping">Shopping</a>
        <a href="/entertainment">Entertainment</a>
        <a href="/login">Login</a>
      </nav>
    </div>
  );
};

export default Sidebar;
