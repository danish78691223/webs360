import { useRef, useState, useEffect } from "react";
import { motion, useScroll, useTransform } from "motion/react";
import { useNavigate } from "react-router-dom";
import { ArrowDown } from "lucide-react";

import Laptop from "../components/landing/Laptop";
import SoftwareInterface from "../components/landing/SoftwareInterface";
import webs360Logo from "../assets/images/webs360.png";

export default function Landing() {
  const navigate = useNavigate();
  const containerRef = useRef(null);
  const [isLaptopOpen, setIsLaptopOpen] = useState(false);

  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start start", "end end"],
  });

  useEffect(() => {
    return scrollYProgress.on("change", (latest) => {
      setIsLaptopOpen(latest > 0.4);
    });
  }, [scrollYProgress]);

  /* Scroll animations */
  const logoY = useTransform(scrollYProgress, [0, 0.3, 0.5], [0, 220, 450]);
  const logoScale = useTransform(scrollYProgress, [0, 0.3, 0.5], [1, 0.75, 0.4]);
  const logoOpacity = useTransform(scrollYProgress, [0.4, 0.55], [1, 0]);

  const heroOpacity = useTransform(scrollYProgress, [0, 0.2], [1, 0]);
  const heroY = useTransform(scrollYProgress, [0, 0.2], [0, -80]);

  const laptopY = useTransform(scrollYProgress, [0.3, 0.6], [180, 0]);
  const laptopOpacity = useTransform(scrollYProgress, [0.3, 0.4], [0, 1]);
  const screenOpacity = useTransform(scrollYProgress, [0.5, 0.7], [0, 1]);

  /* CTA animation (UNDER LAPTOP) */
  const ctaOpacity = useTransform(scrollYProgress, [0.45, 0.6], [0, 1]);
  const ctaY = useTransform(scrollYProgress, [0.45, 0.6], [40, 0]);

  return (
    <div ref={containerRef} className="bg-white text-gray-900">
      {/* ================= HERO SECTION ================= */}
      <section className="h-screen flex flex-col items-center justify-center px-6 relative overflow-hidden">
        <motion.div
          style={{ opacity: heroOpacity, y: heroY }}
          className="text-center max-w-4xl mx-auto"
        >
          {/* Logo */}
          <div className="flex justify-center mb-8">
            <img
              src={webs360Logo}
              alt="WEB'S 360"
              className="w-20 h-20 md:w-24 md:h-24"
            />
          </div>

          {/* Heading */}
          <h1 className="text-4xl md:text-6xl font-bold leading-tight mb-6">
            Transform{" "}
            <span className="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
              your digital presence
            </span>{" "}
            with WEB&apos;S 360
          </h1>

          {/* Subtitle */}
          <p className="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
            Complete 360-degree digital solutions to build, scale, and grow your
            business online.
          </p>
        </motion.div>

        {/* Scroll Indicator */}
        <ArrowDown className="absolute bottom-8 w-8 h-8 text-gray-400 animate-bounce" />
      </section>

      {/* ================= SCROLL / ANIMATION SECTION ================= */}
      <section className="h-[200vh] relative">
        <div className="sticky top-0 h-screen flex flex-col items-center justify-center gap-12">
          {/* Floating Logo */}
          <motion.div
            style={{ y: logoY, scale: logoScale, opacity: logoOpacity }}
            className="absolute top-24 left-1/2 -translate-x-1/2 z-20"
          >
            <img
              src={webs360Logo}
              alt="WEB'S 360"
              className="w-16 h-16 md:w-20 md:h-20"
            />
          </motion.div>

          {/* Laptop */}
          <motion.div style={{ y: laptopY, opacity: laptopOpacity }}>
            <Laptop
              isOpen={isLaptopOpen}
              screenContent={
                <motion.div style={{ opacity: screenOpacity }}>
                  <SoftwareInterface />
                </motion.div>
              }
            />
          </motion.div>

          {/* Get Started Button (AFTER SCROLL) */}
          <motion.button
            style={{ opacity: ctaOpacity, y: ctaY }}
            onClick={() => navigate("/home")}
            className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-12 py-4 rounded-full text-lg shadow-lg hover:shadow-xl transition-all"
          >
            Get Started
          </motion.button>
        </div>
      </section>
    </div>
  );
}
