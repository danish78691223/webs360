import React, { useState } from "react";
import Header from "../components/Header";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

const Layout = ({ children }) => {
  const [sidebarOpen, setSidebarOpen] = useState(false);

  return (
    <>
      <Header toggleSidebar={() => setSidebarOpen(true)} />
      <Sidebar
        isOpen={sidebarOpen}
        toggleSidebar={() => setSidebarOpen(false)}
      />

      <main>{children}</main>

      <Footer />
    </>
  );
};

export default Layout;
