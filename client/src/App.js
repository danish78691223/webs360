import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

import Layout from "./layout/Layout";

import Home from "./pages/Home";
import About from "./pages/About";
import Services from "./pages/Services";
import Contact from "./pages/Contact";
import Login from "./pages/Login";
import Register from "./pages/Register";
import Profile from "./pages/Profile";
import Shopping from "./shopping/Shopping";
import Entertainment from "./entertainment/Entertainment";
import TemplatePage from "./shopping/TemplatePage";
import WebsiteTemplates from "./shopping/WebsiteTemplates";
import Dashboards from "./dashboards/Dashboards";




const App = () => {
  return (
    <Router>
      <Layout>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/services" element={<Services />} />
          <Route path="/about" element={<About />} />
          <Route path="/contact" element={<Contact />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route path="/profile" element={<Profile />} />
          <Route path="/shopping" element={<Shopping />} />
          <Route path="/entertainment" element={<Entertainment />} />
          <Route path="/templates/:type" element={<TemplatePage />} />
          <Route path="/templates" element={<WebsiteTemplates />} />
          <Route path="/dashboards" element={<Dashboards />} />
        </Routes>
      </Layout>
    </Router>
  );
};

export default App;
