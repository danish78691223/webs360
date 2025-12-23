import React, { useState } from "react";
import Header from "../components/Header";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

const Layout = ({ children }) => {
  const [sidebarOpen, setSidebarOpen] = useState(false);

  // Toggle sidebar open / close
  const toggleSidebar = () => {
    setSidebarOpen(prev => !prev);
  };

  // Explicit close (used when clicking links, logout, etc.)
  const closeSidebar = () => {
    setSidebarOpen(false);
  };

  return (
    <>
      {/* HEADER */}
      <Header
        toggleSidebar={toggleSidebar}
        isOpen={sidebarOpen}
      />

      {/* SIDEBAR */}
      <Sidebar
        isOpen={sidebarOpen}
        toggleSidebar={closeSidebar}
      />

      {/* MAIN CONTENT */}
      <main className="main-content">
        {children}
      </main>

      {/* FOOTER */}
      <Footer />
    </>
  );
};

export default Layout;
