import { motion } from "motion/react";

export default function Laptop({ isOpen, screenContent }) {
  return (
    <div className="relative w-full max-w-4xl mx-auto perspective-1000">
      {/* Laptop Screen */}
      <motion.div
        className="relative bg-gray-800 rounded-t-2xl p-4 shadow-2xl origin-bottom"
        style={{ transformStyle: "preserve-3d" }}
        animate={{ rotateX: isOpen ? 0 : -90 }}
        transition={{ duration: 1.2, ease: "easeInOut" }}
      >
        {/* Screen Bezel */}
        <div className="bg-black rounded-lg p-2 shadow-inner">
          {/* Screen Content */}
          <div className="bg-gradient-to-br from-blue-50 to-purple-50 rounded aspect-video overflow-hidden relative">
            {screenContent}
          </div>
        </div>

        {/* Webcam */}
        <div className="absolute top-2 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-600 rounded-full" />
      </motion.div>

      {/* Laptop Base */}
      <div className="relative">
        <div className="bg-gray-300 rounded-b-2xl p-6 shadow-xl">
          <div className="bg-gray-400 rounded p-4 grid grid-cols-12 gap-1">
            {Array.from({ length: 60 }).map((_, i) => (
              <div
                key={i}
                className="bg-gray-200 rounded h-4 shadow-sm"
                style={{ gridColumn: i === 30 ? "span 4" : "span 1" }}
              />
            ))}
          </div>

          {/* Trackpad */}
          <div className="mt-4 mx-auto w-1/3 h-16 bg-gray-500 rounded-lg shadow-inner" />
        </div>

        {/* Shadow */}
        <div className="absolute -bottom-2 left-1/2 -translate-x-1/2 w-full h-4 bg-black/20 blur-xl rounded-full" />
      </div>
    </div>
  );
}
